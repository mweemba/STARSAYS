<?php include 'includes/sessions.php';
 if(starcheck($dbuser)=='N'){ 
 

 
 echo '<script>window.location = "profile.php";</script>';	
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
<h2>My Celebrity Profile</h2>
		 
      
        </div>
        </div>
      </div>
	  </div>
    </section><!-- End About Section -->

    <!-- ======= Speakers Section ======= -->
    
    <!-- ======= Schedule Section ======= -->
    <section id="schedule" class="section-with-bg">
        
           

														  

		 
      
     
      <div class="container" >
	 <?php 
			if($_GET['request_reject']=='Y'){
			
			echo '<div class="alert alert-success" role="alert">
 You Have rejected the request succesfully, Our Team will revert should there be any changes to the request
</div>';
		}
			if($_GET['request_reject']=='N'){
			
			echo '<div class="alert alert-danger" role="alert">
The Reques has NOT been rejected succeffuly
</div>';
		}
		?>

        <ul class="nav nav-tabs" role="tablist" data-aos-delay="100">
          <li class="nav-item">
            <a class="nav-link active" href="#pending_req" role="tab" data-bs-toggle="tab">Pending Requests</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="#day-3" role="tab" data-bs-toggle="tab">Uploaded Requests</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#fin" role="tab" data-bs-toggle="tab">Finances</a>
          </li>
          
		  <li class="nav-item">
            <a class="nav-link" href="#pInformation" role="tab" data-bs-toggle="tab">Edit Details</a>
          </li>
		   
        </ul>

        <h3 class="sub-heading">
				<?php 
//include 'actions/functions.php';
if(isset($_POST['EditStar'])){
	include('sync_pic.php');


$StageName=$_POST['StageName'];
$address_line_1=$_POST['address_line_1'];
$address_line_2=$_POST['address_line_2'];
$address_line_3=$_POST['address_line_3'];


$mobilenumber1=$_POST['mobilenumber1'];
$busines_line=$_POST['busines_line'];
$managers_line=$_POST['managers_line'];
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



$todaysdate=date("Y/m/d");


//include 'includes/passwordLib.php';



$lengthFile=strlen(trim($nameofFile));
//$encryptedpass = password_hash($password1, PASSWORD_BCRYPT);

 $SQL4 ="UPDATE `star_details`  SET `stage_aka`=:StageName,`address1`=:address_line_1,
`address2`=:address_line_2,`address3`=:address_line_3,`contact_1`=:mobilenumber1,`business_line`=:busines_line,`managers_contact`=:managers_line,
`email`=:email,`picture`=IF($lengthFile=0,`picture`,:nameofFile)  WHERE `star_id`=:star_id;

UPDATE `social_stats` SET `link`=:Facebook_link,`followers`=:Facebook_followers,`last_updated`=:todaysdate WHERE `star_id`=:star_id and `mediaName`='Facebook';
 
 UPDATE `social_stats` SET `link`=:Tiktok_link,`followers`=:Tiktok_followers,`last_updated`=:todaysdate WHERE `star_id`=:star_id and `mediaName`='Tiktok';

 
 UPDATE `social_stats` SET `link`=:Tweeter_link,`followers`=:Tweeter_followers,`last_updated`=:todaysdate WHERE `star_id`=:star_id and `mediaName`='Tweeter';
 
  UPDATE `social_stats` SET `link`=:Youtube_link,`followers`=:Youtube_followers,`last_updated`=:todaysdate WHERE `star_id`=:star_id and `mediaName`='Youtube';
  UPDATE `social_stats` SET `link`=:Instagram_link,`followers`=:Instagram_followers,`last_updated`=:todaysdate WHERE `star_id`=:star_id  `mediaName`='Instagram';

 UPDATE `say_pricing` SET `price`=:price_1,`last_updated`='[value-5]' WHERE `star_id`=:star_id and `say_category`='1';

  UPDATE `say_pricing` SET `price`=:price_2,`last_updated`=:todaysdate WHERE `star_id`=:star_id and `say_category`='2';
   UPDATE `say_pricing` SET `price`=:price_3,`last_updated`=:todaysdate WHERE `star_id`=:star_id and `say_category`='3';

  UPDATE `say_pricing` SET `price`=:price_4,`last_updated`=:todaysdate WHERE `star_id`=:star_id and `say_category`='4';
   UPDATE `say_pricing` SET `price`=:price_5,`last_updated`=:todaysdate WHERE `star_id`=:star_id and `say_category`='5';

  UPDATE `say_pricing` SET `price`=:price_6,`last_updated`=:todaysdate WHERE `star_id`=:star_id and `say_category`='6';
  DELETE FROM `star_personal category` WHERE `star_id`=:star_id;
";
//$query1=implode(" ",$query1);
  $SQL4=$SQL4.$query1;
 
  $stmt = $conn2->prepare($SQL4);
  $stmt->bindParam("star_id",$star_id);
  $stmt->bindParam("StageName",$StageName);
   $stmt->bindParam("address_line_1",$address_line_1);
   $stmt->bindParam("address_line_2",$address_line_2);
   $stmt->bindParam("address_line_3",$address_line_3);
  $stmt->bindParam("mobilenumber1",$mobilenumber1);
  $stmt->bindParam("busines_line",$busines_line);
  $stmt->bindParam("managers_line",$managers_line);
$stmt->bindParam("email",$email);
//$stmt->bindParam("picture",$picture);
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
$stmt->bindParam("Instagram_followers",$Instagram_followers);
$stmt->bindParam("Instagram_link",$Instagram_link);
$stmt->bindParam("price_1",$price_1);
$stmt->bindParam("price_2",$price_2);
$stmt->bindParam("price_3",$price_3);
$stmt->bindParam("price_4",$price_4);
$stmt->bindParam("price_5",$price_5);
$stmt->bindParam("price_6",$price_6);
$stmt->bindParam("todaysdate",$todaysdate);


if ($stmt->execute()) {
 // print_r($stmt->errorInfo());

 echo "<script>window.location = 'star_regist_confirm.php?reg=Y'</script>";
    		
}else {


 
 //$stmt->errorInfo());
			//echo "am here";
		//	echo "<script>window.location = 'star_regist_confirm.php?reg=N'</script>";
			
			
		
//}

	print_r($stmt->errorInfo());
	}
	

}
		  
		  ?>
		  
		
		</h3>

        <div class="tab-content row justify-content-center"  data-aos-delay="200">

          <!-- Schdule Day 1 -->
          <div role="tabpanel"  class="col-lg-9 tab-pane  " id="pInformation">

           
              <?php 

										 $query="SELECT `star_id`, `stage_aka`, `status`, `address1`, `address2`, `address3`, `contact_1`, `business_line`, `managers_contact`, `email`, `user_id`, `picture`, `customer_id`, `approved` FROM `star_details` WHERE `star_id`=:star_id";
											//SELECT `customer_id`, `first_name`, `mid_name`, `last_name`, `user_id`, `gender`, `dob`, `city`, `contact_no`, `country`, `picture`, `date_created` FROM `customer` WHERE 1
											$stmt = $conn2->prepare($query);
											$stmt->bindParam(":star_id",$star_id);
											$stmt->execute();
											while($row = $stmt->fetch()){ ?>

<form action="#" method="POST"  role="form" >
              <div class="row">
			 <div class="control-group mt-3" style="width:300px;margin: 0 auto;">

										<label class="control-label"> Picture<span class="required">*</span></label>

										<div class="controls">
                                      <div class="slim"
										 data-label="Drop your image here"
										 data-fetcher="fetch.php"
										 data-instant-edit="true" 
										 data-size="640,680"
										 data-ratio="4:3">
										<input type="file" name="slim[]"  />
										<img  class="editable img-responsive"  src="<?php  if(!$row['picture']){ echo 'assets/img/Stars	/user.png'; } else{ echo 'assets/img/'.$row['picture']; };?>" />
									</div>
											

										</div>
										</div>
			
            
			</div>
			<br>
             <div class="row">
			
			 <div class="form-group mt-3">
              <input type="text" class="form-control" name="StageName" id="StageName" placeholder="Stage Name/Popular name Here" value="<?php echo $row['stage_aka'];?>" required>
            </div>
            
			</div>
			<br>
			
			
			  <div class="row">
			 <div class="form-group mt-3">
              <textarea type="text" class="form-control" rows="8" name="introduction_text" id="introduction_tex" placeholder="Introduction Text Here"  required><?php echo $row['stage_aka'];?></textarea>
			  
            </div>
            
			</div>
              <br>
              <div class="form-group mt-3">
              <input type="email" class="form-control" name="email"  id="email" placeholder="Your Email Here"  value="<?php echo $row['email'];?>"required>
            </div>
			
			<br>
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="address_line_1" id="address_line_1" placeholder="Physical Address line 1" value="<?php echo $row['address1'];?>" required>
              </div>
              <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="text" class="form-control" name="address_line_2" id="address_line_1" placeholder="Physical Address line 1" value="<?php echo $row['address2'];?>" >
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="address_line_3"  id="address_line_1" placeholder="Physical Address line 1"  value="<?php echo $row['address3'];?>"><span id="email_response"></span>
            </div>
			
			
			
			<br>
			<div class="row">
              <div class="form-group col-md-6">
               Primary Contact Number
              </div>
              <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="text" class="form-control" name="mobilenumber1" id="mobilenumber1"  value="<?php echo $row['contact_1'];?>" placeholder="Mobile Number" required>
              </div>
            </div>
			<br>
			<div class="row">
              <div class="form-group col-md-6">
                Business Contact Number
              </div>
              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="busines_line" id="business_line" value="<?php echo $row['business_line'];?>" placeholder="Business Line" required> 
              </div>
            </div>
			<br>
			<div class="row">
              <div class="form-group col-md-6">
               Manager's  Contact Number
              </div>
              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="managers_line" id="managers_line" value="<?php echo $row['managers_contact'];?>" placeholder="Managers/handlers Line" required> 
              </div>
            </div>
              
            
			<br> 
        <div class="section-header">
	
          <h2>Your Pricing</h2>
          
        </div>
		<p style="color:red"> NOTE: STARSAYS will pay you 75% of the price you will indicate here, All amounts in USD($)</p>
		<?php 
				  $sql = "SELECT * FROM `starsay_cat` LEFT OUTER JOIN `say_pricing`  ON `starsay_cat`.`say_category_id`=`say_pricing`.`say_category` WHERE `star_id`=:star_id";
 $stmt = $conn2->prepare($sql);
 $stmt->bindParam(":star_id",$star_id);
$stmt->execute();

while ($row = $stmt->fetch()) {
    $say_description= $row['say_description'];
	$say_category_id= $row['say_category_id'];
?>


						  
			<div class="row">
             <div class="col-md-6">
			<?php echo $say_description; ?>
                 </div>
              <div class="form-group form-group col-md-6">
                <input type="number" class="form-control" name="price_<?php echo $say_category_id; ?>" id="<?php echo $say_category_id; ?>" value="<?php echo $row['price']; ?>"  placeholder="Your Price for a <?php echo $say_description; ?> Video here" required> <span id="mobile_response"></span>
              </div>
            </div>
			<br>
              
            
			<?php } ?>
                <div class="section-header">
	
          <h2>Your Tallents</h2>
          
        </div>
              <div class="row">
              	<?php 
				 $sql = "SELECT `category_id`, `category_name`, `session` FROM `star_categorys`";
 $stmt = $conn2->prepare($sql);

$stmt->execute();

while ($row = $stmt->fetch()) {
  
?>

      
             
              <div class="form-group col-md-4 mt-3 mt-md-0">
                 <input class="form-check-input" type="checkbox" <?php if(checkifmarked($star_id,$row['category_id'])=='Y'){ echo 'checked'; }?> value="<?php echo $row['category_id'] ?>" name="talents[]" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
   <?php echo $row['category_name']; ?>
  </label>
              </div>
            
			
<?php }?>
			
		</div>
			<br>
              
              
         <div class="section-header">
	
          <h2>Your Current Socials</h2>
          
        </div>
			<?php 
				 $sql = "SELECT * FROM `socials_id` INNER JOIN  `social_stats` ON  `socials_id`.`Name`=`social_stats`.`mediaName` WHERE `star_id`=:star_id";
 $stmt = $conn2->prepare($sql);
$stmt->bindParam(":star_id",$star_id);
$stmt->execute();

while ($row = $stmt->fetch()) {
    
?>

      <div class="row">
              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="<?php echo $row['Name'];?>_link" id="<?php echo $row['Name'];?>_n" placeholder="<?php echo $row['Name'];?> Link" value="<?php echo $row['Name'];?>_link" >
              </div>
              <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="text" class="form-control" name="<?php echo $row['Name'];?>_followers" value='<?php echo $row['followers'];?>'; id="<?php echo $row['Name'];?>_f" placeholder="<?php echo $row['Name'];?> Followers" required >
              </div>
            </div>
			<br>
			
<?php }?>
			
            <div id="form_valid_message" class="my-3">
                
            </div>
               
            <div class="text-center"><button class="buy-tickets" name="EditStar" type="submit">Save</button></div>
          </form>
		  
<?php } ?>
											
		
            

          </div>
          <!-- End Schdule Day 1 -->

          <!-- Schdule Day 2 -->
          <div role="tabpanel" class="col-lg-9  tab-pane fade show active" id="pending_req">
		  <div class="section-header">
	
          <h2>Pending Requests</h2>
		  </div>
		  
         				<?php 
					
				 $sql = "SELECT * FROM `request` INNER JOIN `customer` ON `customer`.`user_id`=`request`.`user_id`  INNER JOIN `starsay_cat` on `request`.`category_id`=`starsay_cat`.`say_category_id`WHERE `celeb_id`=:star_id and `video_upload_status`='P' and `payment_status`='Paid'";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("star_id",$star_id);
$stmt->execute();

while ($row = $stmt->fetch()) {
  
?>

            <div class="row schedule-item">
              <div class="col-md-2"><time><?php echo $row['date_made'] ?></time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img    src="<?php  if(!$row['customer_picture']){ echo 'assets/img/user.png'; } else{ echo 'assets/img/'.$row['customer_picture']; };?>" />
															
                </div>
                <h4>A  Request  Category: <?php echo $row['say_description'] ?>  <span>From:<?php echo $row['first_name'] ?> <?php echo $row['mid_name'] ?> <?php echo $row['last_name'] ?> </h4>
                <p>Required before: <b><?php echo $row['b_date'] ?> </b></p>
				
				<button type="button"  class="buy-tickets" data-bs-toggle="modal" data-bs-target="#view-modal" data-ticket-type="pro-access" onclick="get_view_request(<?php echo $row['reques_id'] ?>)">View Details</button> 	
				<button type="button"  class="buy-tickets" data-bs-toggle="modal" data-bs-target="#upload-modal" data-ticket-type="pro-access" onclick="putname(<?php echo $row['reques_id'] ?>)">Upload Video</button>
				<button type="button"  class="buy-tickets" data-bs-toggle="modal" data-bs-target="#reject-modal" data-ticket-type="pro-access" onclick="get_delete_r(<?php echo $row['reques_id'] ?>)">Reject Request</button>
              </div>
            </div>
<?php } ?>
  
          </div>
          <!-- End Schdule Day 2 -->

          <!-- Schdule Day 3 -->
          <div role="tabpanel" class="col-lg-9  tab-pane " id="day-3">

         <div class="section-header">
	
          <h2>Uploaded Requests</h2>
		  </div>
     				<?php 
						
				 $sql = "SELECT * FROM `request` INNER JOIN `customer` ON `customer`.`user_id`=`request`.`user_id`  INNER JOIN `starsay_cat` on `request`.`category_id`=`starsay_cat`.`say_category_id`WHERE `celeb_id`=:star_id and `video_upload_status`='U' and `payment_status`='Paid'";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("star_id",$star_id);
$stmt->execute();

while ($row = $stmt->fetch()) {
  
?>

            <div class="row schedule-item">
              <div class="col-md-2"><time><?php echo $row['date_made'] ?></time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img    src="<?php  if(!$row['customer_picture']){ echo 'assets/img/user.png'; } else{ echo 'assets/img/'.$row['customer_picture']; };?>" />
															
                </div>
                <h4>A  Request  Category: <?php echo $row['say_description'] ?>  <span>From:<?php echo $row['first_name'] ?> <?php echo $row['mid_name'] ?> <?php echo $row['last_name'] ?> </h4>
                <p>Required before: <b><?php echo $row['b_date'] ?> </b></p>
				
				<button type="button"  class="buy-tickets" data-bs-toggle="modal" data-bs-target="#view-modal" data-ticket-type="pro-access" onclick="get_view_request(<?php echo $row['reques_id'] ?>)">View Details</button> 		
				<button type="button"  class="buy-tickets" data-bs-toggle="modal" data-bs-target="#view-video" data-ticket-type="pro-access" onclick="get_video_request(<?php echo $row['reques_id'] ?>)">View Video</button>
				
              </div>
            </div>
<?php } ?>
  
        </div>
		<div role="tabpanel" class="col-lg-9  tab-pane " id="fin">

         <div class="section-header">
	
          <h3>Payments Recieved</h3>
          
		  </div>
     				<?php 
					
				 $sql = "SELECT * FROM 
				 `transactions_in`  INNER JOIN `request` ON `request`.`reques_id`=`transactions_in`.`reques_id` 
				 INNER JOIN `star_details` ON `transactions_in`.`celeb_id`=`star_details`.`star_id`  INNER JOIN `customer`
				 ON `transactions_in`.`From_user_id`=`customer`.`user_id` WHERE `transactions_in`.`celeb_id`=:star_id and `success`='Yes'";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("star_id",$star_id);
$stmt->execute();

while ($row = $stmt->fetch()) {
  
?>

            <div class="row schedule-item">
              <div class="col-md-2"><time><?php echo $row['date'] ?></time></div>
              <div class="col-md-10">
              
                <h4>A Payment for Request : <?php echo $row['say_description'] ?>  <span> From:<?php echo $row['first_name'] ?> <?php echo $row['mid_name'] ?> <?php echo $row['last_name'] ?> of  
                Amount: <b><?php echo $row['star_payment_amount'] ?> </b></h4>
				
				
              </div>
            </div>
<?php } ?>

         <div class="section-header">
	
          <h3>Withdraws</h3>
          
		  </div>
     				<?php 
						
				 $sql = "SELECT `tran_id`, `star_id`, `date_time`, `method`, `amount_`, `status`, `staff_id` FROM `transactions_payout` WHERE `star_id`=:star_id";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("star_id",$star_id);
$stmt->execute();

while ($row = $stmt->fetch()) {
  
?>

            <div class="row schedule-item">
              <div class="col-md-2"><time><?php echo $row['date_time'] ?></time></div>
              <div class="col-md-10">
                
                <h4>Payment <span>Amount:<?php echo $row['amount_'] ?>  
                Paid Through: <b><?php echo $row['method'] ?></h4>
				
				
				
              </div>
            </div>
<?php } ?>
  
        </div>

      
          </div>
          <!-- End Schdule Day 2 -->
		  
		   <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-4">

            <div class="row schedule-item">
              <div class="col-md-2"><time>10:00 AM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/img/speakers/2.jpg" alt="Hubert Hirthe">
                </div>
                <h4>Et voluptatem iusto dicta nobis. <span>Hubert Hirthe</span></h4>
                <p>Maiores dignissimos neque qui cum accusantium ut sit sint inventore.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>11:00 AM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/img/speakers/3.jpg" alt="Cole Emmerich">
                </div>
                <h4>Explicabo et rerum quis et ut ea. <span>Cole Emmerich</span></h4>
                <p>Veniam accusantium laborum nihil eos eaque accusantium aspernatur.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>12:00 AM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/img/speakers/1.jpg" alt="Brenden Legros">
                </div>
                <h4>Libero corrupti explicabo itaque. <span>Brenden Legros</span></h4>
                <p>Facere provident incidunt quos voluptas.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>02:00 PM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/img/speakers/4.jpg" alt="Jack Christiansen">
                </div>
                <h4>Qui non qui vel amet culpa sequi. <span>Jack Christiansen</span></h4>
                <p>Nam ex distinctio voluptatem doloremque suscipit iusto.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>03:00 PM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/img/speakers/5.jpg" alt="Alejandrin Littel">
                </div>
                <h4>Quos ratione neque expedita asperiores. <span>Alejandrin Littel</span></h4>
                <p>Eligendi quo eveniet est nobis et ad temporibus odio quo.</p>
              </div>
            </div>

            <div class="row schedule-item">
              <div class="col-md-2"><time>04:00 PM</time></div>
              <div class="col-md-10">
                <div class="speaker">
                  <img src="assets/img/speakers/6.jpg" alt="Willow Trantow">
                </div>
                <h4>Quo qui praesentium nesciunt <span>Willow Trantow</span></h4>
                <p>Voluptatem et alias dolorum est aut sit enim neque veritatis.</p>
              </div>
            </div>

          </div>
          <!-- End Schdule Day 2 -->

        </div>

      </div>

    </section><!-- End Schedule Section -->

    <!-- ======= Venue Section ======= -->
    <section id="venue">

      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
          <h2>Event Venue</h2>
          <p>Event venue location info and gallery</p>
        </div>

        <div class="row g-0">
          <div class="col-lg-6 venue-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>

          <div class="col-lg-6 venue-info">
            <div class="row justify-content-center">
              <div class="col-11 col-lg-8 position-relative">
                <h3>Downtown Conference Center, New York</h3>
                <p>Iste nobis eum sapiente sunt enim dolores labore accusantium autem. Cumque beatae ipsam. Est quae sit qui voluptatem corporis velit. Qui maxime accusamus possimus. Consequatur sequi et ea suscipit enim nesciunt quia velit.</p>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="container-fluid venue-gallery-container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/1.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/2.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/3.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/4.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/5.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/6.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/7.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/8.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>
      </div>

    </section><!-- End Venue Section -->

    <!-- ======= Hotels Section ======= -->
    <section id="hotels" class="section-with-bg">

      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Hotels</h2>
          <p>Her are some nearby hotels</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="assets/img/hotels/1.jpg" alt="Hotel 1" class="img-fluid">
              </div>
              <h3><a href="#">Hotel 1</a></h3>
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p>0.4 Mile from the Venue</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="assets/img/hotels/2.jpg" alt="Hotel 2" class="img-fluid">
              </div>
              <h3><a href="#">Hotel 2</a></h3>
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill-half-full"></i>
              </div>
              <p>0.5 Mile from the Venue</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="assets/img/hotels/3.jpg" alt="Hotel 3" class="img-fluid">
              </div>
              <h3><a href="#">Hotel 3</a></h3>
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p>0.6 Mile from the Venue</p>
            </div>
          </div>

        </div>
      </div>

    </section><!-- End Hotels Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Gallery</h2>
          <p>Check our gallery from the recent events</p>
        </div>
      </div>

      <div class="gallery-slider swiper">
        <div class="swiper-wrapper align-items-center">
          <div class="swiper-slide"><a href="assets/img/gallery/1.jpg" class="gallery-lightbox"><img src="assets/img/gallery/1.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="assets/img/gallery/2.jpg" class="gallery-lightbox"><img src="assets/img/gallery/2.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="assets/img/gallery/3.jpg" class="gallery-lightbox"><img src="assets/img/gallery/3.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="assets/img/gallery/4.jpg" class="gallery-lightbox"><img src="assets/img/gallery/4.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="assets/img/gallery/5.jpg" class="gallery-lightbox"><img src="assets/img/gallery/5.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="assets/img/gallery/6.jpg" class="gallery-lightbox"><img src="assets/img/gallery/6.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="assets/img/gallery/7.jpg" class="gallery-lightbox"><img src="assets/img/gallery/7.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="assets/img/gallery/8.jpg" class="gallery-lightbox"><img src="assets/img/gallery/8.jpg" class="img-fluid" alt=""></a></div>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </section><!-- End Gallery Section -->

    <!-- ======= Supporters Section ======= -->
    <section id="supporters" class="section-with-bg">

      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Sponsors</h2>
        </div>

        <div class="row no-gutters supporters-wrap clearfix" data-aos="zoom-in" data-aos-delay="100">

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/1.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/2.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/3.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/4.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/5.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/6.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/7.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/8.png" class="img-fluid" alt="">
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Sponsors Section -->

    <!-- =======  F.A.Q Section ======= -->
    <section id="faq">

      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>F.A.Q </h2>
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-9">

            <ul class="faq-list">

              <li>
                <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                  </p>
                </div>
              </li>

            </ul>

          </div>
        </div>

      </div>

    </section><!-- End  F.A.Q Section -->

    <!-- ======= Subscribe Section ======= -->
    <section `id="subscribe">
      <div class="container" data-aos="zoom-in">
        <div class="section-header">
          <h2>Newsletter</h2>
          <p>Rerum numquam illum recusandae quia mollitia consequatur.</p>
        </div>

        <form method="POST" action="#">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10 d-flex">
              <input type="text" class="form-control" placeholder="Enter your Email">
              <button type="submit" class="ms-2">Subscribe</button>
            </div>
          </div>
        </form>

      </div>
    </section><!-- End Subscribe Section -->

    <!-- ======= Buy Ticket Section ======= -->
    <section id="buy-tickets" class="section-with-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Buy Tickets</h2>
          <p>Velit consequatur consequatur inventore iste fugit unde omnis eum aut.</p>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Standard Access</h5>
                <h6 class="card-price text-center">$150</h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Community Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Workshop Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>After Party</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="standard-access">Buy Now</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Pro Access</h5>
                <h6 class="card-price text-center">$250</h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Community Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Workshop Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>After Party</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="pro-access">Buy Now</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Pro Tier -->
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Premium Access</h5>
                <h6 class="card-price text-center">$350</h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Community Access</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Workshop Access</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>After Party</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="premium-access">Buy Now</button>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Modal Order Form -->
      <div id="buy-ticket-modal" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Buy Tickets</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="#">
                <div class="form-group">
                  <input type="text" class="form-control" name="your-name" placeholder="Your Name">
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="your-email" placeholder="Your Email">
                </div>
                <div class="form-group mt-3">
                  <select id="ticket-type" name="ticket-type" class="form-select">
                    <option value="">-- Select Your Ticket Type --</option>
                    <option value="standard-access">Standard Access</option>
                    <option value="pro-access">Pro Access</option>
                    <option value="premium-access">Premium Access</option>
                  </select>
                </div>
                <div class="text-center mt-3">
                  <button type="submit" class="btn">Buy Now</button>
                </div>
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

  <?php include 'models.php';?>

    </section><!-- End Buy Ticket Section -->



  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="assets/img/logo.png" alt="TheEvenet">
            <p>In alias aperiam. Placeat tempore facere. Officiis voluptate ipsam vel eveniet est dolor et totam porro. Perspiciatis ad omnis fugit molestiae recusandae possimus. Aut consectetur id quis. In inventore consequatur ad voluptate cupiditate debitis accusamus repellat cumque.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>TheEvent</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
      -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

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
  <script src="assets/scripts/upload.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/slim.kickstart.min.js"></script>

</body>

</html>