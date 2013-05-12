<?php
	session_start();

	//$_SESSION['img_num'] = 0;
	$_SESSION['show_hints'] = false;
	$_SESSION['check_answers'] = false;

	if (!isset($_SESSION['lat_sq_count'])) {
		// Connect to the DB
		include("lib/db_config.php");

		$con = mysqli_connect($db_host, $db_user, $db_pwd, $db_name);

		// Check connection
		if (mysqli_connect_errno($con)) {
			echo("Failed to connect to MySQL: " . mysqli_connect_error() . ". Please try again.");
			die();
		}
		
		if ($q = mysqli_query($con, "SELECT * FROM counter WHERE id = '0' LIMIT 1 ;")) {
			// Get the count we're on and save that
			$query = mysqli_fetch_assoc($q);
			$_SESSION['lat_sq_count'] = $query['count'];

			// Use the count to fetch the Latin square order
			$order = mysqli_query($con, "SELECT * FROM study2ordering WHERE id = '" . $_SESSION['lat_sq_count'] . "' ;");
			$result = mysqli_fetch_assoc($order);
			$_SESSION['lat_sq_order'] = unserialize($result['order']);

			// Increment the count
			$new_count = ($_SESSION['lat_sq_count'] == 26) ? 1 : $_SESSION['lat_sq_count'] + 1;
			$increment = mysqli_query($con, "UPDATE counter SET count = '" . $new_count . "' ;");
		} else {
			echo("Problem with SQL statement, please try again. <br />");
			printf(mysqli_error($con));
			die();
		}

		mysqli_close($con);
	}

	$images_array      = array("col", "conn", "pro", "ali", "com");
	$images_hint_array = array("color", "connectivity", "proximity", "alignment", "common region");

?>