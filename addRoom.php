<?php
include("connection.php");
session_start();
if(isset($_POST["submit"])){
	$status = $_POST['status'];
	$hostName = $_POST['host_name']; //Host_id
	$capacity = $_POST['capacity'];
	$room_name = $_POST['room_name'];

 	$query="SELECT * FROM hostel WHERE host_name='$hostName'";
    $stmt = $db->query($queryarray(':room_name'=>$room_name,':capacity'=>$capacity,':status'=>$status,':host_id'=>$host_id));
);
    $r = $stmt->fetch(PDO::FETCH_ASSOC);
    $host_id = $r['host_id'];

	$qry="SELECT * FROM room WHERE room_name='$room_name' and host_id='$host_id'";
	$st=$db->prepare($qry);
	$st->execute(); 
	if($st->rowCount()>0){ 
	$_SESSION['fail']="SORY THIS DATA ALREADY EXIST..!!";
		header("location:manageRoom.php");
	}else{

		$query="INSERT INTO room (room_name,capacity,status,host_id) 
		VALUES (:room_name,:capacity,:status,:host_id)";
		$stsmt=$db->prepare($query);
		$stsmt->execute(
				$_SESSION['success']="YOU HAVE SUCCESSED TO INSERT DATA!!";
		header("location:manageRoom.php");
	}
}
?>