<?php
	session_start();
	
	// This is the user's response
	$response = $_POST['response'];

	// Let's fetch the answer and compare, if they got it right, advance them, else, they failed
	$json   = json_decode(file_get_contents("../answers/answer_ct" . ($_SESSION['color_num_correct'] + 1) . ".json"), true);
	$answer = $json[0]['title'];

	$correct = false;
	$redirect = "color_test.php";

	if ($response == $answer) {
		$_SESSION['color_num_correct']++;

		$correct = true;

		if ($_SESSION['color_num_correct'] == 5) {
			$redirect = "post_color_test.php";
		}
	} else {
		$_SESSION['user_failed'] = true;
		$_SESSION['user_failed_reason'] = 'color_test';

		unset($_SESSION['color_num_correct']);

		$redirect = "thank_you.php";
	}

	echo(json_encode(array('result' => $correct, 'num_correct' => $_SESSION['color_num_correct'], 'redirect' => $redirect)));
?>