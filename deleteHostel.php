<?php 
session_start();
include("connection.php");
if (isset($_GET['id'])) {
    $sql = "DELETE FROM hostel WHERE host_id = :host_id";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(':host_id'=>$_GET['id']));
    $_SESSION['success'] = 'You have Sucess to Delete Record';
    header('Location:manageHostel.php');
    return;
}
 ?>