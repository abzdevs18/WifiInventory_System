<?php
	include ('header.php');

if (!$_SESSION['username']) {
	header("Location: index.php?mustloginFirst");
	exit();
}else{
?>
<div id="admin-container">
	<div id="bodyAdmin">
		<div id="topNav">
			<span class="resMenu" style="font-size: 40px;font-size: 33px;margin: -34px -45px;color: white;cursor: pointer;" onclick="show();">&#9776;</span>
			<span class="resTitle" style="padding: 16px;font-size: 25px;color: white;">INVENTORY</span>
			<div class="profMenu">
				<a href="account.php">
					<div id="account">
						<div class="contact">	
							<div style="text-align: right;"><?php echo $_SESSION['username'] ?></div>
							<div style="text-align: right;"><?php echo $_SESSION['email'] ?></div>
						</div>
						<div id="profile">
							<?php
								include('include/db.php');
								$adminID = $_SESSION['adminID'];
								$adminDisplay = " SELECT * FROM admin WHERE admin_id = '$adminID'";
								$query = mysqli_query($con,$adminDisplay);
								while ($rows = mysqli_fetch_array($query)) {

								$image = $rows['profilePhoto'];
								if (empty($image)){?>
									<img src="include/defaults/defaultProf.png">
							<?php
								}else{
									echo "<img src='include/images/".$rows['profilePhoto']."'>";
								}
							}
							?>
						</div>
					</div>
				</a>
				<div class="threeDotMenu">
					<img src="img/3.png">
				<div style="width: 40px;height: 100px;background-color: red;display: none;" id="hi">
				</div>	
					

				</div>			
			</div>
		</div>
			<div class="logout">
				<form method="post" action="include/logout.php">
					<a href="account.php" style="padding-right: 10px;">Account</a>
					<button name="logout">Sign Out</button>	
				</form>
			</div>
		<div id="sideMenu">
			<a href="adminPanel.php">
				<div class="navIcons logoBorder">
					<div id="imageContainer">
						<img src="img/logo.ico">
					</div>
					<span style="color: white;">INVENTORY</span>
				</div>
			</a>
			<div class="hiddenMenu">

			<a href="adminPanel.php" id="homePage">
			<div class="navIcons one <?php if($currentPage == 'home'){echo 'active';}?>">
				<div id="imageNav">
					<img src="img/home.png">
				</div>
				<span>Home</span>
			</div></a>

			<a href="subscriber.php" id="subscriber">
			<div class="navIcons one <?php if($currentPage == 'subscriber'){echo 'active';}?>">
				<div id="imageNav">
					<img src="img/group.png">
				</div>
				<span>Subscribers</span>
			</div></a>

			<a href="receipt.php" id="receipt">
			<div class="navIcons one <?php if($currentPage == 'receipt'){echo 'active';}?>">
				<div id="imageNav">
					<img src="img/receipt.png">
				</div>
				<span>Receipts</span>
			</div></a>
				
			</div>
		</div>
<?php 
}
?>
