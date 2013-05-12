<?php
	session_start();

	if (isset($_SESSION['user_failed'])) header('Location: thank_you.php');
	
	// Keep track of how many correct submissions the user has
	if (!isset($_SESSION['color_num_correct'])) $_SESSION['color_num_correct'] = 0;
?>
<!DOCTYPE HTML>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
	<meta name="author" content="Tomer Shvueli">

    <title>Color Test <?= $_SESSION['color_num_correct'] + 1; ?></title>

    <link rel="stylesheet" type="text/css" href="css/prettify.css" />
    <link rel="stylesheet" type="text/css" href="css/sample.css" />
    <link rel="stylesheet" type="text/css" href="css/msgBoxLight.css" />
    <style type="text/css">
    	#leftimage {
    		float: left;
    	}
    </style>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/global.php"></script>
    <script type="text/javascript" src="js/colorCheck.js"></script>
    <script type="text/javascript" src="js/jquery.msgBox.js"></script>
</head>

<body>
	<h1>Color Test <?= $_SESSION['color_num_correct'] + 1; ?></h1>
	<p class="description">
		Write the text you see in the image.
	</p>

	<img src="images/ct<?= $_SESSION['color_num_correct'] + 1; ?>.png" id="leftimage" width="600" />
	<br /><br />

	<label>What do you see: <input type="text" name="color-test-val" id="txt-color-response" onkeypress='if(event.keyCode == 13) { checkColor(); this.blur(); return false; }' required autofocus /></label>
	<br/><br/>
	<input type="submit" name="submit" id="submit" value="Next" onclick="checkColor(); return false;" />
</body>
</html>