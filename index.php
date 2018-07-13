<?php
session_start();
include 'include/db.php';
?>
<!DOCTYPE>
<html>
<head>
	<title>Wifi_Inventory</title>
	<link rel="stylesheet" type="text/css" href="style/search.css">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" href="style/modal.css">
	<link rel="stylesheet" type="text/css" href="style/account.css">
	<link rel="stylesheet" type="text/css" href="style/jquery-ui.structure.min.css">
	<link rel="stylesheet" type="text/css" href="style/jquery-ui.min.css">
	<!--<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
	<script type="text/javascript" src="script/jquery.js"></script>
	<script type="text/javascript" src="script/jquery-ui.min.js"></script>
	<script type="text/javascript" src="script/custom.js"></script>
	<script type="text/javascript" src="script/chart.js"></script>
	<style type="text/css">
		
		body {
				background: url('../img/background.jpg');
	background-size: cover;
	background-repeat: no-repeat;
	width: var(--width);
	min-height: 100vh;	
	position: fixed;
	display: block;
		}
	</style>
</head>
<body>
	<div id="main">
		<div class="colBack">
			<nav>
				<div id="wrap">
					<div id="logo">
						<a href="index.php">
						<img src="img/logo.png">
						</a>
					</div>	
					<div id="wrapSearch">
						<div id="searchInput">
							<form method="GET" action="get_users.php">
									<input id="search" type="text" name="search" placeholder="Search your name...">
								<div id="searchIcon">
									<img src="img/search.png">
								</div>
							</form>
							<div id="back_result"></div>						
						</div>
						<div id="signIn">
							<button id="pop">SIGN IN</button>
						</div>
					</div>
				</div>
			</nav>
			<div id="content">
				<div id="form">
					<div id="formContent">
						<form id="adminCre" method="POST" action="include/add.php">
							<span>REGISTER</span><hr style="margin-top: 5px;border:2px solid gray;border-radius: 3px;">
								<input id="f" type="text" name="username" placeholder="Username" style="margin-top: 33px;"><br>
								<input id="f" type="text" name="firstname" placeholder="Firstname"><br>	
							
							<input type="text" name="email" placeholder="Email"><br>
							<input type="password" name="password" placeholder="Password"><br>
							<input type="password" name="conPass" placeholder="Confirm Password"><br>

							<?php
							if (isset($_GET['error']) == true) {
							echo "<center style='width:420px;height:36px;color:white;background-color:red;font-size: 20px;color: #e0f2f1;margin-bottom: 0;position: absolute;border-radius: 4px;'>
							<p style='padding-top: 5px;'>something went wrong</p></center>";
							}
							?><br>

							<button id="sub" type="submit" name="submit">PROCEED</button>
						</form>
					</div>
				</div>
				<div id="wrong" title="password check">
					<span>Please check credentials</span>
				</div>
				<div id="welcome">
					<div id="welNote">
						<p style="margin-top: 10px;">Welcome to <strong>WIFI USER INVENTORY SYSTEM</strong></p>
						<p>Record the device Connected to your <strong>Wi-Fi Network</strong></p>
					</div>
					<div id="wrapvideo">
						<div id="video">
							<video width="677" height="600" autoplay muted loop>
								<source src="video/small.webm">
								 <source src="video/small.mp4" type="video/mp4">  
								Browser not supported
							</video>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div id="footer">
		</div>
	<div class="modal" id="popUp">
		<div id="modalContent">
			<form action="include/signIn.php" method="POST">
				<div id="loginInfo">
					<strong>Sign In</strong><br>
					<input type="text" name="Username" placeholder="Username"><br>
					<input type="password" name="password" placeholder="Password"><br>
					<button type="submit" name="submit">SIGN IN</button>
				</div>
				<div class="close">
					<strong>CLOSE</strong>
				</div>
			</form>
		</div>
	</div>

	<div class="modal" id="popUp">
		<div id="modalContent">
			<div id="profInfo">
			</div>
			<div class="close">
				<strong>CLOSE</strong>
			</div>
		</div>
	</div>
<script>
	var modal=document.getElementById("popUp");
	var btn=document.getElementById("pop");
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
<script>
	function pass(){
		
	}
</script>


</body>
</html>
