function initMap() {

	var location = new google.maps.LatLng(47.5716807,-52.7354585);

	var mapCanvas = document.getElementById('map');
	var mapOptions = {
		center: location,
		zoom: 15,
		panControl: false,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map = new google.maps.Map(mapCanvas, mapOptions);

	var markerImage = "imgs/marker.png";
	var marker = new google.maps.Marker({
		position: location,
		map: map,
		icon: markerImage
	});

	var infoText = '<div class="info-window">' +
										'<h3>Info Window Content</h3>' +
										'<div class="info-content">' +
											'<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>' +
										'</div>' +
									'</div>';

	var infoWindow = new google.maps.InfoWindow({
		content: infoText,
		maxWidth: 4000,
		maxHeight: 1000
	});

	marker.addListener('click', function() {
		infoWindow.open(map, marker);
	});

}