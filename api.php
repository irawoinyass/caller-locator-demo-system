<?php

include('DB/db.php');


if (isset($_GET['api'])) {
	
$api = $_GET['api'];


$update = mysqli_query($db, "UPDATE `api` SET `secret_key`='$api' WHERE `id` = 1");

if ($update) {

	echo 'Api Key Has Been Changed, you can now exist this page';

}else{

	echo 'Error, Please try Again';

}




}




?>