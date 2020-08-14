<?php 
session_start(); 
if(isset($_POST["btnlogin"])){
	include("connection.php"); 

	$userN=$_POST["username"]; 
	$password=$_POST["password"]; 
	$pass=sha1($password); 

	$query="Select * from students where username='$userN' and password='$pass'";
	$stmt=$db->prepare($query);
	$stmt->execute(); 
	if($stmt->rowCount()>0){
	    $stmts = $db->query($query);
	    $r = $stmts->fetch(PDO::FETCH_ASSOC);
		$_SESSION['user']=$userN; 
		$_SESSION['pass']=$pass; 
		$_SESSION["status"]=$r['status'];
		header("location:homeStudent.php");
	}else{
		$qry="Select * from employee where username='$userN' and password='$pass'";
		$stm = $db->query($qry);
	    $r = $stm->fetch(PDO::FETCH_ASSOC);
		$st=$db->prepare($qry);
		$st->execute(); 
		if($stm->rowCount()>0){
		$_SESSION['user']=$userN; 
		$_SESSION['pass']=$pass;
		$_SESSION["status"]=$r['roles']; 
		header("location:homeAdmin.php"); 
	}else{
		$_SESSION['fail']="WRONG PASSWORD OR USERNAME, PLEASE TRY AGAIN LATER";
		header("location:index.php");
}
}
}
?>