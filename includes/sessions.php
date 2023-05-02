<?php
session_start();
error_reporting(0);
include  'actions/functions.php';
include 'Dbconnect.php';
 $dbuser=$_SESSION['user_id_wel'];
 $dblevel=$_SESSION['level'];

	
$star_id='';	
$semail="";
$firstname="";
$lastname="";
$credit_limit="";
$user_id='';
$customer_id='';
$todayDate=date('Y-m-d');
$profilePic="";
$cust_id="";
$userlevel='';


date_default_timezone_set("Africa/Harare");
 $todayDate=date('Y-m-d');
if(starcheck($dbuser)=='Y'){
	 $query="SELECT * FROM `customer` INNER JOIN `users_tbl` on `users_tbl`.`user_id`=`customer`.`user_id` INNER JOIN `star_details` ON `users_tbl`.`user_id`=`star_details`.`user_id` WHERE `users_tbl`.`user_id`=:dbuser";
}else{
    $query="SELECT * FROM `customer` INNER JOIN `users_tbl` on `users_tbl`.`user_id`=`customer`.`user_id` WHERE `users_tbl`.`user_id`=:dbuser";
      
} 
	$stmt = $conn2->prepare($query);
	 $stmt->bindParam(":dbuser",$dbuser);
	
	$stmt->execute();
   while($row = $stmt->fetch()){
           
           
   $_SESSION['user_id_wel']=$row['user_id'];

			$firstname=$row['first_name'];
			$lastname=$row['last_name'];
			$user_id=$row['user_id'];
			$customer_id=$row['customer_id'];
			$star_id=$row['star_id'];
			$profilePic=$row['customer_picture'];
			$userlevel=$row['user_level'];
            }
			
if($user_id){
 checkEmailAtlogin($user_id);
}
if($user_id){
	
checkMobileAtlogin($user_id);	
}


?> 