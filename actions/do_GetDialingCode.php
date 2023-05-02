<?php 
	 $country_id=$_POST['country_id'];
	include '../includes/Dbconnect.php';
	$dialing_code= "";
 $sql = "SELECT `Id`, `Country`, `country_code`, `dialing_code` FROM `countrie_codes` WHERE `Id`=:country_id";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("country_id",$country_id);
$stmt->execute();

while ($row = $stmt->fetch()) {
    $dialing_code= $row['dialing_code'];
}

echo  $dialing_code;


?>