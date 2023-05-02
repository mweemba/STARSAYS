<?php 
include '../../sessions.php';
$NewPass=$_POST['inputPassword3'];
  //$NewPass='gifted';

 $qr="SELECT * FROM `users` WHERE `memberID`='$member_id'";
		
        $query=mysqli_query($conn,$qr);
        $numrows=mysqli_num_rows($query);
        if ($numrows==1){
            $options = [
    'cost' => 11,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
];
$encrypt = password_hash($NewPass, PASSWORD_BCRYPT, $options);
        
            $qr2="UPDATE `users` SET `password`='$encrypt' WHERE `memberID`='$member_id'";
		
        $query=mysqli_query($conn,$qr2);
        
            if($query){
				echo 'success';
				
			}else{
				
				echo 'The password was not changed due to some eerror, Please try again';
			}
            
		}else{
			
			 echo 'The user is not found';
		}
            
?>