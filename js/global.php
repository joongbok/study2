<script type="text/javascript">
	$.globals = {};
	$.globals.drops = 0;

	<?php
		if ($images_array[$_SESSION['img_num']] == 'pro' || $images_array[$_SESSION['img_num']] == 'com') {
			?>
			$.globals.nodes = [{name : "A"}, {name : "B"}, {name : "C"}, {name : "D"}, {name : "E"}];
			<?php
		}
	?>
	function checkAnswers() {
		var zTree = $.fn.zTree.getZTreeObj("tree");
		var nodes = zTree.getNodes();
		
		var folderExists = false;
		for (var i = 0; i < nodes.length; i++) {
			if (nodes[i].isParent) {
				folderExists = true;
			}
		}

		if (!folderExists) {
			alert("You must have at least one group to continue.");
			return;
		}

		$.post("ajax/<?= $tests[$_SESSION['test_num']]; ?>.php", {"nodes" : nodes, numDrops: $.globals.drops}, function(data) {
			var obj = JSON && JSON.parse(data) || $.parseJSON(data);

			var title = (obj['result'] == true) ? "You're Correct." : "Incorrect!";
			$.msgBox({
				title: title + " Refer to the answer.",
				content: "",
				type: "<?= $images_array[$_SESSION['img_num']]; ?>",
				button: [{ value: "OK" }],
				success: function(result) {
					window.location.href = obj['redirect'];
				},
				opacity: 0.7
			});
		});
	}

	function saveAnswers() {
		var zTree = $.fn.zTree.getZTreeObj("tree");
		var nodes = zTree.getNodes();
		
		var folderExists = false;
		for (var i = 0; i < nodes.length; i++) {
			if (nodes[i].isParent) {
				folderExists = true;
			}
		}

		if (!folderExists) {
			alert("You must have at least one group to continue.");
			return;
		}

		$.post("ajax/<?= $tests[$_SESSION['test_num']]; ?>.php", {"nodes" : nodes, numDrops: $.globals.drops}, function(data) {
			//var obj = JSON && JSON.parse(data) || $.parseJSON(data);

			/*$.msgBox({
				title: "Thanks for your submission, please continue to the next test.",
				content: "",
				type: "<?= $images_array[$_SESSION['img_num']]; ?>",
				button: [{ value: "OK" }],
				success: function(result) {
					window.location.href = obj['redirect'];
				},
				opacity: 0.7
			});*/
			console.log(data);
		});
	}



</script>