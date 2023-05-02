<?php 
       include '../includes/Dbconnect.php';    
include '../includes/passwordLib.php';
	
		$new_password =$_POST['new_password'];
		$user_id =$_POST['user_id'];
		
		$options="";
			

      
$encryptpass = password_hash($new_password, PASSWORD_BCRYPT);


 $SQL3 = "UPDATE `users_tbl` SET `user_password`=:encryptpass WHERE `user_id`=:user_id";
   $stmt = $conn2->prepare($SQL3);
  
$stmt->bindParam("user_id",$user_id);
$stmt->bindParam("encryptpass",$encryptpass );



   if($stmt->execute()){
  echo '<span class="alert alert-success"><a href="#" class="alert-link"> Your Password have been updated successfully </a></span>';
    		
}else {


			
			echo '<span class="alert alert-danger"> The Database has NOT  been Edited</span>';
		
//}

	
	}
	




?>