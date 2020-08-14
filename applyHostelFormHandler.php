<?php
include("connection.php");
session_start();


if(isset($_POST["order"])){
  $room_id = $_POST['room_id'];
  $password= $_SESSION['pass'];
  $username= $_SESSION['user'];

  $query="SELECT * FROM room WHERE room_id='$room_id'";
  $stmt = $db->query($query);
  $r = $stmt->fetch(PDO::FETCH_ASSOC);
  if($r['capacity']!=4){
    $query=$db->query("UPDATE students, room set students.room_id='$room_id' WHERE students.username='$username' AND students.password='$password'");
    $_SESSION['success']="YOU HAVE SUCCESSED TO BOOK HOSTEL ROOM!!";
    header('Location:viewApplication.php');
    return;
}else{
    $_SESSION['fail']="SORRY THE HOSTEL ROOM ARE FULL, SELECT ANOTHER ROOM!!";
    header('Location:applyHostel.php');
}
}
?>
