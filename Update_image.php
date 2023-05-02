<?php

function updateimage($data,$user_id){
include '../includes/Dbconnect.php'; 

$query1="UPDATE `customer` SET `picture`=:data WHERE `user_id`=:user_id";
  $stmt = $conn2->prepare($query1);
  
$stmt->bindParam("user_id",$user_id);
$stmt->bindParam("data",$data );



   if($stmt->execute()){
		 
      return  "success";
			
		 
	 }else{
		 
		return  "An error Occured";
     
	 }
}
?>