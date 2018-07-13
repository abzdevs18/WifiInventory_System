<?php
	session_start();

	if (isset($_POST['submit'])) {
		include ('db.php');
		$adnum = $_SESSION['adminID'];

		$name = $_POST['name'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['Gender'];
		$email=$_POST['emailSub'];
		$target = "images/".basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];
		$query = "INSERT INTO subsdetails(subName,subLastname,subGender,email,subPhoto,adminId) VALUES('$name','$lastname','$gender','$email','$image',(SELECT admin_id FROM admin WHERE admin_id = '$adnum'))";
if (mysqli_query($con,$query)) {
    $last_id = mysqli_insert_id($con);
    $devices = implode(',', $_POST['device']);
    $mac = implode(',', $_POST['mac']);
    $insert = "INSERT INTO devices(devices,deviceMac,subID) VALUES ('$devices','$mac',(SELECT subID FROM subsdetails WHERE subID = '$last_id'))";
    	if (mysqli_query($con, $insert))  {
		    $sdate = $_POST['sdate'];
		    $edate = $_POST['edate'];
		    $sbill = $_POST['bill'];
		    $payStyle = $_POST['pStyle'];
    		$in = "INSERT INTO payment(subsStart,subsEnd,subsBill,subsStyle,subID) VALUES ('$sdate','$edate','$sbill','$payStyle',(SELECT subID FROM subsdetails WHERE subID='$last_id'))";
    		if (mysqli_query($con, $in))  {
				header("Location: ../subscriber.php?suc");
				exit();    	
				}	
    	}
}
	if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {

		header("Location: ../subscriber.php?echo $last_id");
		exit();
		}

	else{
		header("Location: ../subscriber.php?upload=failed");
		exit();
	}
	}
?>