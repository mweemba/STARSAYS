<?php 
include '../includes/Dbconnect.php';
$request_id=$_POST['request_id'];
	$comment=$_POST['comment'];
	$date_modified=date("Y-m-d h:i:sa");
$SQL4 ="
 UPDATE `request` SET `celeb_response`='R',`celeb_comment`=:comment,`date_modified`=:date_modified,`video_upload_status`='R' WHERE `reques_id`=:request_id";
  
 
    $stmt = $conn2->prepare($SQL4);
  $stmt->bindParam("date_modified",$date_modified);
$stmt->bindParam("comment",$comment);
$stmt->bindParam("request_id",$request_id);

if ($stmt->execute()) {
   
  echo "<script>window.location = 'request_view.php?request_changed=Y'</script>";

    		
}else {

print_r($stmt->errorInfo());
			
		 //echo "<script>window.location = '../Star_menu.php?request_reject=N'</script>";
			
			
		


	
	
    }?>