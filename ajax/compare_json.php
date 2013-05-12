<?php
	session_start();

	$_SESSION['user_response'] = "";

	function push_children_in_str($obj) {
		sort($obj);

		foreach ($obj as $i => $node) {
			$_SESSION['user_response'] .= "(";

			if ($node['isParent'] == 'false') {
				$_SESSION['user_response'] .= substr($node['tId'], strpos($node['tId'], '_') + 1);
			} else {
				if (count($node['children']) == 1) {
					// *******************************************************
					// user only put a single node in a group
					//$_SESSION['user_response'] .= substr($node['children'][0]['tId'], strpos($node['children'][0]['tId'], '_') + 1);
				} else {
					$_SESSION['user_response'] .= 'G';
					push_children_in_str($node['children']);
				}
			}

			$_SESSION['user_response'] .= ")";
		}

		
	}

	function cleanup_response(&$obj) {
		//*****************
		foreach ($obj as $i => $node) {
			if ($node['isParent'] == 'true' && count($node['children']) == 1) {
				$obj[$i] = $node['children'][0];
			} 
		}
	}

	/**
	 * This function will handle comparing two JSON trees
	 * @param json: the tree containing the actual answer, or what we're comparing the user's answer to
	 * @param response: the user's response
	 *
	 * @return bool, whether the JSON trees match each other or not
	 **/ 
	function compare_json($response) {
		// If user put the whole tree in a seperate group, take the nodes out of the root folder
		if (count($response) == 1) $response = $response[0]['children'];

		cleanup_response($response);

		push_children_in_str($response);
		
		return ($_SESSION['user_response']);
	}
?>