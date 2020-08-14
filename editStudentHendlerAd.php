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

	$query="SELECT * FROM room WHERE room_name='$room_name'";
    $stmts = $db->query($query);
    $r = $stmts->fetch(PDO::FETCH_ASSOC);
    $room_id = $r['room_id'];

    $sql = "UPDATE students set student_id=:student_id,mName = :mName,fName=:fName,lName=:lName,gender=:gender,address=:address,phone=:phone,dob=:dob,email=:email,photo=:photo,username=:username,password=:password,room_id=:room_id,status=:status WHERE student_id=:student_id";
    $stmt = $db->prepare($sql);
    $stmt->execute(
    array(':student_id'=>$student_id,':mName'=>$mName,':fName'=>$fName,':lName'=>$lName,':gender'=>$gender,':address'=>$address,':phone'=>$phone,':dob'=>$dob,':email'=>$email,':photo'=>$photo,':username'=>$username,':password'=>$password,':room_id'=>$room_id,':status'=>$status));
    $_SESSION['success']="YOU HAVE SUCCESSED TO UPDATE DATA!!";
    header('Location:manageStudent.php');
    return;
}else{
	echo "error";
}
?>
 	 	 	 	 	 	 	 	 	 	 	 	 	 