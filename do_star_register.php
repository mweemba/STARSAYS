<?php 
//include 'actions/functions.php';
include 'includes/sessions.php';
	

$dialing_code1=$_POST['dialing_code1'];
$StageName=$_POST['StageName'];
$address_line_1=$_POST['address_line_1'];
$address_line_2=$_POST['address_line_2'];
$address_line_3=$_POST['address_line_3'];

$country=$_POST['country'];
$mobilenumber1=$dialing_code1.$_POST['mobilenumber1'];
$busines_line=$dialing_code1.$_POST['busines_line'];
$managers_line=$dialing_code1.$_POST['managers_line'];
$email=$_POST['email'];

$price_1=$_POST['price_1'];
$price_2=$_POST['price_2'];
$price_3=$_POST['price_3'];
$price_4=$_POST['price_4'];
$price_5=$_POST['price_5'];
$price_6=$_POST['price_6'];
 $checkboxtalents=$_POST['talents'];


$Facebook_link=$_POST['Facebook_link'];
$Facebook_followers=$_POST['Facebook_followers'];
$Tweeter_link=$_POST['Tweeter_link'];
$Tweeter_followers=$_POST['Tweeter_followers'];
$Instagram_link=$_POST['Instagram_link'];
$Instagram_followers=$_POST['Instagram_followers'];
$Tiktok_link=$_POST['Tiktok_link'];
$Tiktok_followers=$_POST['Tiktok_followers'];
$Youtube_link=$_POST['Youtube_link'];
$Youtube_followers=$_POST['Youtube_followers'];
$star_id=rand(0000000000,9999999999);


$query1="";
for ($i=0; $i<sizeof ($checkboxtalents);$i++) {  
    
 
    
$query1.="INSERT INTO `star_personal category`(`id`, `star_id`, `category_id`) VALUES (0,'".$star_id."','".$checkboxtalents[$i]."');"; 
   
    
} 

$country=$_POST['country'];

$todaysdate=date("Y/m/d");
$picture='';
$start_id=0;
//include 'includes/passwordLib.php';

$approved="N";
$s_admin_comment="N";

require_once('async.php');
//$encryptedpass = password_hash($password1, PASSWORD_BCRYPT);

$SQL4 ="INSERT INTO `star_details`(`star_id`, `stage_aka`, `admin_comment`, `address1`, `address2`, `address3`,
 `contact_1`, `business_line`, `managers_contact`, `email`, `user_id`, `picture`, `customer_id`, `approved`, `date_created`)
VALUES (:star_id,:StageName,:s_admin_comment,:address_line_1,:address_line_2,:address_line_3,:mobilenumber1,:busines_line,:managers_line,:email,:user_id,:nameofFile,:customer_id,:approved,:todaysdate);

INSERT INTO `social_stats`(`start_id`, `star_id`, `mediaName`, `link`, `followers`, `last_updated`) VALUES
 (:start_id,:star_id,'Facebook',:Facebook_link,:Facebook_followers,:todaysdate);
 
 INSERT INTO `social_stats`(`start_id`, `star_id`, `mediaName`, `link`, `followers`, `last_updated`) VALUES
 (:start_id,:star_id,'Tiktok',:Tiktok_link,:Tiktok_followers,:todaysdate);
 
 INSERT INTO `social_stats`(`start_id`, `star_id`, `mediaName`, `link`, `followers`, `last_updated`) VALUES
 (:start_id,:star_id,'Tweeter',:Tweeter_link,:Tweeter_followers,:todaysdate);
 
 INSERT INTO `social_stats`(`start_id`, `star_id`, `mediaName`, `link`, `followers`, `last_updated`) VALUES
 (:start_id,:star_id,'Youtube',:Youtube_link,:Youtube_followers,:todaysdate);

 INSERT INTO `say_pricing`(`price_id`, `star_id`, `say_category`, `price`, `last_updated`) 
 VALUES (:price_id,:star_id,'1',:price_1,:todaysdate);
 
 INSERT INTO `say_pricing`(`price_id`, `star_id`, `say_category`, `price`, `last_updated`) 
 VALUES (:price_id,:star_id,'2',:price_2,:todaysdate);
 
 INSERT INTO `say_pricing`(`price_id`, `star_id`, `say_category`, `price`, `last_updated`) 
 VALUES (:price_id,:star_id,'3',:price_3,:todaysdate);
 
 INSERT INTO `say_pricing`(`price_id`, `star_id`, `say_category`, `price`, `last_updated`) 
 VALUES (:price_id,:star_id,'4',:price_4,:todaysdate);
 
 INSERT INTO `say_pricing`(`price_id`, `star_id`, `say_category`, `price`, `last_updated`) 
 VALUES (:price_id,:star_id,'5',:price_5,:todaysdate);
 
 INSERT INTO `say_pricing`(`price_id`, `star_id`, `say_category`, `price`, `last_updated`) 
 VALUES (:price_id,:star_id,'6',:price_6,:todaysdate);";
//$query1=implode(" ",$query1);
 $SQL4=$SQL4.$query1;
 
  $stmt = $conn2->prepare($SQL4);
  $stmt->bindParam("star_id",$star_id);
  $stmt->bindParam("StageName",$StageName);
   $stmt->bindParam("s_admin_comment",$s_admin_comment);
   $stmt->bindParam("address_line_1",$address_line_1);
   $stmt->bindParam("address_line_2",$address_line_2);
   $stmt->bindParam("address_line_3",$address_line_3);
  $stmt->bindParam("mobilenumber1",$mobilenumber1);
  $stmt->bindParam("busines_line",$busines_line);
  $stmt->bindParam("managers_line",$managers_line);
$stmt->bindParam("email",$email);
$stmt->bindParam("user_id",$user_id);
$stmt->bindParam("customer_id",$customer_id);
//$stmt->bindParam("picture",$picture);
$stmt->bindParam("country",$country);
$stmt->bindParam("approved",$approved);
$stmt->bindParam("Facebook_link",$Facebook_link);
$stmt->bindParam(":nameofFile",$nameofFile);

$stmt->bindParam("Facebook_followers",$Facebook_followers);
$stmt->bindParam("Tweeter_link",$Tweeter_link);
$stmt->bindParam("Tweeter_followers",$Tweeter_followers);
$stmt->bindParam("Tiktok_followers",$Tiktok_followers);
$stmt->bindParam("Tiktok_link",$Tiktok_link);
$stmt->bindParam("Youtube_link",$Youtube_link);
$stmt->bindParam("Youtube_followers",$Youtube_followers);
$stmt->bindParam("Youtube_link",$Instagram_link);
$stmt->bindParam("Youtube_followers",$Instagram_followers);

$stmt->bindParam("price_1",$price_1);
$stmt->bindParam("price_2",$price_2);
$stmt->bindParam("price_3",$price_3);
$stmt->bindParam("price_4",$price_4);
$stmt->bindParam("price_5",$price_5);
$stmt->bindParam("price_6",$price_6);
$stmt->bindParam("start_id",$start_id);
$stmt->bindParam("price_id",$price_id);
$stmt->bindParam("todaysdate",$todaysdate);


if ($stmt->execute()) {
 // print_r($stmt->errorInfo());

 echo "<script>window.location = 'star_regist_confirm.php?reg=Y'</script>";
    		
}else {


 
 $stmt->errorInfo());
			echo "am here";
		//	echo "<script>window.location = 'star_regist_confirm.php?reg=N'</script>";
			
			
		
//}

	
	}
	



?>