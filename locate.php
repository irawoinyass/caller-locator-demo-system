
<?php
include('DB/db.php');


session_start();
if(!isset($_SESSION['user_id'])){
header("location: index.php");
}else{

	$user_id = $_SESSION['user_id'];

	$me = mysqli_query($db, "SELECT * FROM `users` WHERE `id` = '$user_id' ");

	while ($row = mysqli_fetch_assoc($me)) {
		$name = ucfirst($row['name']);
	}

    $calls = mysqli_query($db, "SELECT * FROM `calls` WHERE `caller_id` = '$user_id' OR `receiver_id` = '$user_id' ORDER BY `call_id` DESC ");


	if(isset($_GET['locator'])){

	$call_id = $_GET['locator'];


	$call = mysqli_query($db, "SELECT * FROM `calls` WHERE `call_id` = '$call_id' ");

	while ($row = mysqli_fetch_assoc($call)) {

	$caller_name = $row['caller_name'];
	$caller_number = $row['caller_phone_number'];
	$caller_lat = $row['caller_lat'];
	$caller_lng = $row['caller_lng'];
	$time_called = $row['date_time'];
		
	}


	$apis = mysqli_query($db, "SELECT * FROM `api` WHERE `id` = 1 ");

	while ($row = mysqli_fetch_assoc($apis)) {

	$api = $row['secret_key'];
	
		
	}




?>







<!DOCTYPE html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Expert System - Locator</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <style type="text/css">
  	
.cont{

	height: 450px;
	width: 1000px;
	margin: 0 auto;

}


#map{

	width: 100%;
	height: 100%;
	border: 1px solid blue; 
}


  </style>

</head>
<html>
<body id="wrapper">
	<?php include('template/header.php')?>

<br/>
 <input type="hidden" name="lat" id="lat" value="<?php echo $caller_lat;?>">

  <input type="hidden" name="lng" id="lng" value="<?php echo $caller_lng;?>">

 <!--  <p id="lat"><?php //echo $caller_lat;?></p>
  <p id="lng"><?php //echo $caller_lng;?></p>
   -->

<div class="cont">
	<h5>Caller Name: <?php echo $caller_name;?></h5>
	<h5>Caller Phone Number: <?php echo $caller_number;?></h5>
	<h5>Caller Latitude: <?php echo $caller_lat;?></h5>
	<h5>Caller Longitude: <?php echo $caller_lng;?></h5>
<div id="map"></div>


</div>


   <?php include('template/footer.php')?>

 <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="js/map.js"></script>


 
    <script async
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo $api;?>&callback&callback=LoadMap">
    </script>
</body>
</html>




<?php

	}

	}



?>