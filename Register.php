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
		
			if($_GET['regist']=='N'){
			
			echo '<div class="alert alert-danger" role="alert">
 The rigstration could not take place due to an error, please try again
</div>';
		}
		?>
          <h2>StarSays Register</h2>
          
        </div>

      
        <div class="form">
          <form action="do_register.php" method="POST" onsubmit="return checkregistervalid()" role="form" >
             <div class="row">
			 <div class="form-group mt-3">
              <input type="text" class="form-control" name="LastName" id="subject" placeholder="Last Name Here" required>
            </div>
            
			</div>
			<br>
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Your FirstName" required>
              </div>
              <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Your Middle Name" >
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="email" class="form-control" name="email" onkeyup="checkEmailExist()" id="email" placeholder="Your Email Here" required><span id="email_response"></span>
            </div>
			<div class="form-group mt-3">
             
				<select name="country" class="form-control" onchange="getCountry_code()" id="country_id">
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
                <input type="text" name="dialing_code" readonly class="form-control" id="dialing_code" placeholder="" required>
              </div>
              <div class="form-group col-md-10 mt-3 mt-md-0">
                <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" placeholder="Mobile Number" required> <span id="mobile_response"></span>
              </div>
            </div>
			<br>
			<div class="form-group mt-3">
             
                <input type="text" name="city" class="form-control" id="city" placeholder="City" required>
             
              
            </div>
			<div class="form-group mt-3">
              <input type="password" class="form-control" name="password1" id="new_password" onkeyup="passidvalidation()" placeholder="Your Password here" required><span id="passwordValidate"></span>
            </div>
			<div class="form-group mt-3">
              <input type="password" class="form-control" name="password2" id="confirm_password" onkeyup="checkBothpasswords()" placeholder="Enter Your Passowrd again" required><span id="checkbothpass"></span>
            </div>
            
			
            <div id="form_valid_message" class="my-3">
            
            </div>
            <div class="text-center"><button class="buy-tickets" type="submit">Submit</button></div>
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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
 

</body>

</html>