<?php
include("connection.php");
session_start();
if(isset($_POST["update"])){
	$host_id = $_POST['host_id'];
	$location = $_POST['location'];
	$host_name = $_POST['host_name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$sponser = $_POST['sponser'];
    $sql = "UPDATE hostel set host_id=:host_id,host_name = :host_name,location=:location,phone=:phone,email=:email,sponser=:sponser WHERE host_id=:host_id";
    $stmt = $db->prepare($sql);
    $stmt->execute(
    array(':host_id'=>$host_id,':host_name'=>$host_name,':location'=>$location,':phone'=>$phone,':email'=>$email,':sponser'=>$sponser));
    $_SESSION['success']="YOU HAVE SUCCESSED TO UPDATE DATA!!";
    header('Location:manageHostel.php');
    return;
}
?>
