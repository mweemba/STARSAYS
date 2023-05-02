<?php
	include '../includes/Dbconnect.php';
	include '../actions/functions.php';
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
		

       
	$request_id=$_POST['request_id'];
	$comment=$_POST['comment'];
	$date_modified=date("Y-m-d h:i:sa");
videoAlreadyup($request_id);
	if(videoAlreadyup($request_id)=='Y'){
		
		
		echo '<div class="alert alert-danger"> A Video has already been uploaded for this request</div>';
	}else{
		
		
		  move_uploaded_file($_FILES['file']['tmp_name'], '../RES/Uploads/' . $_FILES['file']['name']);
		 
	$pic_id=rand(000000000000001,999999999999999);
$SQL4 ="INSERT INTO `video_uploads`(`vid_id`, `vid_url`, `date_uploaded`, `request_id`) 
 VALUES (:pic_id,:fileData,:date_modified,:request_id);
 UPDATE `request` SET `celeb_response`='U',`celeb_comment`=:comment,`date_modified`=:date_modified,`vid_id`=:pic_id,`video_upload_status`='U' WHERE `reques_id`=:request_id";
  
 
    $stmt = $conn2->prepare($SQL4);
  $stmt->bindParam("pic_id",$pic_id);
$stmt->bindParam(":comment",$comment);
$stmt->bindParam("fileData",$_FILES['file']['name']);
$stmt->bindParam("date_modified",$date_modified);
$stmt->bindParam("request_id",$request_id);
;
if ($stmt->execute()) {
   
  echo 'success';

    		
}else {

print_r($stmt->errorInfo());
			
		 echo '<div class="alert alert-danger"> The Video has NOT been  Uploaded</div>';
			
			
		


	
	
    }
	}
	}

?>