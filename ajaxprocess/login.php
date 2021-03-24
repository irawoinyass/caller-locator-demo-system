<?php

include('../DB/db.php');

	if (isset($_POST['username']) AND isset($_POST['password'])) {

		$username = $_POST['username'];
		$password = md5($_POST['password']);

		$validate = mysqli_query($db, "SELECT * FROM `users` WHERE `phone_number`='$username' AND `password` = '$password' ");

		$num_row = mysqli_num_rows($validate);

		if ($num_row < 1) {
			echo 'combination of wrong username or password';
		}else{

			session_start();

			while ($row = mysqli_fetch_assoc($validate)) {
				
				$_SESSION["user_id"] = $row["id"];

				echo 'success';
			}

		}
		
	}else{

		echo 'Something went wrong, please try again';

	}














?>