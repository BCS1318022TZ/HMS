<?php
include("connection.php");
session_start();
if(isset($_GET["id"])){
$student_id=$_GET['id'];

    $sql = "UPDATE students set status=:status WHERE student_id=:student_id";
    $stmt = $db->prepare($sql);
    $stmt->execute(
    array(':student_id'=>$student_id,':status'=>'Students'));
    $_SESSION['success']="YOU HAVE SUCCESSED TO UPROVE ORDER!!";
    header('Location:manageApplication.php');
    return;
}
?>
