function LoadMap(){

// var lats = +$('#lat').val();
// var lngs = +$('#lng').val();

var lats = parseFloat($('#lat').val());
var lngs = parseFloat($('#lng').val());

	// var new_lat = parseFloat(lats);
	// var new_lng = parseFloat(lngs);


	//console.log(new_lat);
	

	// var pune = {lat:lats, lng:lngs};
	// var map = new google.maps.Map(document.getElementById('map'), {

	// 	zoom:20,
	// 	center: pune
		
	// });


	// var marker = new google.maps.Marker({

	// 	position: pune,
	// 	map:map

	// });

var mapOptions = {
	    center: { lat: lats, lng: lngs },
	    zoom: 8
	};
	var map = new google.maps.Map(document.getElementById('map'), mapOptions);

		
var marker = new google.maps.Marker({

		position: { lat: lats, lng: lngs },
		map:map

	});








}


