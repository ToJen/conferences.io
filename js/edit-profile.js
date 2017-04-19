$(document).ready(function(){
	var phones = [{ "mask": "(###) ###-####" }]; // add masks for allowed phone no formats
	$('#phno').inputmask({
		mask: phones,
		greedy: false,
		definitions: { '#': { validator: "[0-9]", cardinality: 1 }}
	});
});