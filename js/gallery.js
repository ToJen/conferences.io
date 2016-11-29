$(document).ready(function() {

	loadImages(true, 'a.thumbnail');

	function disableButton(max, current) {
		$('#previous, #next').prop('disabled', false);

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
			if($(this).attr('id') == 'previous')
				curr_img--;
			else
				curr_img++;

			selector = $('[data-image-id="' + curr_img + '"]');
			updateModal(selector);
		});

		function updateModal(selector) {
			var $sel = selector;
			curr_img =  $sel.data('image-id');
			$('#imgLabel').text($sel.data('title'));
			// console.log($sel.data('title'));	// debug
			// $('#imgCaption').text(getCaption($sel));	// retreive each caption dynamically
			$('#imgCaption').text($sel.data('caption'));
			$('#imgDisplay').attr('src', $sel.data('image'));
			disableButton(counter, $sel.data('image-id'));
		}

		// retrun individual image captions
		/*function getCaption(selector) {
			var $sel = selector;
			if($sel.data.('title') == "Bruneau Centre for Innovation and Research")
				return getElementById('inco').innerHTML;
		}*/

		if(setIDs == true) {
			$('[data-image-id]').each(function() {
				counter++;
				$(this).attr('data-image-id', counter);
			});
		}
		$(setClickAttr).on('click', function() {
			updateModal($(this));
		});

	}

});