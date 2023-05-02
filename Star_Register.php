<?php include 'includes/sessions.php';?>
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
  <link rel="stylesheet" href="assets/css/slim.min.css">

  <!-- =======================================================
  * Template Name: TheEvent - v4.7.0
  * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
  
* {
  box-sizing: border-box;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
</style>
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
		
			if($_GET['regist']=='N'){
			
			echo '<div class="alert alert-danger" role="alert">
 The rigstration could not take place due to an error, please try again
</div>';
		}
		?>
		
		<?php 
//include 'actions/functions.php';
if(isset($_POST['registerStar'])){
	

$dialing_code1=$_POST['dialing_code1'];
$StageName=$_POST['StageName'];
$address_line_1=$_POST['address_line_1'];
$address_line_2=$_POST['address_line_2'];
$address_line_3=$_POST['address_line_3'];

$country=$_POST['country'];
$mobilenumber1=$dialing_code1.$_POST['mobilenumber1'];
$busines_line=$dialing_code1.$_POST['busines_line'];
$managers_line=$dialing_code1.$_POST['managers_line'];
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
$star_id=time().rand(0,100);


$query1="";
for ($i=0; $i<sizeof ($checkboxtalents);$i++) {  
    
 
    
$query1.="INSERT INTO `star_personal category`(`id`, `star_id`, `category_id`) VALUES (0,'".$star_id."','".$checkboxtalents[$i]."');"; 
   
    
} 
require_once('async.php');
$country=$_POST['country'];

$todaysdate=date("Y/m/d");
$picture='';
$start_id=0;
//include 'includes/passwordLib.php';

$approved="N";
$s_admin_comment="W";


//$encryptedpass = password_hash($password1, PASSWORD_BCRYPT);

$SQL4 ="INSERT INTO `star_details`(`star_id`, `stage_aka`, `admin_comment`, `address1`, `address2`, `address3`,
 `contact_1`, `business_line`, `managers_contact`, `email`, `user_id`, `picture`, `customer_id`, `approved`, `date_created`)
VALUES (:star_id,:StageName,:s_admin_comment,:address_line_1,:address_line_2,:address_line_3,:mobilenumber1,:busines_line,
:managers_line,:email,:user_id,:nameofFile,:customer_id,:approved,:todaysdate);

INSERT INTO `social_stats`(`start_id`, `star_id`, `mediaName`, `link`, `followers`, `last_updated`) VALUES
 (:start_id,:star_id,'Facebook',:Facebook_link,:Facebook_followers,:todaysdate);
 
 INSERT INTO `social_stats`(`start_id`, `star_id`, `mediaName`, `link`, `followers`, `last_updated`) VALUES
 (:start_id,:star_id,'Tiktok',:Tiktok_link,:Tiktok_followers,:todaysdate);
 
 INSERT INTO `social_stats`(`start_id`, `star_id`, `mediaName`, `link`, `followers`, `last_updated`) VALUES
 (:start_id,:star_id,'Tweeter',:Tweeter_link,:Tweeter_followers,:todaysdate);
 
 INSERT INTO `social_stats`(`start_id`, `star_id`, `mediaName`, `link`, `followers`, `last_updated`) VALUES
 (:start_id,:star_id,'Youtube',:Youtube_link,:Youtube_followers,:todaysdate);
  INSERT INTO `social_stats`(`start_id`, `star_id`, `mediaName`, `link`, `followers`, `last_updated`) VALUES
 (:start_id,:star_id,'Instagram',:Instagram_link,:Instagram_followers,:todaysdate);

 INSERT INTO `say_pricing`(`price_id`, `star_id`, `say_category`, `price`, `last_updated`) 
 VALUES (:price_id,:star_id,'1',:price_1,:todaysdate);
 
 INSERT INTO `say_pricing`(`price_id`, `star_id`, `say_category`, `price`, `last_updated`) 
 VALUES (:price_id,:star_id,'2',:price_2,:todaysdate);
 
 INSERT INTO `say_pricing`(`price_id`, `star_id`, `say_category`, `price`, `last_updated`) 
 VALUES (:price_id,:star_id,'3',:price_3,:todaysdate);
 
 INSERT INTO `say_pricing`(`price_id`, `star_id`, `say_category`, `price`, `last_updated`) 
 VALUES (:price_id,:star_id,'4',:price_4,:todaysdate);
 
 INSERT INTO `say_pricing`(`price_id`, `star_id`, `say_category`, `price`, `last_updated`) 
 VALUES (:price_id,:star_id,'5',:price_5,:todaysdate);
 
 INSERT INTO `say_pricing`(`price_id`, `star_id`, `say_category`, `price`, `last_updated`) 
 VALUES (:price_id,:star_id,'6',:price_6,:todaysdate);";
//$query1=implode(" ",$query1);
 $SQL4=$SQL4.$query1;
 
  $stmt = $conn2->prepare($SQL4);
  $stmt->bindParam("star_id",$star_id);
  $stmt->bindParam("StageName",$StageName);
   $stmt->bindParam("s_admin_comment",$s_admin_comment);
   $stmt->bindParam("address_line_1",$address_line_1);
   $stmt->bindParam("address_line_2",$address_line_2);
   $stmt->bindParam("address_line_3",$address_line_3);
  $stmt->bindParam("mobilenumber1",$mobilenumber1);
  $stmt->bindParam("busines_line",$busines_line);
  $stmt->bindParam("managers_line",$managers_line);
$stmt->bindParam("email",$email);
$stmt->bindParam("user_id",$user_id);
$stmt->bindParam("customer_id",$customer_id);
//$stmt->bindParam("picture",$picture);
$stmt->bindParam("country",$country);
$stmt->bindParam("approved",$approved);
$stmt->bindParam("Facebook_link",$Facebook_link);
$stmt->bindParam("nameofFile",$nameofFile);

$stmt->bindParam("Facebook_followers",$Facebook_followers);
$stmt->bindParam("Tweeter_link",$Tweeter_link);
$stmt->bindParam("Tweeter_followers",$Tweeter_followers);
$stmt->bindParam("Tiktok_followers",$Tiktok_followers);
$stmt->bindParam("Tiktok_link",$Tiktok_link);
$stmt->bindParam("Youtube_link",$Youtube_link);
$stmt->bindParam("Youtube_followers",$Youtube_followers);
$stmt->bindParam("Youtube_link",$Instagram_link);
$stmt->bindParam("Youtube_followers",$Instagram_followers);
$stmt->bindParam("Instagram_link",$Instagram_link);
$stmt->bindParam("Instagram_followers",$Instagram_followers);
$stmt->bindParam("price_1",$price_1);
$stmt->bindParam("price_2",$price_2);
$stmt->bindParam("price_3",$price_3);
$stmt->bindParam("price_4",$price_4);
$stmt->bindParam("price_5",$price_5);
$stmt->bindParam("price_6",$price_6);
$stmt->bindParam("start_id",$start_id);
$stmt->bindParam("price_id",$price_id);
$stmt->bindParam("todaysdate",$todaysdate);


if ($stmt->execute()) {
 // print_r($stmt->errorInfo());

 echo "<script>window.location = 'star_regist_confirm.php?reg=Y'</script>";
    		
}else {


 print_r($stmt->errorInfo());
 //$stmt->errorInfo());
			//echo "am here";
		//	echo "<script>window.location = 'star_regist_confirm.php?reg=N'</script>";
			
			
		
//}

	
	}
	

}

?>
          <h2>StarSays Register</h2>
          
        </div>
    
        <div class="form">
          <form action="Star_Register.php" method="POST" onsubmit="return checkregistervalid()" role="form" >
             <div class="row">
			 <div class="control-group mt-3" style="width:300px;margin: 0 auto;">

										<label class="control-label">Picture<span class="required">*</span></label>

										<div class="controls">
                                      <div class="slim"
										 data-label="Drop your image here"
										 data-fetcher="fetch.php"
										 data-instant-edit="true" 
										 data-size="640,480"
										 data-ratio="4:3">
										<input type="file" name="slim[]"  />
									</div>
											

										</div>
										</div>
			 <div class="form-group mt-3">
              <input type="text" class="form-control" name="StageName" id="StageName" placeholder="Stage Name/Popular name Here" required>
            </div>
            
			</div>
			<br>
			
			
			  <div class="row">
			 <div class="form-group mt-3">
              <textarea type="text" class="form-control" rows="8" name="introduction_text" id="introduction_tex" placeholder="Introduction Text Here" required></textarea>
			  
            </div>
            
			</div>
              <br>
              <div class="form-group mt-3">
              <input type="email" class="form-control" name="email"  id="email" placeholder="Your Email Here" required>
            </div>
			
			<br>
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="address_line_1" id="address_line_1" placeholder="Physical Address line 1" required>
              </div>
              <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="text" class="form-control" name="address_line_2" id="address_line_1" placeholder="Physical Address line 1" >
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="address_line_3"  id="address_line_1" placeholder="Physical Address line 1" ><span id="email_response"></span>
            </div>
			
			
			<div class="form-group mt-3">
             
				<select name="country"  onchange="getCountry_code_star()"class="form-control" id="country_id">
				<option value="">--Select Country--</option>
				<?php 
				 $sql = "SELECT `Id`, `Country`, `country_code`, `dialing_code` FROM `countrie_codes`";
 $stmt = $conn2->prepare($sql);

$stmt->execute();

while ($row = $stmt->fetch()) {
    $country= $row['Country'];
	$country_id= $row['Id'];
?>


					  <option value="<?php echo $country_id; ?>"><?php echo $country; ?></option>
					  
		<?php } ?>			  
					  
					  
					 
					</select>
            </div>
			<br>
			<div class="row">
              <div class="form-group col-md-1">
                <input type="text" name="dialing_code1"  class="form-control" id="dialing_code1" placeholder="" required>
              </div>
              <div class="form-group col-md-10 mt-3 mt-md-0">
                <input type="text" class="form-control" name="mobilenumber1" id="mobilenumber1" placeholder="Mobile Number" required>
              </div>
            </div>
			<br>
			<div class="row">
              <div class="form-group col-md-1">
                <input type="text" name="dialing_code2"  class="form-control" id="dialing_code2" placeholder="" required>
              </div>
              <div class="form-group col-md-10 mt-3 mt-md-0">
                <input type="text" class="form-control" name="busines_line" id="business_line" placeholder="Business Line" required> 
              </div>
            </div>
			<br>
			<div class="row">
              <div class="form-group col-md-1">
                <input type="text" name="dialing_code3"  class="form-control" id="dialing_code3" placeholder="" required>
              </div>
              <div class="form-group col-md-10 mt-3 mt-md-0">
                <input type="text" class="form-control" name="managers_line" id="managers_line" placeholder="Managers/handlers Line" required> 
              </div>
            </div>
              
            
			<br> 
        <div class="section-header">
	
          <h2>Your Pricing</h2>
          
        </div>
		<p style="color:red"> NOTE: STARSAYS will pay you 75% of the price you will indicate here, All amounts in USD($)</p>
		<?php 
				 $sql = "SELECT `say_category_id`, `say_description`, `session`, `active` FROM `starsay_cat`";
 $stmt = $conn2->prepare($sql);

$stmt->execute();

while ($row = $stmt->fetch()) {
    $say_description= $row['say_description'];
	$say_category_id= $row['say_category_id'];
?>


						  
			<div class="row">
             
              <div class="form-group form-group col-md-12">
                <input type="number" class="form-control" name="price_<?php echo $say_category_id; ?>" id="<?php echo $say_category_id; ?>" placeholder="Your Price for a <?php echo $say_description; ?> Video here" required> <span id="mobile_response"></span>
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
                 <input class="form-check-input" type="checkbox" value="<?php echo $row['category_id'] ?>" name="talents[]" id="flexCheckDefault">
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
				 $sql = "SELECT `id`, `Name` FROM `socials_id`";
 $stmt = $conn2->prepare($sql);

$stmt->execute();

while ($row = $stmt->fetch()) {
    
?>

      <div class="row">
              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="<?php echo $row['Name'];?>_link" id="<?php echo $row['Name'];?>_n" placeholder="<?php echo $row['Name'];?> Link" value="" >
              </div>
              <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="text" class="form-control" name="<?php echo $row['Name'];?>_followers" id="<?php echo $row['Name'];?>_f" placeholder="<?php echo $row['Name'];?> Followers" required >
              </div>
            </div>
			<br>
			
<?php }?>
			
            <div id="form_valid_message" class="my-3">
                
            </div>
               <input class="form-check-input" type="checkbox" value="tnc" name="TandC" id="flexCheckDefault" required>
              <span> I have Read and understood the <a href="Temrs_Conditions.php" style="color:blue">terms and conditions</a></span>
            <div class="text-center"><button class="buy-tickets" name="registerStar" type="submit">Submit</button></div>
          </form>
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
   <script src="assets/js/slim.kickstart.min.js"></script> 

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
 

</body>

</html>