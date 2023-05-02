<?php function create_log($message){
	include 'C:/xampp/htdocs/trustMonitor/includes/Dbconnect.php';
	$i_id=0;
	$i_date=date("Y-m-d h:i:sa");
	    
$SQL3 = "INSERT INTO `logs`(`log_id`, `date`, `activity`) VALUES (:i_id,:i_date,:message)";

$stmt = $conn2->prepare($SQL3);
$stmt->bindParam(":i_id",$i_id);
$stmt->bindParam(":i_date",$i_date);
$stmt->bindParam(":message",$message);

$stmt->execute();



}
?>