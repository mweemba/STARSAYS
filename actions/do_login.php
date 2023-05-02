<?php
session_start();
/*if(!defined('jhshjgdhgdhgdhhj')){
	echo '<script>window.location = "#";</script>';
}|*/
include '../includes/Dbconnect.php';
include '../includes/passwordLib.php';

$user=$_POST['username'];
$pass=$_POST['password'];

 if($user){
    
    if($pass){
       
		$stmt = $conn->prepare("SELECT `user_level`, `user_id`, `user_password` FROM `users_tbl` WHERE `email`=?");
		$stmt->bind_param("s",$user);
		$stmt->execute();
		$stmt->bind_result($level,$username,$password);
		
        if ($row=$stmt->fetch()){
            
 
           $dbuser=$username;
            $dbpass = $password;
            $dblevel=$level;
			$dbactive=1;
            
            if(password_verify($pass ,$dbpass )){
			  
                if($dbactive==1){
                    if($dblevel==1){
                      
                         $_SESSION['user_id_wel']=$dbuser;
                        $_SESSION['level']=$dblevel;
						$_SESSION['lockapp']='';
                       	
                   echo 'success';
                    }
                    elseif($dblevel==0){
                      
                        $_SESSION['user_id_wel']=$dbuser;
                        $_SESSION['level']=$dblevel;
						$_SESSION['lockapp']='';
                       							
					echo 'success2';  
                  }
              
                    }
                    else
                
                echo "you must activate your account to login.  <a href='VerifyAccount.php' >Click Here</a> to Activate";
                
                }else
            
            echo "The user username or  password is not correct";
            }else
            
            echo "The user username or  password is not correct";
            
               }else
    
    echo "you need to enter a password..";
       
       
       
       
    }else
       echo "you did not enter a username..";
 
 
 //}
 
  
      

?>   