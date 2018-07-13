<?php
session_start();

	if (isset($_POST['submit'])) {
		require('db.php');
		$uid = mysqli_real_escape_string($con, $_POST['Username']);
		$pass = mysqli_real_escape_string($con, $_POST['password']);
		$sql = "SELECT * FROM admin WHERE Username = '$uid'";
		$query = mysqli_query($con, $sql);
		$result = mysqli_num_rows($query);
		if ($result < 1) {
			header("Location: ../index.php?error=3S");
			exit();
		}else{
			if ($row = mysqli_fetch_assoc($query)) {
				$hashed = password_verify($pass,$row['Password']);
				if ($hashed == false) {
					header("Location: ../index.php?error=1");
				}else{
					$_SESSION['username']=$row['Username'];
					$_SESSION['email']=$row['Email'];
					$_SESSION['adminID']=$row['admin_id'];
					$_SESSION['profPhoto']=$row['profilePhoto'];

					header("Location: ../adminPanel.php?success=1");

				}
			}
		}

	}
?>