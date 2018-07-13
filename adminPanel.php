<?php
	$currentPage = "home";
include('home.php');
?>
			<div id="home">
				<div id="chartContainer">
					<span id="title-home">Home</span>
					<div class="homeContent">
						<div class="chartReport">
							<div style="width: 600px;background-color: white;margin: 21px 21px;position: absolute;">
								<span style="color:white;position: absolute;padding: 3px 20px; background-color: #222;margin: -15px;border-radius: 30px;border: 3px solid #555;font-weight: bold;float: left;">Statistic</span>
								<canvas id="myChart"></canvas>	
							</div>
							<div id="pieContainer">
								<span id="pieSpan" style="color:white;position: absolute;padding: 3px 20px; background-color: #222;border-radius: 30px;border: 3px solid #555;font-weight: bold;float: left;">Devices</span>
								<div style="width: 258px;background-color: white;margin: 21px 21px;float: right;">
									<canvas id="dough"></canvas>	
								</div>								
							</div>
						</div>
					</div>
					<span id="long-term-title">Long Term Users</span>

					<div class="longUser">
						<style type="text/css">
							#topUser {
								width: 328.3px;
								height: 98px;
							}
							#lowUser {
								width: 328.3px;
								height: 98px;
							}
							center{
								font-size: 20px;
								font-weight: bold;
							}
							#topUser-prof {
								width: 70px;
								height: 70px;
								left: 0;
								right: 0;
								margin-top: 5px;
								margin-right: auto;
								margin-left: auto;

							}
							#topUser-prof > img{
								width: 70px;
								height: 70px;
								border: 4px solid gray;
								border-radius: 50%;
								background-color: #222;
							}
						</style>
						<?php
							include('include/db.php');
							$ref = $_SESSION['adminID'];
							$query = " SELECT subID, subName, email, subPhoto FROM subsdetails WHERE adminId = '$ref'";
							$result=mysqli_query($con,$query);
							while ($rows = mysqli_fetch_array($result)) {
								$idofSubs = $rows['subID'];
								?>

							<div id="luser">
								<div id="topUser">
									<div id="topUser-prof" style="float: center;">
										<?php echo "<img src='include/images/".$rows['subPhoto']."'>"; ?>
									</div>
								</div>
								<div id="lowUser">
									<center><?php echo $rows['subName'];?></center>
									<?php 
									$date = "SELECT subsStart FROM payment WHERE subID='$idofSubs' AND subsStart = '01/01/2015'";
									$r = mysqli_fetch_array(mysqli_query($con,$date));
									?>
									<p style="font-style: italic;font-size: 13px;margin-left: 59px;">since: <span><?php echo $r['subsStart']; ?></span></p>
									<p style="font-style: italic;font-size: 13px;margin-left: 59px;">social: <span><?php echo $rows['email'];?></span></p>
									<?php 
									$device = "SELECT devices FROM devices WHERE subID='$idofSubs'";
									$dev = mysqli_fetch_array(mysqli_query($con,$device));
									?>
									<p style="font-style: italic;font-size: 13px;margin-left: 59px;">devices: <span><?php echo $dev['devices']; ?></span></p>
								</div>
							</div>
						<?php
							}?>
					</div>

				</div>				
			</div>
<?php
include('adminFooter.php');
?>