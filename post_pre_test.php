<?php
	session_start();

	if (isset($_SESSION['user_failed'])) header('Location: thank_you.php');

	if ($_SESSION['pre_drag_drop_correct'] < 4) header('Location: take_tests.php');

	if ($_POST['start']) {
		$_SESSION['user_age'] = $_POST['input-age'];
		$_SESSION['user_gender'] = $_POST['input-gender'];
		$_SESSION['user_occupation'] = $_POST['input-occupation'];

		header('Location: take_tests.php');
	}
?>
<!DOCTYPE HTML>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
	<meta name="author" content="Tomer Shvueli">

    <title>Post Preliminary Test</title>

    <link rel="stylesheet" type="text/css" href="css/prettify.css" />
    <link rel="stylesheet" type="text/css" href="css/sample.css" />
    <link rel="stylesheet" type="text/css" href="css/zTreeStyle.css" />

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.ztree.all-3.5.min.js"></script>
    <script type="text/javascript" src="js/tree.js"></script>
    <?php include("js/global.php"); ?>

</head>

<body>
	<h2>You have finished the preliminary tests successfully.</h2>
	<h2>Your score is: <?=$_SESSION['pre_drag_drop_correct']; ?> out of 6.</h2>

	You can proceed since you fulfuill the requirement. Read the instructions again. It will be on each page as a reminder.
	<br/><br/>To create a group on the right, click the "Add group" button. To put items in groups, drag items on top of a group, and release when the group is highlighted with a red arrow. Note that groups can contain groups.
	<br/>Press the "Next" button when you are done. You cannot advance until you have created at least one group. Please do not press your browser\'s "Back" button. Please do not refresh the page.
	<br/>There are five main tasks, and five main tasks. While you received feedbacks for practice tasks, you will not receive feedbacks for the main tasks. With the main tasks, accurate answers can earn you a bonus up to double your regular pay. After your last main task, you will see a 'code' to fill out on to mechanical turk's page before you submit the HIT.
	<br/>In order to run the experiment, you must have at least 800x600 resolution of a monitor.
	<br/><br/>Please enter your age, gender, and occupation. We will only use the information for research purpose.<br/><br/><br />

	<form name="post-pre-test-form" method="POST" action="post_pre_test.php">
		<label for="input-age">Age: <input type="text" id="input-age" name="input-age" required autofocus /></label><br /><br />
		<label for="input-gender">Gender: 
			<select id="input-gender" name="input-gender">
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select>
		</label><br /><br />
		<label for="input-occupation">Occupation: <input type="text" id="input-occupation" name="input-occupation" required /></label><br /><br />

		<br />
		<p>Once you are ready for the main tasks, press the button below.</p>
		<input type="submit" id="start" name="start" value="Start Tasks" />
	</form>

</body>
</html>