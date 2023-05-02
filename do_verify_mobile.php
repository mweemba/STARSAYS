<?php 
include 'actions/functions.php';
include 'includes/Dbconnect.php';
 echo $user_id=$_POST['u'];


 echo $mobile_code=$_POST['mobile_code'];

if(checkMlbileCode($user_id,$mobile_code)=="N"){
	
// echo "<script>window.location = 'mobile_number_confirm.php?mobilestatus=No&i=".$user_id."'</script>";

}elseif(checkMlbileCode($user_id,$mobile_code)=='Y'){




$SQL4 ="UPDATE `mobile_confirm_codes` SET `status`='U' WHERE `user_id`=:user_id AND `status`='A';
 UPDATE `users_tbl` SET `mobileVerifile`='Y' WHERE `user_id`=:user_id";
  
 
  $stmt = $conn2->prepare($SQL4);
  $stmt->bindParam("user_id",$user_id);
  
 


if ($stmt->execute()){
  

 echo "<script>window.location = 'mobile_number_confirm.php?mobilestatus=Yes'</script>";
    		
}else {


			
			 echo "<script>window.location = 'mobile_number_confirm.php?mobilestatus=No&i=".$user_id."'</script>";
			
			
		
//}

	
	}
	
}


?>