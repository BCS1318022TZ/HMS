<?php
include("connection.php");
session_start();
if(isset($_POST["update"])){
	$room_id = $_POST['room_id'];
    $status = $_POST['status'];;
    $host_name = $_POST['host_name']; //Host_id
    $capacity = $_POST['capacity'];
    $room_name = $_POST['room_name'];

    $query="SELECT * FROM hostel WHERE host_name='$host_name'";
    $stmt = $db->query($query);
    $r = $stmt->fetch(PDO::FETCH_ASSOC);
    $host_id = $r['host_id'];

     $sql = "UPDATE room set room_id=:room_id,room_name=:room_name,capacity =:capacity,status=:status,host_id=:host_id 
     WHERE room_id=:room_id";
    $stmts=$db->prepare($sql);
    $stmts->execute(array(':room_id'=>$room_id,':room_name'=>$room_name,':capacity'=>$capacity,':status'=>$status,':host_id'=>$host_id));
    $_SESSION['success']="YOU HAVE SUCCESSED TO UPDATE DATA!!";
    header('Location:manageRoom.php');
    return;
}
?>
