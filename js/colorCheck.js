function checkColor() {
	var response = $("#txt-color-response").val();

	$.post("ajax/color_check.php", {"response" : response}, function(data) {
		var obj = JSON && JSON.parse(data) || $.parseJSON(data);

		var title = (obj['result'] == true) ? 'Correct!' : 'Incorrect';

		$.msgBox({
			title: title,
			content: "",
			type: "color_test",
			button: [{ value: "OK" }],
			success: function(result) {
				window.location.href = obj['redirect'];
			},
			opacity: 0.7
		});
	});
}
