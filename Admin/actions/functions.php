<?php 
function videoAlreadyup($request_id){

	include '../includes/Dbconnect.php';
 $sql = "SELECT * FROM `request` WHERE `reques_id`=:request_id and `video_upload_status`='U'";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("request_id",$request_id);
  

$stmt->execute();
if ($stmt->rowCount() > 0) {
	return 'Y';
}else{

return 'N';
}
	
}

function getuserID(){
	include 'includes/passwordLib.php';
	include 'includes/Dbconnect.php';
 $sql = "SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'users_tbl' LIMIT 1";
 $stmt = $conn2->prepare($sql);
 $user_id="";
$stmt->execute();

while ($row = $stmt->fetch()) {
    $user_id= $row['auto_increment'];
}

return $user_id;
}
function checkEmailCode($user_id,$emailcode){

	include 'includes/Dbconnect.php';
 $sql = "SELECT *  FROM `email_confirm_codes` WHERE `code`=:emailcode AND `user_id`=:user_id AND `status`='A'";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("user_id",$user_id);
  $stmt->bindParam("emailcode",$emailcode);

$stmt->execute();
if ($stmt->rowCount() > 0) {
	return 'Y';
}else{

return 'N';
}
}
function checkifmarked($star_id,$talent_id){

	include 'includes/Dbconnect.php';
 $sql = "SELECT `id`, `star_id`, `category_id` FROM `star_personal category` WHERE `star_id`=:star_id and `category_id`=:talent_id";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("star_id",$star_id);
  $stmt->bindParam("talent_id",$talent_id);

$stmt->execute();
if ($stmt->rowCount() > 0) {
	return 'Y';
}else{

return 'N';
}
}

function starcheck($user_id){
	
	include 'includes/Dbconnect.php';
 $sql = "SELECT `star_id`, `stage_aka`, `status`, `address1`, `address2`, `address3`, `contact_1`, `business_line`,
 `managers_contact`, `email`, `user_id`, `picture`, `customer_id`, `approved` FROM `star_details` WHERE `user_id`=:user_id";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("user_id",$user_id);
 

$stmt->execute();
if ($stmt->rowCount() > 0) {
	return 'Y';
}else{

return 'N';
}
	
}



function checkMlbileCode($user_id,$mobilecode){

	include 'includes/Dbconnect.php';
 $sql = "SELECT * FROM `mobile_confirm_codes` WHERE `user_id`=:user_id AND `status`='A' and `code`=:mobilecode";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("user_id",$user_id);
  $stmt->bindParam("mobilecode",$mobilecode);

$stmt->execute();
if ($stmt->rowCount() > 0) {
	return 'Y';
}else{

return 'N';
}
}

function checkEmailAtlogin($user_id){

	include 'includes/Dbconnect.php';
 $sql = "SELECT `user_id`, `email`, `user_password`, `date_created`, `user_status`, `user_level`, `mobilenumber`, `mobileVerifile`, 
 `emailVerified` FROM `users_tbl` WHERE `user_id`=:user_id and `emailVerified`='N'";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("user_id",$user_id);
  

$stmt->execute();
if ($stmt->rowCount() > 0) {echo "<script>window.location = 'email_confirm.php?emailstatus=No&i=".$user_id."'</script>";
	
}
}

function checkMobileAtlogin($user_id){

	include 'includes/Dbconnect.php';
 $sql = "SELECT `user_id`, `email`, `user_password`, `date_created`, `user_status`, `user_level`, `mobilenumber`, `mobileVerifile`, 
 `emailVerified` FROM `users_tbl` WHERE `user_id`=:user_id and `mobileVerifile`='N'";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("user_id",$user_id);
  

$stmt->execute();
if ($stmt->rowCount() > 0) {echo "<script>window.location = 'mobile_number_confirm.php?mobilestatus=No&i=".$user_id."'</script>";
	
}
}

?>