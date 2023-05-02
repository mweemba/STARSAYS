<?php include 'includes/sessions.php';
include "actions/get_stars.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>StarSays</title>
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
  <?php include 'includes/header.php';?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1 class="mb-4 pb-0">Personalised <span>Videos</span><br>From Your <span>Favourite celebrities</span></h1>
      <p class="mb-4 pb-0">Birthdays, Special days, Advice, Business etc </p>
     <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>-->
      <a href="#about" class="about-btn scrollto">Request Now!</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-3">
            <h3>Firstly</h3>
            <p>Select a Celebrity on categories or search.</p>
          </div>
          <div class="col-lg-3">
            <h3>Then</h3>
            <p>Specify the details of your request</p>
          </div>
          <div class="col-lg-3">
            <h3>Next</h3>
            <p>Commit payment and the celebrity will deliver in no more than 7 days</p>
          </div>
		  <div class="col-lg-3">
            <h3>Lastly</h3>
            <p>an email will be sent to you with link <br>or you can view it under your account</p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Speakers Section ======= -->
	
	<?php
	
	$dataSQL="SELECT * FROM `star_categorys`";
	$stmt = $conn2->prepare($dataSQL);
											
	$stmt->execute();
	while($row = $stmt->fetch()){ ?>
    <section id="speakers">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2><?php echo $row['category_name'].'s'; ?> Category</h2>
          <p>Select a Celebrity to make an order</p>
        </div>
       
        <div class="row">
        <?php echo  get_star($row['category_id']);  ?>
		  
		  
       </div>
	   
	   
      </div>

    </section><!-- End Speakers Section -->

	<?php } ?>
   
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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>