 <?php function get_star($category){
 
include 'includes/Dbconnect.php';
//$category=$_POST['cat']; 


$dataSQL="SELECT * FROM `star_personal category` 
INNER JOIN star_details on star_details.star_id=`star_personal category`.`star_id` INNER JOIN `customer` ON `star_details`.`user_id`=`customer`.`user_id` WHERE `star_personal category`.`category_id`=:category";
	$stmt = $conn2->prepare($dataSQL);
	$stmt->bindParam("category",$category);
require_once 'actions/get_star_socials.php';
											
	$stmt->execute();
	while($row = $stmt->fetch()){   ?>
  
  <div class="col-lg-4 col-md-6">
            <div class="speaker" data-aos="fade-up" data-aos-delay="100">
              <img src="assets/img/<?php IF($row['picture']){  echo $row['picture']; } else{ echo 'user.png'; }  ?>" alt="Speaker 1" class="img-fluid">
              <div class="details">
                <h3><a href="Celebrity.php?id=<?php echo $row['star_id'];  ?>"> <?php echo $row['first_name'];  ?> <?php echo $row['mid_name'];  ?><?php echo $row['last_name'];  ?> AKA <?php echo $row['stage_aka'];  ?></a></h3>
                <p><?php echo getStarTalents($row['star_id']);?></p>
                <div class="social">
			<?php 
			    
			echo getStarSocials($row['star_id']);	?>

			</div>
              </div>
            </div>
          </div>
		  
	<?php } 
	
 } ?>