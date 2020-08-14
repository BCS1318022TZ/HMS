<?php 
session_start();
include("connection.php");
if (isset($_GET['id'])) {
    $sql = "DELETE FROM students WHERE student_id = :student_id";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(':student_id'=>$_GET['id']));
    $_SESSION['success'] = 'You have Sucess to Delete Record';
    header('Location:manageStudent.php');
    return;
}if (isset($_GET['ids'])) {
    $sql = "DELETE FROM students WHERE student_id = :student_id";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(':student_id'=>$_GET['ids']));
    $_SESSION['success'] = 'You have Sucess to Delete Record';
    header('Location:homeAdmin.php');
    return;
}else{
    echo "error msg";
}