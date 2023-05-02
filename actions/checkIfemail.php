<?php 
	 $email=$_POST['email'];
	include '../includes/Dbconnect.php';
	$dialing_code= "";
 $sql = "SELECT * FROM `users_tbl` WHERE `email`=:email";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("email",$email);
$stmt->execute();

if ($stmt->rowCount() > 0) {
	echo 'This email already exists';
}else{

echo 'N';
}




?>