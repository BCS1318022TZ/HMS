<?php
include("connection.php");
session_start();
if(isset($_POST["submit"])){
	$location = $_POST['location'];
	$hostName = $_POST['hostName'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$sponser = $_POST['sponser'];

	$qry="Select * from hostel where host_name='$hostName' and location='$location'";
	$st=$db->prepare($qry);
	$st->execute(); 
	if($st->rowCount()>0){ 
	$_SESSION['fail']="SORY USER ALREADY EXIST..!!";
		header("location:manageHostel.php");
	}else{
		$query="INSERT INTO hostel (location,host_name,phone,email,sponser) 
		VALUES (:location,:host_name,:phone,:email,:sponser)";
		$stsmt=$db->prepare($query);
		$stsmt->execute(
			array(':location'=>$location,':host_name'=>$hostName,':phone'=>$phone,':email'=>$email,':sponser'=>$sponser));
		$_SESSION['success']="YOU HAVE SUCCESSED TO INSERT DATA!!";
		header("location:manageHostel.php");
	}
}
?>