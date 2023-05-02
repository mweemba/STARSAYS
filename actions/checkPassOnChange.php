<?php 
include '../includes/Dbconnect.php';
 $oldpass=$_POST['oldpass'];
 $user_id=$_POST['user_id'];;
 $qr="SELECT `user_id`, `email`, `user_password`, `date_created`, `user_status`, `user_level`, `mobilenumber`, `mobileVerifile`, `emailVerified` FROM `users_tbl` WHERE `user_id`=:dbuser";
		 $stmt = $conn2->prepare($qr);

$stmt->bindParam("dbuser",$user_id);

        $stmt->execute();
	
        if ($stmt->rowCount() == 1){
         
            while($row = $stmt->fetch()){
            $dbpass = $row['user_password'];
        
            
            if(password_verify($oldpass ,$dbpass )){
			  
                echo 'success';
              
                    }
                    else{
                
             
                echo 'The password is not correct';
                }
		}
		
		}else{
			
			 echo 'The user is not found';
		}
		
		
		
		
		
		
            
?>