<?php 
if ($_SESSION["status"]=="Admin"){
	?>
	<div class="col-sm-2 sidenav" style="min-height: 80px;">
		<h4 style="visibility: hidden;">MAIN NAVIGATION</h4>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="homeAdmin.php">Profile</a></li>
			<li><a href="manageStudent.php">Manage Student</a></li>
			<li><a href="manageRoom.php">Manage Room</a></li>
			<li><a href="manageHostel.php">Manage Hostel</a></li>
			<li><a href="manageApplication.php">Manage Application</a></li>
			<li><a href="logOut.php">LogOut</a></li>
		</ul>
	</div>
	<?php
}elseif ($_SESSION["status"]=="Students") {
	?>
	<div class="col-sm-2 sidenav" style="min-height: 80px;">
		<h4 style="visibility: hidden;">MAIN NAVIGATION</h4>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="homeStudent.php">Profile</a></li>
			<li><a href="RoomMember.php">Room Member</a></li>
			<li><a href="logOut.php">LogOut</a></li>
		</ul>
	</div>
	<?php
}elseif ($_SESSION["status"]=="Applicant") {
	?>
	<div class="col-sm-2 sidenav" style="min-height: 80px;">
		<h4 style="visibility: hidden;">MAIN NAVIGATION</h4>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="homeStudent.php">Profile</a></li>
			<li><a href="applyHostel.php">Make Application</a></li>
			<li><a href="viewApplication.php">View Application</a></li>
			<li><a href="logOut.php">LogOut</a></li>
		</ul>
	</div>
	<?php
} 
?>