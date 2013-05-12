<?php
	session_start();

	if (isset($_SESSION['user_failed'])) header('Location: thank_you.php');
	
	if ($_SESSION['color_num_correct'] != 5) header('Location: color_test.php');
?>
<!DOCTYPE HTML>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
	<meta name="author" content="Tomer Shvueli">

    <title>Post Color Test</title>

    <link rel="stylesheet" type="text/css" href="css/prettify.css" />
    <link rel="stylesheet" type="text/css" href="css/sample.css" />
    <link rel="stylesheet" type="text/css" href="css/zTreeStyle.css" />

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.ztree.all-3.5.min.js"></script>
    <script type="text/javascript" src="js/tree.js"></script>
    <?php include("js/global.php"); ?>
    <script type="text/javascript">
    	function startTask() {
    		window.location = "take_tests.php";
    	}
    </script>
</head>

<body>
	<h2>You have finished the color test successfully.</h2>
	<p class="description">
	You can proceed since you fulfuill the requirement. Read the instructions below. It will be on each page as a reminder.
	<br/><br/>To create a group on the right, click the "Add group" button. To put items in groups, drag items on top of a group, and release when the group is highlighted with a red arrow. Note that groups can contain groups.
	<br/>Press the "Next" button when you are done. You cannot advance until you have created at least one group. Please do not press your browser\'s "Back" button. Please do not refresh the page.
	<br/>There are five practice tasks, and five main tasks. After your practice tasks, the number of accurate answers will decide whether you can proceed or not. You will receive feedbacks with the practice tasks but not with the main tasks. With the main tasks, accurate answers can earn you a bonus up to double your regular pay.
	<br/>In order to run the experiment, you must have at least 800x600 resolution of a monitor.
	<br/><br/>Once you are ready for the practice tasks, press the button below.<br/><br/>
	<input type="button" onclick="return startTask()" id="start" value="Start Practice Tasks" />
	</p>

</body>
</html>