<?php 
include 'actions/functions.php';
include 'includes/Dbconnect.php';
 $user_id=$_POST['u'];


 $email_code=$_POST['code'];

if(checkEmailCode($user_id,$email_code)=="N"){
 echo "<script>window.location = 'email_confirm.php?email=No'</script>";

}elseif(checkEmailCode($user_id,$email_code)=='Y'){




$SQL4 ="UPDATE `email_confirm_codes` SET `status`='U' WHERE `user_id`=:user_id AND `status`='A';
 UPDATE `users_tbl` SET `emailVerified`='Y' WHERE `user_id`=:user_id";
  
 
  $stmt = $conn2->prepare($SQL4);
  $stmt->bindParam("user_id",$user_id);
  
 


if ($stmt->execute()){
  

 echo "<script>window.location = 'email_confirm.php?emailstatus=Yes'</script>";
    		
}else {


			
			 echo "<script>window.location = 'email_confirm.php?emailstatus=No&i=".$user_id."'</script>";
			
			
		
//}

	
	}
	
}


?>