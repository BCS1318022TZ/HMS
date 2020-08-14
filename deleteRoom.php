<?php 
session_start();
include("connection.php");
if (isset($_GET['id'])) {
    $sql = "DELETE FROM room WHERE room_id = :room_id";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(':room_id'=>$_GET['id']));
    $_SESSION['success'] = 'You have Sucess to Delete Record';
    header('Location:manageRoom.php');
    return;
}
 ?>