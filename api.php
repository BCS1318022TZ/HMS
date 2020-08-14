 <?php
 include("connection.php");
 $api ="Select * from Hostel where host_id !=1";
 $stmt = $db->query($api);
 $data=array();
 $r = $stmt->fetch(PDO::FETCH_ASSOC);
 	$data["Host"]=$r['host_id'];
 	$data["Host"]=$r['host_name'];
 	$data["Host"]=$r['email'];
 	$data["Host"]=$r['phone'];
 	$data["Host"]=$r['location'];
 
 header("content-type:application/json");
 echo json_encode($r);
 ?>
