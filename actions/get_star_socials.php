<?php	

function getStarSocials($star_id){

	include 'includes/Dbconnect.php';
$dataSQL="SELECT `start_id`, `star_id`, `mediaName`, `link`, `followers`, `last_updated` FROM `social_stats` WHERE `star_id`=:star_id";
	$stmt = $conn2->prepare($dataSQL);
	$stmt->bindParam("star_id",$star_id);

											
	$stmt->execute();
	while($row = $stmt->fetch()){   ?>
                  <a href="<?php echo $row['link'] ?>"><i class="bi bi-<?php echo strtolower($row['mediaName']); ?>"></i></a>
	<?php }
	
	
	} ?>
	
	
	
	<?php	

function getStarTalents($star_id){

	include 'includes/Dbconnect.php';
$dataSQL="SELECT GROUP_CONCAT(`category_name`) FROM `star_personal category` INNER JOIN `star_categorys` ON `star_personal category`.`category_id`=`star_categorys`.`category_id` WHERE `star_personal category`.`star_id`=:star_id GROUP BY `star_id`";
	$stmt = $conn2->prepare($dataSQL);
	$stmt->bindParam("star_id",$star_id);
$stmt->execute();
									
	$sentence='';
	
	while($row = $stmt->fetch()){
        
  		 $sentence.=$row[0];
	


	}
	 echo $sentence;
}
	?>