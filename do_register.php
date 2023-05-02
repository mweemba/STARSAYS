<?php 
include 'actions/functions.php';
include 'includes/Dbconnect.php';
$user_id=getuserID();
$customer_id=0;
$code_id=0;
$LastName=$_POST['LastName'];
$email_code=rand(000000,999999);
$mobile_code=rand(000000,999999);
$firstname=$_POST['firstname'];
$middlename=$_POST['middlename'];
$email=$_POST['email'];
$dialing_code=$_POST['dialing_code'];
$mobilenumber=$dialing_code.$_POST['mobilenumber'];

$country=$_POST['country'];
$city=$_POST['city'];
$password1=$_POST['password1'];


$todaysdate=date("Y/m/d h:i:s");
$picture='';
$gender="";
$dob=0;
$balance=0;
include 'includes/passwordLib.php';





$encryptedpass = password_hash($password1, PASSWORD_BCRYPT);

$SQL4 ="INSERT INTO `customer`(`customer_id`, `first_name`, `mid_name`, `last_name`, `user_id`, `gender`, `dob`, 
`city`, `contact_no`, `country`, `customer_picture`, `date_created`)  VALUES
 (:customer_id,:firstname,:middlename,:LastName,:user_id,:gender,:dob,:city,:mobilenumber,:country,:picture,:todaysdate);
 INSERT INTO `users_tbl`(`user_id`, `email`, `user_password`, `date_created`, `user_status`, `user_level`, `mobilenumber`, `mobileVerifile`, `emailVerified`) 
 VALUES (:user_id,:email,:encryptedpass,:todaysdate,'active','1',:mobilenumber,'N','N');
 INSERT INTO `mobile_confirm_codes`(`code_id`, `code`, `user_id`, `mobile_number`, `status`) 
 VALUES (:code_id,:mobile_code,:user_id,:email,'A');
 INSERT INTO `email_confirm_codes`(`code_id`, `code`, `user_id`, `email`, `status`) 
 VALUES (:code_id,:email_code,:user_id,:email,'A');
 INSERT INTO `balances`(`balance_id`, `balance_date`, `amount`, `user_id`) VALUES (:dob,:todaysdate,:balance,:user_id)
 ";
  
 
  $stmt = $conn2->prepare($SQL4);
  $stmt->bindParam("customer_id",$customer_id);
  $stmt->bindParam("dob",$dob);
  $stmt->bindParam("balance",$balance);
   $stmt->bindParam("code_id",$code_id);
   $stmt->bindParam("email_code",$email_code);
   $stmt->bindParam("mobile_code",$mobile_code);
   $stmt->bindParam("todaysdate",$todaysdate);
  $stmt->bindParam("gender",$gender);
  $stmt->bindParam("picture",$picture);
  $stmt->bindParam("LastName",$LastName);
$stmt->bindParam("firstname",$firstname);
$stmt->bindParam("middlename",$middlename);
$stmt->bindParam("email",$email);
$stmt->bindParam("mobilenumber",$mobilenumber);
$stmt->bindParam("country",$country);
$stmt->bindParam("city",$city);
$stmt->bindParam("encryptedpass",$encryptedpass);
$stmt->bindParam("user_id",$user_id);



if ($stmt->execute()) {
 
 sendEmail($email,$firstname,$email_code);
 sendEmail($email,$firstname,$email_codeecho "<script>window.location = 'email_confirm.php?emailstatus=No&i=".$user_id."&regist=Y'</script>";
    		
}else {
 
 
		
		 echo "<script>window.location = 'Register.php?emailstatus=No&regist=N'</script>";
			
			
		
//}

	
	}
	



?>