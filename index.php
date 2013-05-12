<?php

/*
	TODO:

	- fix json algorithm

*/
	session_start();

	if (!isset($_SESSION['user_uid'])) $_SESSION['user_uid'] = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);

	if (isset($_SESSION['user_failed'])) header('Location: thank_you.php');
	
	// Let's check if the user submitted the consent form.
	if ($_POST) {
		if (isset($_POST['consent'])) {
			if ($_POST['consent'] == 'true') {
				$_SESSION['consent'] = true;
				header('Location: color_test.php');
			} else {
				$_SESSION['user_failed'] = true;
				$_SESSION['user_failed_reason'] = 'consent';
				
				header('Location: thank_you.php');
			}
		}
	}
?>
<!DOCTYPE HTML>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
	<meta name="author" content="Tomer Shvueli">

    <title>Consent Form</title>

    <link rel="stylesheet" type="text/css" href="css/prettify.css" />
    <link rel="stylesheet" type="text/css" href="css/sample.css" />

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <?php include("js/global.php"); ?>
</head>

<body>
<h1>Consent Form</h1>
	<p class="description">
		<br />This HIT is a research study conducted at North Carolina State University. Principle Investigator is Juhee Bae (jbae3@ncsu.edu). 
        <br /><br />If you have any questions, concerns, problems about your rights as a research participant or would like to offer input, please contact North Carolina State University's IRB office at http://research.ncsu.edu/sparcs/compliance/irb/. 
		<br /><br />The NCSU IRB cannot answer questions about research procedures. Questions about research procedures can be answered by the research group. 
		<br /><br />There are no risks involved with your participation in this research study nor are there any personal benefits (except for being paid). 
		<br /><br />Your decision to participate is confidential. You can stop at any time. Your name is in no way linked to your responses. 
		<b><br /><br />
		<br /><br />In order to run the experiment, you must have at least 800x600 resolution of a monitor.
		<br /><br />You must run the whole test in the current window. If you close this window, all of your work will be lost and you'll be forced to start again.
		<br /><br />You must distinguish colors. You will first perform a color-blind test. 
		<br /><br />You must be 18 years of age or older to take part in this research study. 
		<br /><br />You must agree to provide your age, gender, and occupation before the main test. 
		</b><br /><br />
		<br /><br />Click 'Yes' if you decide to proceed which means you have read this information and consent to take part in the research. You may wish to print a copy of this information for your records or future reference.
		<br /><br />	
	</p>

	<form method="POST" action="index.php" name="consent-form" id="consent-form">
		<label><input type="radio" name="consent" value="true" />Yes</label>
		<label><input type="radio" name="consent" value="false" />No</label>
		<br/><br/>
		<input type="submit" name="submit" id="submit" value="Submit" />
	</form>
</body>
</html>