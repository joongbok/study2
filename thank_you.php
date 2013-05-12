<?php
	session_start();
?>
<!DOCTYPE HTML>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
	<meta name="author" content="Tomer Shvueli">

    <title>Thank You!</title>

    <link rel="stylesheet" type="text/css" href="css/prettify.css" />
    <link rel="stylesheet" type="text/css" href="css/sample.css" />
</head>

<body>
<h1>Thank you!</h1>
	<?php
		if (isset($_SESSION['user_failed_reason'])) {
			if ($_SESSION['user_failed_reason'] == 'color_test') {
				echo("<p>To be able to take this test, you must have passed all of the color tests. Unfortunately you did not complete this requirement.</p>");
			} else if ($_SESSION['user_failed_reason'] == 'fail_pre_tests') {
				echo("<p>To be able to take this test, you must have passed at least 4 of the pre tests, unfortunately, you do no match this criteria.</p>");
			} else {
				echo("<p>Thank you for considering taking this study!</p>");
			}
		} else {
			echo("<p>Sorry to see you go.</p>");
		}
	?>
</body>
</html>