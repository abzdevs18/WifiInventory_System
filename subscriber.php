<?php
	$currentPage = "subscriber";
include('home.php');
?>

<div id="home">
	<div id="subHead">
		<span id="title-home">Subscriber</span>
		<div class="subscriberContainer">
			<div class="subsContent">
				<div id="subList">
					<?php 
					include('include/db.php');
					$keyId = $_SESSION['adminID'];
					$d = "SELECT * FROM subsdetails WHERE adminId = '$keyId'";
					$q = mysqli_query($con, $d);
					while ($row = mysqli_fetch_array($q)) {
					$id_ofSub=$row['subID'];?>
					<div class="s-l">
						<div class="s-l-up">
							<div class="s-l-d">
								<span style="margin-bottom: 10px;position: relative;">Name:  <?php echo $row['subName'];?></span><br>
								<?php 
								include ('include/db.php');
								$subDevices = "SELECT devices,deviceMac FROM devices WHERE subID = '$id_ofSub'";
								$request = mysqli_query($con, $subDevices);
								$displayDevices = mysqli_fetch_assoc($request);
								?>
								<span>Devices: <?php echo $displayDevices['devices'] ?></span><br>
								<span>MAC's:</span>
								<select>
									<option>
									<?php
									echo $displayDevices['deviceMac'];
									?></option>
								</select>
							</div>
							<span class="sp">-- PAYMENT DETAILS --</span>
							<div class="s-l-prof">
								<div class="s-i-prof">
										<?php echo "<img src='include/images/".$row['subPhoto']."'>";?>
								</div>
							</div>							
						</div>
						<div class="s-l-mid">
							<?php 
								include('include/db.php');

								$subscriber_details = "SELECT subID,subsStart,subsEnd,subsBill,subsStyle,subID FROM payment WHERE subID = '$id_ofSub'";
								$result_of_query_in_bills = mysqli_query($con,$subscriber_details);
								while ($rows_of_bills = mysqli_fetch_array($result_of_query_in_bills)) {?>

							<div style="width: 200px;height: 58;margin-left: 5px;">
								<div style="display: flex;flex-direction: column;">
									<span>Balance: <?php echo $rows_of_bills['subsStart'];?></span>
									<span>Advance: <?php echo $rows_of_bills['subsEnd'];?></span>
								</div>
							</div>
							<div style="width: 200px;height: 58;margin-right: 5px;">
								<div style="display: flex;flex-direction: column;">
									<span>Bill Status: <?php echo $rows_of_bills['subsBill'];?></span>
									<span>Month of: <?php echo $rows_of_bills['subsStyle'];?></span>
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="s-l-lo">
							<a href="include/update.php?d=<?php echo $row['subID'];?>">
							<div class="opImg">
								<img src="img/edit.png">
							</div>
							</a>
							<a href="include/delete.php?d=<?php echo $row['subID'];?>">
							<div class="opImg">
								<img src="img/delete.png">
							</div>
							</a>
						</div>
					</div>		

					<?php 
					}
					?>			
				</div>
				<div id="subAdd">
					<div style="width: 100%;height: 50px;background-color: #181818; border-bottom: 2px solid #333;">
						<center style="padding: 13px;font-weight: bold;">ADD SUBSCRIBER</center>
					</div>
							<style>
								form > input {
									width: 200px;
								}
								#groupDevice {
									display: flex;
									flex-direction: row;
								}
								.a-sbs > span {
									margin-bottom: 20px;

								}
							</style>
					<form action="include/subAdd.php" method="POST" enctype="multipart/form-data">
						<div style="display: flex;flex-direction: row;width: 500px;border-bottom: 2px solid #181818;">
							
							<div style="width: 350px;height: 360px;margin: 5px;overflow: hidden;" class="a-sbs">
								<span>Name</span><br>
								<input type="text" name="name" required><br>
								<span>Lastname</span><br>
								<input type="text" name="lastname" required><br>

								<div style="margin: 5px 0;" class="a-ss">
									<span>Gender</span>
									<div class="s-g-i" style="font-size: 13px;font-weight: bold;">
										<input type="radio" name="Gender" <?php if(isset($gender) && $gender == "Male") echo "checked"; ?> value="Male"><lable style="font-family: arial;font-weight: bold;color: #8b8e8e;">Male</lable>
										<input type="radio" name="Gender"  <?php if(isset($gender) && $gender == "Female") echo "checked"; ?> value="Female"><lable style="font-family: arial;font-weight: bold;color: #8b8e8e;">Female</lable>
									</div>
								</div>

								<div style="margin: 5px 0;" class="a-ss">
									<span>Devices</span>
									<div clas="s-d-i" style="font-size: 13px;font-weight: bold;margin-left: 20px;">
										<input type="checkbox" name="device[]" value="Android" >Android
										<input type="checkbox" name="device[]" value="IPhone" >IPhone
										<input type="checkbox" name="device[]" value="Computer" >Computer
									</div>
								</div>
								<span class="a-ss">MAC</span><br>
									<input type="text" name="mac[]"><br>
									<input type="text" name="mac[]"><br>
								<span class="a-ss">Email</span><br>
									<input type="text" name="emailSub" ><br>
							</div>
							<div class="s-sp">
								<div class="p-container">
									<img src="" style="display: none; height: 100%; width: 100%;border-radius: 3px;" id="image">
									<input type="file" name="image" onchange="showImage.call(this)" name="fileupload" class="s-pf-i" style="margin-top: 0px;font-size: 10px;font-style: italic;position: relative;outline: none;opacity:0;z-index: 1">
									<label for="image" style="z-index: -1;">select photo</label>
								</div>
								
							</div>
						</div>
						 <!-- d=date, s=start, e=end,  dt=details-->
						<span style="position: absolute;margin-top: -13px;background-color: #333;margin-left: calc(30%);font-size: 18;font-weight: bold;padding: 0 10px;">-- Subscription Details --</span>	
						<div style="margin: 15px 5px;">
							<div class="d-s_e">
								<div class="d-s">
									<span>Subscription Start:</span><br>
									<input type="text" name="sdate" id="d-s"><br><br>
								<span style="margin-top: 3px;position: absolute;">Subscription Bill</span><br>
								<select class="s-bill" name="bill">
									<option></option>
									<option>P50.00</option>
									<option>P100.00</option>
									<option>P150.00</option>
									<option>P200.00</option>
									<option>P250.00</option>
									<option>P300.00</option>
									<option>P350.00</option>
									<option>P400.00</option>
									<option>P450.00</option>
									<option>P500.00</option>
								</select>
								</div>
								<div class="d-e">
									<span>Subscription End:</span><br>
									<input type="text" name="edate" id="d-e"><br><br>
									<span>Payment Style</span><br>
									<select class="s-bill s-s-bil" placeholder="select" name="pStyle">
										<option></span></option>
										<option>Pay-Before-Used</option>
										<option>Used-Before-Pay</option>
									</select>
								</div>
							</div>
						</div>
						<div class="s-dt-sub">
							<button type="submit" name="submit">PROCEED</button>
						</div>					
					</form>
					</div>
				</div>
			</div>			
		</div>
		
	</div>	
</div>

<?php
include('adminFooter.php');
?>