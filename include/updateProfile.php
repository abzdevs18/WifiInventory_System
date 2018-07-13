<?php
	session_start();

	if (isset($_POST['submit'])) {
		include ('db.php');
		$adnum = $_SESSION['adminID'];

		$uname = $_POST['uname'];
		$fname = $_POST['fname'];
		$email = $_POST['email'];
		$pass=$_POST['password'];
		$des =$_POST['description'];
		$target = "images/".basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];
		$query = "UPDATE admin SET Username='$uname', Firstname='$fname', Email='$email', Password='$pass', profileDescription='$des', profilePhoto='$image' WHERE admin_id = '$adnum'";
		$fred = mysqli_query($con,$query);
		if ($fred){
			if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
				header("Location: ../account.php?success");
				exit(); 
				}
			else{
			header("Location: ../account.php?fail");
			exit();}  	
		}
	}

		