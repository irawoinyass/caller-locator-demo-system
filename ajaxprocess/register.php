<?php



include('../DB/db.php');


if (isset($_POST['name']) AND isset($_POST['password']) AND isset($_POST['phone_number'])) {

$name = $_POST['name'];
		$password = md5($_POST['password']);

		$phone_number = $_POST['phone_number'];

	$checkphone = mysqli_query($db, "SELECT * FROM `users` WHERE `phone_number`='$phone_number' ");


$phonecount = mysqli_num_rows($checkphone);

if ($phonecount > 0) {
	
	echo 'Phone Number Taken Already';
}else{


	$count = mysqli_query($db, "SELECT * FROM `users` ");
	$countall = mysqli_num_rows($count);

	$addone = $countall+1;


	$add = mysqli_query($db, "INSERT INTO `users`(`id`, `name`, `phone_number`, `password`) VALUES ('','$name','$phone_number','$password')");

		if ($add) {
			session_start();

			$_SESSION["user_id"] = $addone;
			echo 'success';
			
		}else{

			echo 'Opps, An Error Just Occur Please Try Again';
		}


}



}else{


	echo 'Something went wrong, please try again';


}







?>
