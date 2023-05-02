
<?php  

 function sendEmail($email,$firstname,$email_code) {
$sender='admin@starsays.net';
$reciever=$email;

$subject='STARDSAY EMAIL CONFIRM';
$Name=$_POST['Name'];
$PhoneNumber=$_POST['PhoneNumber'];

	
	
$subject =$sender;
$From =$_POST['sender'];
$message =$_POST['message'].'Br'.$firstname.'<br>Your Email Confirm Code is  : '.$email_code; 
$to = $reciever;
$headers = "From: ".$From;
mail($to,$subject,$message,$headers)

  }
	
						
?>