<?php
	session_start();

	if (isset($_SESSION['user_failed'])) header('Location: thank_you.php');

	// If the user just started the session, start them off at test 0
	if (!isset($_SESSION['test_num'])) $_SESSION['test_num'] = 0;

	// Fetch the test's array
	include("lib/test_array.php");

	// Include our test's page
	include("tests/" . $tests[$_SESSION['test_num']] . ".php");
?>
<!DOCTYPE HTML>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
	<meta name="author" content="Tomer Shvueli">

    <title>Test - <?php echo(ucwords(str_replace("_", " ", $tests[$_SESSION['test_num']]))); ?></title>

    <link rel="stylesheet" type="text/css" href="css/prettify.css" />
    <link rel="stylesheet" type="text/css" href="css/sample.css" />
    <link rel="stylesheet" type="text/css" href="css/msgBoxLight.css" />
    <link rel="stylesheet" type="text/css" href="css/zTreeStyle.css" />
    <style type="text/css">
    	#leftimage {
    		float: left;
    	}
    </style>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.ztree.all-3.5.min.js"></script>
    <script type="text/javascript" src="js/jquery.msgBox.js"></script>
    <?php include("js/global.php"); ?>
    <script type="text/javascript" src="js/tree.js"></script>
</head>

<body>
	<h1>Practice task: Group items on the right to match the image on the left.</h1>
	<p class="description">
	To create a group on the right, click the "Add Group" button. To put items in groups, drag items on top of a group, and release when the group is highlighted with a red arrow. Note that groups can contain groups.
	<br/><br/>
		Press the "Next" button when you are done. You cannot advance until you have created at least one group. Please do not press your browser's "Back" button.
	<br/><br/>		
	There are five practice tasks and five main tasks. After your practice tasks, the number of accurate answers will decide whether you can proceed or not. You will receive feedbacks with the practice tasks but not with the main tasks. With the main tasks, accurate answers can earn you a bonus up to double your regular pay.
	<br/><br/>
	In order to run the experiment, you must have at least 800x600 resolution of a monitor.
	<br/>

	</p>

	<?php
		if ($_SESSION['show_hints']) { ?>
			<p><label id="currentGroupInText" style="font-weight:bold; font-size:110%;">Hint: Use <?= ucwords($images_hint_array[$_SESSION['img_num']]); ?></label></p>
		<?php
		}
	?>

	<img src="images/<?= $images_array[$_SESSION['img_num']]; ?>.png" id="leftimage" width="600" />

	<ul id="tree" class="ztree" style="overflow:auto;"></ul>

	<p>
    	<a href="#" id="btnAddGroup" onclick="return false;">Add group</button><br/>
		<a href="#" id="btnDelete" onclick="return false;">Delete group</a><br/><br/>
		<a href="#" id="btnExpandAll" onclick="return false;">Expand all</a><br/>
		<a href="#" id="btnCollapseAll" onclick="return false;">Collapse all</a><br/>
	</p>

	<input type="submit" name="submit" id="submit" value="Next" onclick="<?php if ($_SESSION['check_answers']) echo("checkAnswers();"); else echo("saveAnswers();"); ?> return false;"/>

</body>
</html>