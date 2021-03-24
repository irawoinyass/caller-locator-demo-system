unuse<?php


  $lat = ' 6.5243793';
    $lng = '3.3792057';

    $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.$lat.','.$lng.'&sensor=false';
    $json = @file_get_contents($url);
    $data = json_decode($json);

    print_r($json);
    // $status = $data->status;
    // if($status=="OK") {
    //     //Get address from json data
    //     for ($j=0;$j<count($data->results[0]->address_components);$j++) {
    //         $cn=array($data->results[0]->address_components[$j]->types[0]);
    //         if(in_array("locality", $cn)) {
    //             $city= $data->results[0]->address_components[$j]->long_name;
    //         }
    //     }
    //  } else{
    //    echo 'Location Not Found';
    //  }
    //  //Print city 
    //  echo $city;



?>






<!DOCTYPE html>
<html>
<body>

<!-- <p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>

<p id="demo"></p>

<p id="lat"></p> -->



<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <p><button onclick="getLocation()">Get My Location</button></p>
<p id="demo"></p>

<!--  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHpWqBfhPU-owmEigD_YhwyURN9h1j7eo&callback=initMap"
  type="text/javascript"></script> -->

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK7lXLHQgaGdP3IvMPi1ej0B9JHUbcqB0&amp;callback=initMap"></script>

<script>




// var x = document.getElementById("demo");

// function getLocation() {
//   if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(showPosition);
//   } else { 
//     x.innerHTML = "Geolocation is not supported by this browser.";
//   }
// }

// function showPosition(position) {
//   x.innerHTML = "Latitude: " + position.coords.latitude + 
//   "<br>Longitude: " + position.coords.longitude;
//   $('#lat').html(position.coords.latitude);
// }



var x=document.getElementById("demo");
function getLocation(){
    if (navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showPosition,showError);
    }
    else{
        x.innerHTML="Geolocation is not supported by this browser.";
    }
}

function showPosition(position){
    lat=position.coords.latitude;
    lon=position.coords.longitude;
    displayLocation(lat,lon);
}

function showError(error){
    switch(error.code){
        case error.PERMISSION_DENIED:
            x.innerHTML="User denied the request for Geolocation."
        break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML="Location information is unavailable."
        break;
        case error.TIMEOUT:
            x.innerHTML="The request to get user location timed out."
        break;
        case error.UNKNOWN_ERROR:
            x.innerHTML="An unknown error occurred."
        break;
    }
}

function displayLocation(latitude,longitude){
    var geocoder;
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(latitude, longitude);

    geocoder.geocode(
        {'latLng': latlng}, 
        function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var add= results[0].formatted_address ;
                    var  value=add.split(",");

                    count=value.length;
                    country=value[count-1];
                    state=value[count-2];
                    city=value[count-3];
                    x.innerHTML = "city name is: " + city;
                }
                else  {
                    x.innerHTML = "address not found";
                }
            }
            else {
                x.innerHTML = "Geocoder failed due to: " + status;
            }
        }
    );
}
</script>

</body>
</html>
