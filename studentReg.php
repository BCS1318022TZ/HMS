<?php
include("connection.php");
session_start();
if(isset($_POST["submit"])){
	$student_id = $_POST['student_id'];
	$fName = $_POST['fName'];
	$mName = $_POST['mName'];
	$lName = $_POST['lName'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$dob = $_POST['dob'];
	$photo = $_POST['photo'];
	$username = $_POST['username'];
	$pass = $_POST['password'];
	$room_id = $_POST['room_id'];
	$status = $_POST['status'];
	$password = sha1($pass);

	$qry="SELECT * FROM students WHERE username='$username' and password='$password'";
	$st=$db->prepare($qry);
	$st->execute(); 
	if($st->rowCount()>0){ 
	$_SESSION['fail']="SORY YOU HAVE ALREADY REGISTERD..!!";
	header("location:index.php");
	}else{
		$query="INSERT INTO students
		(student_id,fName,mName,lName,gender,address,phone,email,dob,photo,username,password,room_id,status) 
		VALUES (:student_id,:fName,:mName,:lName,:gender,:address,:phone,:email,:dob,:photo,:username,:password,:room_id,:status)";
		$stsmt=$db->prepare($query);
		$stsmt->execute(
		array(':student_id'=>$student_id,':fName'=>$fName,':mName'=>$mName,':lName'=>$lName,':gender'=>$gender,':address'=>$address,':phone'=>$phone,':email'=>$email,':dob'=>$dob,':photo'=>$photo,':username'=>$username,':password'=>$password,':room_id'=>$room_id,':status'=>$status));
		$_SESSION['success']="YOU HAVE SUCCESSED TO REGISTER, YOU CAN LOGIN NOW!!";
		header("location:index.php");
	}
}else{
	echo "error";
}
?>