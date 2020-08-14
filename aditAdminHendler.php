<?php
include("connection.php");
session_start();
if(isset($_POST["submit"])){
	$emp_id = $_POST['emp_id'];
	$fName = $_POST['fName'];
	$mName = $_POST['mName'];
	$lName = $_POST['lName'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$dob = $_POST['dob'];
	$username = $_POST['username'];
	$pass = $_POST['password'];
	$password = sha1($pass);

    $sql = "UPDATE employee set emp_id=:emp_id,mName = :mName,fName=:fName,lName=:lName,gender=:gender,address=:address,phone=:phone,dob=:dob,email=:email,username=:username,password=:password WHERE emp_id=:emp_id";
    $stmt = $db->prepare($sql);
    $stmt->execute(
    array(':emp_id'=>$emp_id,':mName'=>$mName,':fName'=>$fName,':lName'=>$lName,':gender'=>$gender,':address'=>$address,':phone'=>$phone,':dob'=>$dob,':email'=>$email,':username'=>$username,':password'=>$password));
    $_SESSION['success']="YOU HAVE SUCCESSED TO UPDATE DATA!!";
    header('Location:homeAdmin.php');
    return;
}else{
	echo "error";
}
?>
 	 	 	 	 	 	 	 	 	 	 	 	 	 