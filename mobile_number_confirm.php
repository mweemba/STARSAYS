<?php include 'includes/Dbconnect.php';
include  'actions/functions.php';
error_reporting(0);?>
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
  <?php include 'includes/header2.php';
  $membership_id=$_GET['i'];
  
  ?>

  <main id="main" class="main-page">

    <!-- ======= Speaker Details Sectionn ======= -->
    <section id="contact" class="section-bg">

      <div class="container" data-aos="fade-up">

        <div class="section-header">
		
		<?php 
		
		if($_GET['mobilestatus']=='No'){
			
			echo '<div class="alert alert-danger" role="alert">
 Your Mobile Number is not confirmed. Please check the text sent to you and enter confirmation code sent
</div>';
		}
		if($_GET['mobilestatus']=='Yes'){
			
			echo '<div class="alert alert-success" role="success">
 Your Mobile number has been verified
</div>';
sleep(5);
 echo "<script>window.location = 'Login.php?mobilestatus=Yes'</script>";
		}
		
		?>
          <h2>Confirm Mobile Number</h2>
          
        </div>

        
        <div class="form">
          <form  action="do_verify_mobile.php" method="post"  id="email_confirm_form" >
		  
		  
            <div class="row">
              <div class="form-group col-md-12">
			  <input type="text" name="mobile_code" class="form-control" id="username"  required">
                <input  type="hidden" name="u" class="form-control"  value="<?php echo $membership_id;?>" required>
              </div>
              
            </div>
           
            
            <div id="LoginResponse" class="my-3">
             
            </div>
               
			
            <div class="text-center"><button class="buy-tickets" type="submit">Submit</button><br><br><a><p>resend code</p></a></div>
          </form>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
<?php include 'includes/footer.php';?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-mobile number-form/validate.js"></script>
      <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/scripts/login_confirm.js"></script>

</body>

</html>