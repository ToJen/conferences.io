function initMap() {

	var location = new google.maps.LatLng(47.573382,-52.730641);

	var mapCanvas = document.getElementById('map');
	var mapOptions = {
		center: location,
		zoom: 17,
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
		maxWidth: 400
	});

	marker.addListener('click', function() {
		infoWindow.open(map, marker);
	});

	var currLocImg = "imgs/bluecircle.png";

	if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
	      var pos = {
	        lat: position.coords.latitude,
	        lng: position.coords.longitude
	      };
	      // console.log(pos);	// debug
				var userMarker = new google.maps.Marker({
					position: pos,
					map: map,
					icon: currLocImg
				});
	      map.setCenter(pos);
    	}, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } 
  else { // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
  
  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
      'Error: The Geolocation service failed.' :
      'Error: Your browser doesn\'t support geolocation.');
  }

}