<?php
	session_start();

	if (isset($_POST['upImage'])) {
		include ('db.php');
		$adnum = $_SESSION['adminID'];

		$desImage = $_POST['fCaption'];
		$image = $_POST['image'];
		$upTime = $_POST['dateUpload'];

		$target = "images/".basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];

		$sql = "INSERT INTO receipt(postDescription,postTime,postImage,adminId) VALUES ('$desImage','$upTime','$image',(SELECT admin_id FROM admin WHERE admin_id = '$adnum'))";

		mysqli_query($con,$sql);
	if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
		header("Location: ../receipt.php?upload=Success");
		exit();
		}

	else{
		header("Location: ../receipt.php?upload=failed");
		exit();
	}
	}
?>