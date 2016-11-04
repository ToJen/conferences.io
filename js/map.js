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
}