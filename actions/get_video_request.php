<?php include '../includes/Dbconnect.php';
$reques_id=$_POST['request_id'];
						
				 $sql = "SELECT `vid_id`, `vid_url`, `date_uploaded`, `request_id` FROM `video_uploads` WHERE `request_id`=:reques_id LIMIT 1";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("reques_id",$reques_id);
$stmt->execute();

while ($row = $stmt->fetch()) {
  


?>
<video style="width:100%" controls="">
  <source src="RES/Uploads/<?php echo $row['vid_url'];?>" type="video/mp4">
  </video>


<?php } ?>
