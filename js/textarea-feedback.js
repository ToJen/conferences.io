$(document).ready(function(){
	var maxLength = 255;
	$('#textarea-feedback').html(maxLength + ' characters remaining');

	$('#textarea').keyup(function(){
		var textLength = $('#textarea').val().length;
		var textRemaining = maxLength - textLength;

		$('#textarea-feedback').html(textRemaining + ' characters remaining');
	});
});