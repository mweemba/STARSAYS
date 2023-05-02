<?php 
       include '../includes/Dbconnect.php';    

		$first_name =$_POST['first_name'];
		$middle_name =$_POST['middle_name'];
		$last_name =$_POST['last_name'];
		$gender =$_POST['gender'];
		$dob =$_POST['dob'];
		$email =$_POST['email'];
		$contact_no =$_POST['contact_no'];
		$address =$_POST['address'];
		$user_id=$_POST['user_id'];
		
			




 $SQL3 = "UPDATE `customer` SET `first_name`=:first_name,`last_name`=:last_name,
 `gender`=:gender,`dob`=:dob,`address`=:address,`contact_no`=:contact_no,`middle_name`=:middle_name
 WHERE `user_id`=:user_id;
 UPDATE `users_tbl` SET `first_name`=:first_name,`mid_name`=:middle_name,`last_name`=:last_name,
 `email`=:email
  WHERE `user_id`=:user_id
 ";
   $stmt = $conn2->prepare($SQL3);
  
$stmt->bindParam("user_id",$user_id);
$stmt->bindParam("first_name",$first_name);
$stmt->bindParam("middle_name",$middle_name);
$stmt->bindParam("last_name",$last_name);
$stmt->bindParam("gender",$gender);
$stmt->bindParam("dob",$dob);

$stmt->bindParam("email",$email);
$stmt->bindParam("contact_no",$contact_no);
$stmt->bindParam("address",$address);


   if($stmt->execute()){
  echo '<span class="alert alert-success"><a href="#" class="alert-link"> Your Details have been updated successfully </a></span>';
    		
}else {


			
			echo '<span class="alert alert-danger"> The Database has NOT  been Edited</span>';
		
//}

	
	}
	




?>