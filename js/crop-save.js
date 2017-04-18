$(document).ready(function(){
	$('#close-crop').on('click', function(e){
		$('#photo').imgAreaSelect({disable:true,hide:true});
		$('#photo').attr('src','');
		$('#crop-image')[0].reset();
	});

	$('#profile-pic').on('change', function(){
		$('#preview-profile-pic').html('');
		$('#preview-profile-pic').html('Uploading...');
		var data = new FormData(jQuery('#crop-image')[0]);
		$.ajax({
			url:  "update-pic.php",
			type: "POST",
			data: data,
			cache: false,
			processData: false,
			contentType: false,
			success: function(data)
			{
				$('#preview-profile-pic').html(data);
				$('img#photo').imgAreaSelect({
					aspectRatio: '1:1',
					handles: true,
					onSelectEnd: function(img, obj){
				        var x_axis = obj.x1;
				        var x2_axis = obj.x2;
				        var y_axis = obj.y1;
				        var y2_axis = obj.y2;
				        var thumb_width = obj.width;
				        var thumb_height = obj.height;
				        if(thumb_width > 0) {
							jQuery('#hdn-x1-axis').val(x_axis);
							jQuery('#hdn-y1-axis').val(y_axis);
							jQuery('#hdn-x2-axis').val(x2_axis);
							jQuery('#hdn-y2-axis').val(y2_axis);
							jQuery('#hdn-thumb-width').val(thumb_width);
							jQuery('#hdn-thumb-height').val(thumb_height);
				        } else {
				            alert("Please select portion..!");
						}
				    }
				});
				$('#image_name').val($('#photo').attr('file-name'));
			},
			error: function (jqXHR, exception)
			{
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404]';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {
		            msg = 'Requested JSON parse failed.';
		        } else if (exception === 'timeout') {
		            msg = 'Time out error.';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        console.log(msg);
		    }
		});
	});

	$('#save-crop').on('click', function(e){
		e.preventDefault();
		params = {
			targetUrl: 'update-pic.php?action=save',
			action: 'save',
			x_axis: $('#hdn-x1-axis').val(),
			y_axis: $('#hdn-y1-axis').val(),
			x2_axis: $('#hdn-x2-axis').val(),
			y2_axis: $('#hdn-y2-axis').val(),
			thumb_width: $('#hdn-thumb-width').val(),
			thumb_height: $('#hdn-thumb-height').val()
		};
		saveCropImage(params);
	});

	function saveCropImage(params)
	{
		var src = $('#photo').attr('src');
		var new_src = src.replace("_tmp","");

		$.ajax({
			url: params['targetUrl'],
			cache: false,
			dataType: "html",
			data: {
				action: params['action'],
				t: 'ajax',
				x1: params['x_axis'],
				y1: params['y_axis'],
				x2: params['x2_axis'],
				y2: params['y2_axis'],
				w1: params['thumb_width'],
				h1: params['thumb_height'],
				image_path: src,
				save_path: new_src
			},
			type: 'post',
			success: function(response) {
				$('#photo').imgAreaSelect({disable:true,hide:true});
				$('#profile-pic-modal').modal('hide');
				$(".imgareaselect-border1,.imgAreaSelect-border2,.imgAreaSelect-border3,.imgAreaSelect-border4,.imgAreaSelect-border2,.imgareaselect-outer").css('display', 'none');
				$('#profile-picture').attr('src', response + "?t=" + new Date().getTime());
				$('#preview-profile-pic').html('');
				$('#profile-pic').val();
				$('#crop-image')[0].reset();
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert('Status Code:' + xhr.status + 'Error Message:' + thrownError);
			}
		});
	}
});
