<?php
include('db.php');
$requestID = $_REQUEST['d'];
$requestQuery = "DELETE FROM payment WHERE subID = '$requestID'";
$delete = mysqli_query($con,$requestQuery);
if ($delete) {
	header("Location: ../subscriber.php?success");
	exit();
}else{
	header("Location: ../subscriber.php?fail");
	exit();

}