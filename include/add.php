<?php

if (isset($_POST['submit'])) {
	include 'db.php';
	$uname=mysqli_real_escape_string($con,$_POST['username']);
	$firstname=mysqli_real_escape_string($con,$_POST['firstname']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$pass = mysqli_real_escape_string($con,$_POST['password']);
	$cPass = mysqli_real_escape_string($con,$_POST['conPass']);

	if ($cPass !== $pass) {
		header("Location: ../index.php?error=1");
		exit();
	}else{
		$check = mysqli_query($con,"SELECT * FROM admin WHERE Username = '$uname'");
		$rows = mysqli_num_rows($check);
		if ($rows > 0) {

			header("Location: ../index.php?error=1");
			exit();
		}else{
			$passHast = password_hash($pass,PASSWORD_DEFAULT);
			$query = mysqli_query($con, "INSERT INTO admin (Username,Firstname,	Email,Password)
			VALUES ('$uname','$firstname','$email','$passHast')");
		
			header("Location: ../index.php?sign=success");
			exit();
		}
	}

}