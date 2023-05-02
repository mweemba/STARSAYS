<?php include 'includes/sessions.php';
$star_id=$_GET['id'];
?><!DOCTYPE html>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

  <?php include 'includes/header2.php';?>
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
  <main id="main" class="main-page">

    <!-- ======= Speaker Details Sectionn ======= -->
	
	 <?php $dataSQL="SELECT * FROM `star_details` 
 INNER JOIN `customer` ON `star_details`.`user_id`=`customer`.`user_id` WHERE star_details.star_id=:star_id";
	$stmt = $conn2->prepare($dataSQL);
	$stmt->bindParam("star_id",$star_id);

			$AKA =$row['stage_aka']; 								
	$stmt->execute();
	while($row = $stmt->fetch()){ 
	$AKA= $row['stage_aka'];

	?>
    <section id="speakers-details">
      <div class="container">
        <div class="section-header">
          <h2>Celebrity Profile</h2>
          
        </div>

        <div class="row">
          <div class="col-md-6">
            <img src="assets/img/<?php echo $row['picture'];  ?>" alt="Speaker 1" class="img-fluid">
			<p><?php echo $row['stage_aka'];  ?></p>
        <button type="button" class="btn btn-outline-secondary">Follow</button>
          </div>
	
          <div class="col-md-6">
            <div class="details">
              <h2><?php echo $row['first_name'];  ?> <?php echo $row['mid_name'];  ?> <?php echo $row['last_name'];  ?> AKA <?php echo $row['stage_aka'];  ?></h2>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>

              <a href="Order_Form.php?sid=<?php echo $row['star_id'];  ?>" ><button type="button" class="btn btn-success">Request Video</button></a><br><br>
              <div class="container">
			  <?php } ?>

  <!-- Full-width images with number text -->
 <!-- Full-width images with number text -->


  <!-- Image text -->
  
  <!-- Thumbnail images -->


  <!-- Image text -->
 </div>
            </div>
			  <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center"> <?php echo $AKA;  ?>'s Prices</h5>
            
                <hr>
                <ul class="fa-ul">
				 <?php $dataSQL="SELECT * FROM `say_pricing` INNER JOIN `starsay_cat` ON `say_pricing`.`say_category`=`starsay_cat`.`say_category_id` WHERE `star_id`=:star_id";
	$stmt = $conn2->prepare($dataSQL);
	$stmt->bindParam("star_id",$star_id);

			echo $star_id;							
	$stmt->execute();
	while($row = $stmt->fetch()){ 
	

	?>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span><?php echo $row['say_description']; ?> :$<?php echo $row['price']; ?></li>
                  
	<?php } ?>
                </ul>
                <hr>
                <div class="text-center">
                  <a href="Order_Form.php?sid=<?php echo $row['star_id'];  ?>" ><button type="button" class="buy-tickets btn" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="standard-access">Request Video</button></a>
                </div>
              </div>
            </div>
          </div>
			
          </div>
		  

        </div>
      </div>

    </section>
     <section id="venue">

      

      <div class="container-fluid venue-gallery-container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/venue-gallery/1.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/venue-gallery/1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

  
        </div>
      </div>

    </section><!-- End Venue Section -->

  
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
   <script >
   let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
   
   </script>

</body>

</html>