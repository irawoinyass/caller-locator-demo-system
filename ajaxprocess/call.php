<?php
session_start();
include('../DB/db.php');

$user_id = $_SESSION['user_id'];

	$me = mysqli_query($db, "SELECT * FROM `users` WHERE `id` = '$user_id' ");

	while ($row = mysqli_fetch_assoc($me)) {
		$c_name = $row['name'];
		$c_phone = $row['phone_number'];
	}

if (isset($_POST['user'])) {


	$user = $_POST['user'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$r_name = $_POST['name'];
	$r_phone = $_POST['phone'];

	$date = date('Y-m-d H:i:s');

//$call = mysqli_query($db, "INSERT INTO `calls`(`call_id`, `caller_id`, `receiver_id`, `caller_lat`, `caller_lng`, `date_time`) VALUES ('','$user','$user_id','$lat','$lng','oo' ");

$call = mysqli_query($db, "INSERT INTO `calls`(`call_id`, `caller_id`, `receiver_id`, `caller_lat`, `caller_lng`, `caller_name`, `caller_phone_number`, `receiver_name`, `receiver_phone_number`, `date_time`) VALUES ('','$user_id','$user','$lat','$lng','$c_name','$c_phone','$r_name','$r_phone','$date')");


if ($call) {
	echo 'success';
}else{

	echo mysqli_error($db);

	//echo 'Error, Please Try Again';

}






}










?>