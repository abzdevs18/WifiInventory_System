<?php
include('home.php');
?>

<div id="home">
	<div id="subHead">
		<span id="title-home">Account</span>
		<div class="subscriberContainer">
			<div class="subsContent">
				<form method="POST" action="include/updateProfile.php" enctype="multipart/form-data">
					
				<?php
					include('include/db.php');
					$adminID = $_SESSION['adminID'];
					$adminDisplay = " SELECT * FROM admin WHERE admin_id = '$adminID'";
					$query = mysqli_query($con,$adminDisplay);
					while ($rows = mysqli_fetch_array($query)) {?>
				<div class="adminProfile">
					<div class="adminProfileHead">
						<center>
							<div class="profileImageWrapper">
								<?php
								$image = $rows['profilePhoto'];
								if (empty($image)){?>
									<img src="include/defaults/defaultProf.png" style=" width: 100%;border-radius: 50%;" id="image">
									<input type="file" name="image" onchange="showImage.call(this)" name="fileupload" class="s-pf-i selectPhoto" style="margin-top: 0px;font-size: 10px;font-style: italic;position: relative;outline: none;opacity:0;z-index: 135">
									<label for="image" class="selectPhoto">select photo</label>
								<?php
							}elseif(!empty($image)){
								?>
								<?php echo "<img src='include/images/".$rows['profilePhoto']."' style='width: 100%;border-radius: 50%;' id='image'>";?>
									<input type="file" name="image" onchange="showImage.call(this)" name="fileupload" class="s-pf-i selectPhoto" style="margin-top: 0px;font-size: 10px;font-style: italic;position: relative;outline: none;opacity:0;z-index: 135">
									<label for="image" class="selectPhoto">select photo</label>
							<?php
						}else{
								?>
								<img src="<?php echo "<img src='include/images/".$rows['profilePhoto']."'>"; ?>" style="display: none; width: 100%;border-radius: 3px;" id="image">
									<input type="file" name="image" onchange="showImage.call(this)" name="fileupload" class="s-pf-i selectPhoto" style="margin-top: 0px;font-size: 10px;font-style: italic;position: relative;outline: none;opacity:0;z-index: 135">
									<label for="image" class="selectPhoto">select photo</label>
							<?php
						}
						?>
							</div>
							<span style="font-size: 18px;"><?php echo $_SESSION['username']; ?></span><br>
							<span style="font-size: 15px;font-style: italic;color: orange;"><?php echo $_SESSION['email']; ?></span>
						</center>						
					</div>
					<div class="adminProfileDetails">
						<span style="color: #f3f3f3;font-weight: bold;font-size: 20px;margin-top: 20px;">Profile Information</span>
						<hr style="border: 2px solid #868686;margin-bottom: 4px;margin-top: 10px;border-radius: 1px;">
						<center class="cen">
							<div class="profileInputDetails">
								<div class="profileInputDetailsRight">
									<span>Username</span><br>
									<input type="text" name="uname" value="<?php echo $rows['Username']; ?>"><br>
									<span>Email</span><br>
									<input type="text" name="email" value="<?php echo $rows['Email']; ?>">
								</div>
								<div class="profileInputDetailsLeft">
									<span>Lastname</span><br>
									<input type="text" name="fname"  value="<?php echo $rows['Firstname']; ?>"><br>
									<span>Password</span><br>
									<input type="password" name="password" value="<?php echo $rows['Password']; ?>">
									
								</div>
							</div>
							<span>Description:</span><br>
							<textarea name="description" rows="10" cols="71" resize="none" autofocus="true">
								
							</textarea><br>
							<button type="submit" name="submit">update profile</button>							
						</center>
					</div>
				</div>
				<?php
				}
				?>

				</form>
			</div>
		</div>
	</div>
</div>
<?php
include('adminFooter.php');
?>