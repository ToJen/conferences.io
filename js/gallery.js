$(document).ready(function() {

	loadImages(true, 'img.thumbnail');

	function disableButton(max, current) {
		$('#previous, #next').show();

		if (max == current) {
			$('#next').prop('disabled', true);
		}
		else if (current == 1) {
			$('#previous').prop('disabled', true);
		}
	}

	function loadImages(setIDs, setClickAttr) {
		var curr_img, selector, counter=0;

		$('#previous, #next').click(function() {
			
		});

	}

});