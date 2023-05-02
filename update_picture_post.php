<?php 


include '../includes/sessions.php'; 
// get the image data
include 'fetch.php';





$query1="UPDATE `customer` SET `picture`=:slim WHERE `user_id`=:user_id";
  $stmt = $conn2->prepare($query1);
  
$stmt->bindParam("user_id",$user_id);
$stmt->bindParam("slim",$image );



   if($stmt->execute()){
		 
      return  "success";
			
		 
	 }else{
		 
		return  "An error Occured";
     
	 }
	 
	 ?>