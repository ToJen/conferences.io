$(function () {

	function initMap() {
		var location = new google.maps.LatLng(47.5737975,-52.7329053);

		var mapCanvas = document.getElementById('map');
		var mapOptions = {
			center: location,
			zoom: 10,
			panControl: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		var map = new google.maps.Map(mapCanvas, mapOptions);
	}

	// google.maps.event.addDomListener(window, 'load', initMap);

});

// $(function () {

//     function initMap() {

//         var location = new google.maps.LatLng(50.0875726, 14.4189987);

//         var mapCanvas = document.getElementById('map');
//         var mapOptions = {
//             center: location,
//             zoom: 16,
//             panControl: false,
//             mapTypeId: google.maps.MapTypeId.ROADMAP
//         }
//         var map = new google.maps.Map(mapCanvas, mapOptions);

//     }

//     google.maps.event.addDomListener(window, 'load', initMap);
// });