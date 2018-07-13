<?php
$currentPage = "receipt";
include('home.php');
date_default_timezone_set('UTC');
$now = date('F d Y h:i:s A');
?>

<div id="home">
	<div id="receiptContainer">
		<span id="title-home">Receipt</span>
		<div class="receiptContent">	
			<div class="uploadDivision">
				<form method="POST" action="include/receiptAdd.php" enctype="multipart/form-data">
				<div class="uploadItem" style="width: 810px;">
					<div id="adminProf">
						<div id="profile" class="ex" style="width: 50px;
						height: 100%;border: none;border-radius: 1%;">
							<?php echo "<img src='include/images/".$_SESSION['profPhoto']."'>";?>
						</div>
						<div id="fileCaption">
							<input type="text" name="fCaption" style="outline: none;border: none;margin: 10px 0;width: 100%;background: none;padding: 30px;color: #f3f3f3;font-weight: bold;" placeholder="please give us detail about the photo....">
						</div>
					</div>
				</div>
				<div class="uploadOperation">
						<input type="text" name="dateUpload" value="<?php echo $now;?>" style="display: none;">
						<div style="float: left;margin-left: 10px;margin-top: 35px;" class="u-s">
							<input type="file" name="image" class="fileToUpload">
							<label class="u-s">choose photo</label>
						</div>
						<div style="float: right;margin-right: 10px;margin-top: 35px;" class="u-s">
							<button type="submit" name="upImage">Upload</button>
						</div>
				</div>
				</form>
			</div>
			<div class="r-p">
				<?php
					include('include/db.php');
					$adnum = $_SESSION['adminID'];
					$s = "SELECT * FROM receipt WHERE adminid = '$adnum' ORDER BY receiptId DESC";
					$r = mysqli_query($con,$s);
					while($t = mysqli_fetch_array($r)){?>
						
				<div class="r-p-l" style="height: 400px;margin-top: 40px;display: flex;flex-direction: column;">
					<div style="width: calc(100%-20px);height: 100px;border-bottom: 4px solid #333;display: flex;flex-direction: row;">
						<div id="profile" class="ex" style="width: 50px;
						height: 100%;border: none;border-radius: 1%;">
							<?php echo "<img src='include/images/".$_SESSION['profPhoto']."'>";?>
						</div>
						<div style="display: flex;flex-direction: column;margin: 27px 2px;">
							<span><?php echo $_SESSION['username']; ?></span>
							<span style="font-style: italic;font-size: 13px;"><?php echo $t['postTime'] ?></span>
						</div>
					</div>
					<div style="width: 600px;height: 240px;margin: auto;background-color: #333;margin-top: 12px;border-radius: 4px;overflow: hidden;">
						<?php echo "<img src='include/images/".$t['postImage']."' style='width:100%;'>";?>
					</div>
					<span style="margin: 12px 65px;font-style: italic;font-size: 13px;font-weight: bold">Photo Caption: <?php echo $t['postDescription'];?></span>
				</div>

				<?php 
				 }?>
			</div>	
		</div>		
	</div>	
</div>

<?php
include('adminFooter.php');
?>
