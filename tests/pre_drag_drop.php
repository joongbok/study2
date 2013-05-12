<?php
	session_start();

	if (!isset($_SESSION['img_num'])) $_SESSION['img_num'] = 0;
	if (!isset($_SESSION['pre_drag_drop_correct'])) $_SESSION['pre_drag_drop_correct'] = 0;
	$_SESSION['show_hints'] = true;
	$_SESSION['check_answers'] = true;
	
	$images_array      = array("col", "conn", "pro", "ali", "com");
	$images_hint_array = array("color", "connectivity", "proximity", "alignment", "common region");
	
?>