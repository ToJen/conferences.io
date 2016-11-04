function initMap() {
	var location = new google.maps.LatLng(47.5716807,-52.7354585);

	var mapCanvas = document.getElementById('map');
	var mapOptions = {
		center: location,
		zoom: 10,
		panControl: false,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map = new google.maps.Map(mapCanvas, mapOptions);
}