<?php
include("connection.php");
session_start();
if(isset($_POST["update"])){
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
	$room_name = $_POST['room_name'];
	$status = $_POST['status'];
	$password = sha1($pass);

	$q="SELECT * FROM room WHERE room_name='$room_name'";
    $stmt = $db->query($q);
    $r = $stmt->fetch(PDO::FETCH_ASSOC);
    $room_id = $r['room_id'];

	$qry="SELECT * FROM students WHERE student_id='$student_id' and room_id='$room_id'";
	$st=$db->prepare($qry);
	$st->execute(); 
	if($st->rowCount()>0){ 
	$_SESSION['fail']="SORY THIS DATA ALREADY EXIST..!!";
		header("location:manageStudent.php");
	}else{
		$query="INSERT INTO students
		(student_id,fName,mName,lName,gender,address,phone,email,dob,photo,username,password,room_id,status) 
		VALUES (:student_id,:fName,:mName,:lName,:gender,:address,:phone,:email,:dob,:photo,:username,:password,:room_id,:status)";
		$stsmt=$db->prepare($query);
		$stsmt->execute(
		array(':student_id'=>$student_id,':fName'=>$fName,':mName'=>$mName,':lName'=>$lName,':gender'=>$gender,':address'=>$address,':phone'=>$phone,':email'=>$email,':dob'=>$dob,':photo'=>$photo,':username'=>$username,':password'=>$password,':room_id'=>$room_id,':status'=>$status));
		$_SESSION['success']="YOU HAVE SUCCESSED TO INSERT DATA!!";
		header("location:manageStudent.php");
	}
}else{
	echo "error";
}
?>