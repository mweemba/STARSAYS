<?php include 'includes/sessions.php';
if(!isset($_SESSION["user_id_wel"])){ 

echo '<script>window.location = "index.php";</script>';
 } ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Star Says</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/slim.min.css"/>

  <!-- =======================================================
  * Template Name: TheEvent - v4.7.0
  * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include 'includes/header.php';?>

  <!-- ======= Hero Section ======= -->
  

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" >
        <div class="row">
		<div class="col-lg-12">
		 <div style="height:1em"></div>
		 <div style="height:1em"></div>
		 <div style="height:1em"></div>
          <div class="section-header">
<h2>My Profile</h2>
		 
      
        </div>
        </div>
      </div>
	  </div>
	
    </section><!-- End About Section -->

    <!-- ======= Speakers Section ======= -->
    
    <!-- ======= Schedule Section ======= -->
    <section id="schedule" class="section-with-bg">
          <?php
		 
		  $request_submit=$_POST['request_edit'];
		  If(isset($request_submit)){
			  
			
		  $NameFrom=$_POST['NameFrom'];
		  $NameTo=$_POST['NameTo'];
		  $date_required=$_POST['date_required'];
		  $purpose=$_POST['purpose'];
		  $extra=$_POST['extra'];
		  $language=$_POST['language'];
		  $user_id=$dbuser;
		  $celeb_id=$_POST ['celeb_id'];
		  $category_id=$_POST ['category_id'];
	
		  $acceptedBy_admin='W';
		  $celeb_response='W';
		  $celeb_comment='';
		
          $date_modified=date("Y-m-d h:i:sa");
		  $todaydate=date("Y-m-d");
		  
		  
		    
         
       $request_id=$_POST['request_id'];




$SQL4 ="UPDATE `request` SET  `b_date`=:date_required,
`person_from`=:NameFrom,`person_to`=:NameTo,`request_purpose_instruction`=:purpose ,
`extra_info`=:extra,`prefared_lang`=:language,`date_modified`=:date_modified WHERE `reques_id`=:request_id ;
INSERT INTO `request_logs`(`log_id`, `date_time`, `request_id`, `user_id`, `description`) 
VALUES ('0',:date_modified,:request_id,:user_id,'Edited Request details')";


  
 
  $stmt = $conn2->prepare($SQL4);
 $stmt->bindParam("request_id",$request_id);
  $stmt->bindParam("date_required",$date_required);
  $stmt->bindParam("NameFrom",$NameFrom);
  $stmt->bindParam("user_id",$user_id);
  $stmt->bindParam("category_id",$category_id);
   $stmt->bindParam("NameTo",$NameTo);
  $stmt->bindParam("extra",$extra);
 $stmt->bindParam("vid_id",$vid_id);
   $stmt->bindParam("purpose",$purpose);

 $stmt->bindParam("date_modified",$date_modified);
 $stmt->bindParam("language",$language);
 


if ($stmt->execute()) {
  

	echo '<div class="alert alert-success" style="text-align: center;" role="alert">
 The request has been edited succefully 
</div>';
    		
}else {

//print_r($stmt->errorInfo());

			
			echo '<div class="alert alert-dager" style="text-align: center;" role="alert">
 The request has Not been edited due to an error
</div>';
			
			
		
//}

	
	}
	
		  
		  
		  }
		  ?>
           
       <form class="ed_tabpersonal">
                                                            <div style="max-width:300px; margin: 0 auto;">
																<div class="slim" id="imgContainer"
																 data-label="Drop your picture here"
																 data-fetcher="fetch.php"
																 data-service="async.php"
																 data-size="640,480"
																 data-ratio="4:3S"
																 data-max-file-size="10"
																 data-instant-edit="true"
															     data-meta-memberid="<?php echo $row['user_id'];?>"
															     >
															     <input type="file" name="slim[]" required />
																<img style="border-radius: 50%;" class="editable img-responsive"  src="<?php  if(!$row['picture']){ echo 'assets/img/user.png'; } else{ echo 'assets/img/profile/'.$row['picture']; };?>" />
															
                                                                 </div>
																  
														</div>
                                                          
                                                           
                                                        </form>
														<br>
														  

		 
      
     
      <div class="container" >
	 

        <ul class="nav nav-tabs" role="tablist" data-aos-delay="100">
          <li class="nav-item">
            <a class="nav-link active" href="#pInformation" role="tab" data-bs-toggle="tab">Profile</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="#day-3" role="tab" data-bs-toggle="tab">Edit Password</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#day-2" role="tab" data-bs-toggle="tab">Finances</a>
          </li>
          
		  <li class="nav-item">
            <a class="nav-link" href="#day-4" role="tab" data-bs-toggle="tab">Orders</a>
          </li>
		   
        </ul>

        <h3 class="sub-heading">
		 
		 
		  <?php 
		  $submit_self_edit=$_POST['submit_self_edit'];
		  if(isset($submit_self_edit)){
		$LastName=$_POST['LastName'];
		  $firstname=$_POST['firstname'];
		  $middlename=$_POST['middlename'];
		 $country=$_POST['country'];
		  $dob_day=$_POST['dob_day'];
		  $dob_month=$_POST['dob_month'];
		  $dob_yr=$_POST['dob_yr'];
		 $city=$_POST['city'];
		   $gender=$_POST['gender'];
		   $dob=$dob_yr . '/' . $dob_month . '/' . $dob_day;
		   
		       

	
 $SQL3 = "UPDATE `customer` SET `first_name`=:first_name,`mid_name`=:middle_name,`last_name`=:last_name,`gender`=:gender,
 `dob`=:dob,`city`=:city,`country`=:country WHERE `user_id`=:user_id;
 ";
   $stmt = $conn2->prepare($SQL3);
  
$stmt->bindParam("user_id",$user_id);
$stmt->bindParam("first_name",$firstname);
$stmt->bindParam("middle_name",$middlename);
$stmt->bindParam("last_name",$LastName);
$stmt->bindParam("gender",$gender);
$stmt->bindParam("dob",$dob);

$stmt->bindParam("country",$country);
$stmt->bindParam("city",$city);


   if($stmt->execute()){
  echo '<span class="alert alert-success"><a href="#" class="alert-link"> Your Details have been updated successfully </a></span>';
    		
}else {


			
			echo '<span class="alert alert-danger"> The Details have NOT  been Edited</span>';
		
//}

	
	}
	}
		  
		  
		  $submit_self_edit_pass=$_POST['submit_self_edit_pass'];
		  if(isset($submit_self_edit_pass)){
		$password=$_POST['new_password'];
		  //$firstname=$_POST['firstname'];
		 
		       
include 'includes/passwordLib.php';





$encryptedpass = password_hash($password, PASSWORD_BCRYPT);
	
 $SQL3 = "UPDATE `users_tbl` SET `user_password`=:encryptedpass WHERE `user_id`=:user_id;";
   $stmt = $conn2->prepare($SQL3);
  
$stmt->bindParam("user_id",$user_id);
$stmt->bindParam("encryptedpass",$encryptedpass);


   if($stmt->execute()){
  echo '<span class="alert alert-success"><a href="#" class="alert-link"> Your Password has been updated successfully </a></span>';
    		
}else {


			
			echo '<span class="alert alert-danger"> The Password has  NOT  been Edited due to an error</span>';
		
//}

	
	}
	}
		  
		  ?>
		</h3>

        <div class="tab-content row justify-content-center"  data-aos-delay="200">

          <!-- Schdule Day 1 -->
          <div role="tabpanel"  class="col-lg-9 tab-pane  show active" id="pInformation">

           
              <?php
										 $query="SELECT * FROM `customer` INNER JOIN `users_tbl` on `users_tbl`.`user_id`=`customer`.`user_id` WHERE `users_tbl`.`user_id`=:dbuser";
											//SELECT `customer_id`, `first_name`, `mid_name`, `last_name`, `user_id`, `gender`, `dob`, `city`, `contact_no`, `country`, `picture`, `date_created` FROM `customer` WHERE 1
											$stmt = $conn2->prepare($query);
											$stmt->bindParam(":dbuser",$dbuser);
											$stmt->execute();
											while($row = $stmt->fetch()){ ?>
			<div class="row schedule-item">
              <div class="col-md-10">
               <h4>Name : <span><?php echo $row['first_name']?> <?php echo $row['mid_name']?> <?php echo $row['last_name']?></span></h4>
                
              </div>
			  </div>
			   <div class="row schedule-item">
			  <div class="col-md-10">
               <h4>Gender :<span><?php echo $row['gender']?></h4>
                
              </div>
			  </div>
			   <div class="row schedule-item">
			  <div class="col-md-10">
               <h4>Date of Birth :<span><?php echo $row['dob']?> </span></h4>
                
              </div>
			  </div>
			   <div class="row schedule-item">
			  <div class="col-md-10">
               <h4>City : <span><?php echo $row['city'];?> </span></h4>
                
              </div>
			  </div>
			   <div class="row schedule-item">
			  <div class="col-md-10">
               <h4>Country :<span><?php echo $row['country']?></span></h4>
                 
              </div>
			  </div>
			  <div class="row schedule-item">
			  <div class="col-md-10">
               <h4>Email :<span><?php echo $row['email']?></span></h4>
                
              </div>
			  </div>
			  <br>
			   <button type="submit" class="buy-tickets scrollto" onclick="PlaceEditform(<?php echo $row['user_id']?>)" class="ms-2">Edit Details</button>
			  
			  
			  
											<?php }?>
											
		
            

          </div>
          <!-- End Schdule Day 1 -->

          <!-- Schdule Day 2 -->
          <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-2">

 <div class="section-header">
	
          <h3>Payments Made</h3>
          
		  </div>
     				<?php 
						
				 $sql = "SELECT * FROM `transactions_in` INNER JOIN `request` ON `request`.`reques_id`=`transactions_in`.`reques_id` 
				 INNER JOIN `star_details` ON `transactions_in`.`celeb_id`=`star_details`.`star_id` INNER JOIN `customer` ON `transactions_in`.`From_user_id`=`customer`.`user_id`
				 WHERE `customer`.`user_id`=:dbuser";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("dbuser",$dbuser);
$stmt->execute();
setlocale(LC_MONETARY, 'en_US.UTF-8');
while ($row = $stmt->fetch()) {
  
?>

            <div class="row schedule-item">
              <div class="col-md-2"><time><?php echo $row['date'] ?></time></div>
              <div class="col-md-10">
              
                <h4>A  Payment for: <?php echo $row['say_description'] ?>  <span>To:<?php echo $row['stage_aka'] ?>
                Amount: <b><?php echo $row['total_amount_usd'] ?> </b></h4>
				
				
              </div>
            </div>
<?php } ?>
<br>
	<?php 
						
				 $sql = "SELECT `balance_id`, `balance_date`, `amount`, `user_id`, `status` FROM `balances` WHERE `status`='A' and  `user_id`=:dbuser";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("dbuser",$dbuser);
$stmt->execute();
setlocale(LC_MONETARY, 'en_US.UTF-8');
while ($row = $stmt->fetch()) {
  
?>
<h4>Balance in your account: <b><?php echo $row['amount'] ?> </b></h4>

<?php } ?>
<button type="button"  class="buy-tickets" data-bs-toggle="modal" data-bs-target="#view-modal" data-ticket-type="pro-access" onclick="get_view_request(<?php echo $row['reques_id'] ?>)">Withdraw Balance</button> 
          </div>
          <!-- End Schdule Day 2 -->

          <!-- Schdule Day 3 -->
          <div role="tabpanel" class="col-lg-9  tab-pane " id="day-3">

         <div class="section-header">
	
          <h2>Edit Password</h2>
          
        </div>

      
        <div class="form">
          <form action="" method="POST" onsubmit="return checkeditpasswordvalid()" role="form" >
		  
             <div class="row">
			 <div class="form-group mt-3">
			 <input type="password" class="form-control"  hidden name="user_id"    id="user_id" placeholder="Current Password" value="<?php echo $user_id; ?>" required>
              <input type="password" class="form-control" name="current_password"   onkeyup="oldpassvalidate(<?php echo $user_id; ?>)" id="current_password" placeholder="Current Password" value="" required><span id="old_pass_response"></span>
            </div>
            
			</div>
			<br>
            <div class="row">
              <div class="form-group mt-3">
                <input type="password" class="form-control" name="new_password" onkeyup="passidvalidation()"  id="new_password" value="" placeholder="New Password" required><span id="passwordValidate"></span>
              </div>
			 </div>
			 <div class="row">
              <div class="form-group mt-3">
                <input type="password" class="form-control" name="new_password_confirm"  onkeyup="checkBothpasswords()" id="confirm_password" value="" placeholder="Confirm New Password" ><span id="checkbothpass"></span>
              </div>
            </div>
            
		
			
		
		
			
            <div id="self_edit_pass" class="my-3">
            
            </div>
            <div class="text-center"><button class="buy-tickets" type="submit" name="submit_self_edit_pass">Submit</button></div>
          </form>
        </div>
          </div>
          <!-- End Schdule Day 2 -->
		  
		   <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-4">

          
		  <div class="section-header">
	
          <h2>Requests</h2>
		  </div>
         				<?php 
					
				 $sql = "SELECT * FROM `request` INNER JOIN  `star_details` on `star_details`.`star_id`= `request`.`celeb_id` INNER JOIN `customer` ON `customer`.`user_id`=`star_details`.`user_id` 
				 INNER JOIN `starsay_cat` on `request`.`category_id`=`starsay_cat`.`say_category_id` left JOIN `video_uploads` On `request`.`reques_id`=`video_uploads`.`request_id` WHERE `request`.`user_id`=:dbuser";
 $stmt = $conn2->prepare($sql);
$stmt->bindParam("dbuser",$dbuser);
$stmt->execute();

while ($row = $stmt->fetch()) {
  
?>

            <div class="row schedule-item">
              <div class="col-md-2"><time><?php echo $row['date_made'] ?></time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img    src="<?php  if(!$row['customer_picture']){ echo 'assets/img/user.png'; } else{ echo 'assets/img/'.$row['customer_picture']; };?>" />
															
                </div>
                <h4>A  Request  Category: <?php echo $row['say_description'] ?>  <span>To:<?php echo $row['first_name'] ?> <?php echo $row['mid_name'] ?> <?php echo $row['last_name'] ?> </h4>
                <p>Required before: <b><?php echo $row['b_date'] ?> </b> Status: <?php echo statusDescription($row['status_code']);?></p>
				
				<button type="button"  class="buy-tickets" data-bs-toggle="modal" data-bs-target="#view-modal" data-ticket-type="pro-access" onclick="get_view_request(<?php echo $row['reques_id'] ?>)">View Request Details</button> 
                <?php if($row['status_code']==15){?>				
				<button type="button"  class="buy-tickets" data-bs-toggle="modal" data-bs-target="#view-video" data-ticket-type="pro-access" onclick="get_video_request(<?php echo $row['reques_id'] ?>)">View Video</button>
				<a href="RES/Uploads/<?php echo $row['vid_url'] ?>" download> <button type="button"  class="buy-tickets"  >Download Video</button></a>
				<?php } ?>
				
			 
				
				 <?php if($row['status_code']==11 OR $row['status_code']==16 ){?>				
				
				<a href="Payment_Options.php?oid=<?php echo $order_id ?>&req_id=<?php echo $row['reques_id']; ?>"> <button type="button"  class="buy-tickets"  >Pay</button></a>
				<button type="button"  class="buy-tickets" data-bs-toggle="modal" data-bs-target="#edit-modal" data-ticket-type="pro-access" onclick="get_edit_request(<?php echo $row['reques_id'] ?>)">Edit Request</button> 
				<?php } ?>
              </div>
            </div>
<?php } ?>
  
        
          </div>
          <!-- End Schdule Day 2 -->

        </div>

      </div>

    </section><!-- End Schedule Section -->

    <!-- ======= Venue Section ======= -->

    <!-- ======= Gallery Section ======= -->
   
    <!-- ======= Supporters Section ======= -->
   <!-- =======  F.A.Q Section ======= -->
  
    <!-- ======= Subscribe Section ======= -->
  
    <!-- ======= Contact Section ======= -->
  
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
  <?php include 'includes/footer.php';?> 
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
	<script src="assets/js/usersfunctions.js"></script>
  <script src="assets/scripts/general.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/slim.kickstart.min.js"></script>

</body>

</html>