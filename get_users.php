<?php
if(!empty($_GET['search'])){
	include 'include/db.php';
	$q=$_GET['search'];
	$sql="SELECT * FROM subsdetails WHERE subName LIKE '%$q%'";
	$query=mysqli_query($con,$sql);
	while ($row=mysqli_fetch_array($query)) {?>
		<div id="user">
			<div id="profCol">
				
			</div>
			<span><a href="#"><?php echo ucfirst($row['subName']);?></a></span>
		</div>
	<?php
	}
}
?>
<script>
	var modal=document.getElementById("popUp");
	var btn=document.getElementById("user");
	var close=document.getElementsByClassName("close")[0];
	btn.onclick=function(){
		modal.style.display="block";
	}
	close.onclick=function(){
		modal.style.display="none";
	}
	window.onclick=function(event){
		if (event.target==modal){
			modal.style.display="none";
		}
	}
</script>
