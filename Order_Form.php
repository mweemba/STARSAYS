<?php include 'includes/sessions.php';
$star_id=$_GET['sid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SarSays</title>
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

  <!-- =======================================================
  * Template Name: TheEvent - v4.7.0
  * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include 'includes/header2.php';?>

  <main id="main" class="main-page">

    <!-- ======= Speaker Details Sectionn ======= -->
     <section id="contact" class="section-bg">

      <div class="container" data-aos="fade-up">

        <div class="section-header">
		<?php
		
			if($_GET['request_order']=='No'){
			
			echo '<div class="alert alert-danger" role="alert">
 The rigstration could not take place due to an error, please try again
</div>';
		}
		
		if($_GET['regist']=='N'){
			
			echo '<div class="alert alert-danger" role="alert">
 The rigstration could not take place due to an error, please try again
</div>';
		}
		?>
		
		<?php
		
			if($_GET['regist']=='N'){
			
			echo '<div class="alert alert-danger" role="alert">
 The rigstration could not take place due to an error, please try again
</div>';
		}
		
		
		
		$dataSQL="SELECT * FROM `star_details` 
 INNER JOIN `customer` ON `star_details`.`user_id`=`customer`.`user_id` WHERE star_details.star_id=:star_id";
	$stmt = $conn2->prepare($dataSQL);
	$stmt->bindParam("star_id",$star_id);

											
	$stmt->execute();
	while($row = $stmt->fetch()){ ?>
          <h2>Order  a StarSay</h2>
		   <p>From Celebrity: <?php echo $row['first_name'];  ?> <?php echo $row['mid_name'];  ?> <?php echo $row['last_name'];  ?> AKA <?php echo $row['stage_aka'];  ?></p>
		   
	<?php } ?>
        
		
         
		  
		  <?php
		  $request_submit=$_POST['request_submit'];
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
		  $vid_id="";
		  $acceptedBy_admin='W';
		  $celeb_response='W';
		  $celeb_comment='';
		  $date_created=date("Y-m-d h:i:sa");
          $date_modified=date("Y-m-d h:i:sa");
		  $todaydate=date("Y-m-d");
		  $timenow=date("h:i:sa");
		  $totalamount=$_POST ['totalamount'];
		   $gatewayPayment=$_POST ['totalamount']*0.05;
		   $celeb_payent=$_POST ['totalamount']*0.75;
		   $says_commission=$_POST ['totalamount']-$celeb_payent;
		   $order_id=rand(0000000000,9999999999);
		    
          $session=rand(0000000000,9999999999);
        $request_id=mt_rand();




$SQL4 ="INSERT INTO `request`(`reques_id`, `b_date`, `user_id`, `celeb_id`, `person_from`, `person_to`, `request_purpose_instruction`, `extra_info`, `prefared_lang`,
 `category_id`, `session`, `acceptedBy_admin`, `celeb_response`, `celeb_comment`, `date_made`, `date_modified`, `vid_id`, `video_upload_status`, `price`, `payment_status`,
 `status_code`)
VALUES (:request_id,:date_required,:user_id,:celeb_id,:NameFrom,:NameTo,:purpose,:extra,:language
,:category_id,'$session',:acceptedBy_admin,:celeb_response,:celeb_comment,:date_created,:date_modified,:vid_id,'P',:totalamount,'Payment Pending','11');

INSERT INTO `orders`(`order_id`, `category`, `date_order`, `request_id`, `user_id`, `customer_id`, `celeb_id`, `total_order_amount`, 
`celeb_payment`, `commision`, `payment_status`, `order_status`) 
VALUES (:order_id,:category_id,:date_created,:request_id,:user_id ,:customer_id,:celeb_id,:totalamount,:celeb_payent,:says_commission,'Pending','Payment Pending');


INSERT INTO `order_activities`(`activity_id`, `activity_description`, `activity_date`, `activity_time`, `person_responsible`, `order_id`, `session_id`) 
VALUES ('0','The order has been made','$todaydate','$timenow',:user_id,:order_id,'$session')";


  
 
  $stmt = $conn2->prepare($SQL4);
 $stmt->bindParam("request_id",$request_id);
   $stmt->bindParam("order_id",$order_id);
 $stmt->bindParam("totalamount",$totalamount);
 $stmt->bindParam("customer_id",$customer_id);
  $stmt->bindParam("date_required",$date_required);
  $stmt->bindParam("NameFrom",$NameFrom);
  $stmt->bindParam("user_id",$user_id);
   $stmt->bindParam("celeb_id",$celeb_id);
  $stmt->bindParam("category_id",$category_id);
   $stmt->bindParam("NameTo",$NameTo);
  $stmt->bindParam("extra",$extra);
 $stmt->bindParam("vid_id",$vid_id);
   $stmt->bindParam("purpose",$purpose);
 $stmt->bindParam("acceptedBy_admin",$acceptedBy_admin);
  $stmt->bindParam("celeb_response",$celeb_response);
  $stmt->bindParam("celeb_comment",$celeb_comment);
  $stmt->bindParam("celeb_payent",$celeb_payent);
    $stmt->bindParam("says_commission",$says_commission);
 $stmt->bindParam("date_created",$date_created);
 $stmt->bindParam("date_modified",$date_modified);
 $stmt->bindParam("language",$language);
 


if ($stmt->execute()) {
  

 echo "<script>window.location = 'Payment_Options.php?oid=".$order_id."&req_id=".$request_id."'</script>";
    		
}else {

print_r($stmt->errorInfo());

			
			 echo "<script>window.location = 'Order_Form.php?request_order=No'</script>";
			
			
		
//}

	
	}
	
		  
		  
		  }
		  ?>
          
        </div>

      
        <div class="form">
          <form action="do_register.php" method="POST" onsubmit="return checkregistervalid()" role="form" >
             
			 
              <div class="form-group mt-3">
             
				<select name="country" class="form-control" onchange="getRequestForm(<?php echo $star_id; ?>)" id="select_type">
				<option value="">--Select Type--</option>
				<?php 
				 $sql = "SELECT `say_category_id`, `say_description`, `session`, `active` FROM `starsay_cat` WHERE `active`='Y'";
 $stmt = $conn2->prepare($sql);

$stmt->execute();

while ($row = $stmt->fetch()) {
    $say_description= $row['say_description'];
	$say_category_id= $row['say_category_id'];
?>


					  <option value="<?php echo $say_category_id; ?>"><?php echo $say_description; ?></option>
					  
		<?php } ?>			  
					  
					  
					 
					</select>
            </div>
            
            
			
			</form>
			</div>
			
			<br>
			<div id="form_place"  class="form">
          
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include 'includes/footer.php';?>           </p>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
	<script src="assets/js/usersfunctions.js"></script>
  <script src="assets/scripts/general.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
 

</body>

</html>