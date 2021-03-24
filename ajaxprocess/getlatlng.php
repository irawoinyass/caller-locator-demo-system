<?php

include('../DB/db.php');

if (isset($_POST['call_id'])) {
	

	$call_id = $_POST['call_id'];


	$call = mysqli_query($db, "SELECT * FROM `calls` WHERE `call_id` = '$call_id' ");

	while ($row = mysqli_fetch_assoc($call)) {

	$caller_name = $row['caller_name'];
	$caller_number = $row['caller_phone_number'];
	$caller_lat = $row['caller_lat'];
	$caller_lng = $row['caller_lng'];
	$time_called = $row['date_time'];
		
	}


	echo $caller_lat;


}


















?>