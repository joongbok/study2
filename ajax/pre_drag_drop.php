<?php
	session_start();

	include("../tests/pre_drag_drop.php");

	// Read in the correct answer file
	$correct = file_get_contents("../answers/answer_pre_" . $images_array[$_SESSION['img_num']] . ".txt");

	// The response variable will be what the user submitted
	$response = $_POST['nodes'];

	include("compare_json.php");

	$compared = (compare_json($response) == $correct);

	// Increment the img_num test number
	$_SESSION['img_num']++;

	$redirect = "take_tests.php";

	if ($compared) {
		// If the user's answer was correct, increment the correct counter
		$_SESSION['pre_drag_drop_correct']++;
	}

	if ($_SESSION['img_num'] == 5) {
		if ($_SESSION['pre_drag_drop_correct'] >= 4) {
			// User passed the preliminary tests
			$_SESSION['test_num']++;

			// Reset img_num for the next test
			$_SESSION['img_num'] = 0;

			$redirect = 'post_pre_test.php';
		} else {
			// User failed the preliminary tests
			$_SESSION['user_failed'] = true;
			$_SESSION['user_failed_reason'] = 'fail_pre_tests';

			$redirect = 'thank_you.php';
		}
	}

	echo(json_encode(array('result' => $compared, 'redirect' => $redirect)));

?>