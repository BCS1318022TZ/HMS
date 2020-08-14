<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
include("head.php");
?>
<body>
	<div class="container-fluid">
		<div class="row content">
			<?php
			include("sideNav.php");
			?>
			<div class="col-sm-9">
				<h4>
					<h3 style="color: blue;text-transform: uppercase;">
						VIEW YOUR APPLICATION - <?php echo $_SESSION["status"]; ?>
					</h3>
				</h4>
				<hr>
				<!-- Content -->
				<p style="font-size: 24px; color: green">Please Wait 24 hrs to see your application Respond</p><br>
				<!-- session -->
                <?php if(isset($_SESSION['success'])){?>
                  <label style="color: green; font-size: 20px; text-align: center;">
                    <?php echo $_SESSION['success']; ?>
                    
                  </label>
                <?php }?>
                <!-- end session -->
				<!-- END OF Content  -->
			</div>
		</div>
		<?php
		unset($_SESSION['success']);
        unset($_SESSION['fail']);
		include("footer.php");
	?>
</body>
</html>