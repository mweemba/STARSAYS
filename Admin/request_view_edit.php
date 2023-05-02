 <?php include '../includes/sessions.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Breeze Admin</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/vendors/select2/select2.min.css" />
    <link rel="stylesheet" href="assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
     
	  
	  	<?php include 'includes/sidebar.php';?>
     <div class="container-fluid page-body-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles light"></div>
            <div class="tiles dark"></div>
          </div>
        </div>
		
			<?php include 'includes/header.php';?>
      <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Form elements</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Form elements </li>
                </ol>
              </nav>
            </div>
            <div class="row">
               <?php 
			   $star_id=$_GET['star_id'];

										 $query="SELECT * FROM `star_details` 
INNER JOIN `customer` ON `star_details`.`user_id`=`customer`.`user_id` WHERE `star_id`=:star_id";
											//SELECT `customer_id`, `first_name`, `mid_name`, `last_name`, `user_id`, `gender`, `dob`, `city`, `contact_no`, `country`, `picture`, `date_created` FROM `customer` WHERE 1
											$stmt = $conn2->prepare($query);
											$stmt->bindParam("star_id",$star_id);
											$stmt->execute();
											while($row = $stmt->fetch()){ ?>
                 <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Celebrity Elements</h4>
                    
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="<?php echo $row['first_name'] ?> <?php echo $row['mid_name'] ?> <?php echo $row['last_name'] ?>" placeholder="Name" />
                      </div>
					  
					   <div class="form-group">
                        <label for="exampleInputName1">Stage Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="<?php echo $row['stage_aka'] ?> " placeholder="Name" />
                      </div>
					   <div class="form-group">
                        <label for="exampleInputName1">Address</label>
                        <input type="text" class="form-control" id="exampleInputName1"  value="<?php echo $row['address2'] ?> <?php echo $row['address3'] ?> <?php echo $row['address1'] ?>"  placeholder="Name" />
                      </div>
					   <div class="form-group">
                        <label for="exampleInputName1">Phone Numbers</label>
                        <input type="text" class="form-control" value="<?php echo $row['contact_1'] ?> <?php echo $row['business_line'] ?>" id="exampleInputName1" placeholder="Name" />
                      </div>
					   <div class="form-group">
                        <label for="exampleInputName1">Managers Contact</label>
                        <input type="text" class="form-control" value="<?php echo $row['managers_contact'] ?> " id="exampleInputName1" placeholder="Name" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" value="<?php echo $row['email'] ?>" placeholder="Email" />
                      </div>
					  
                     
					  
                      <div class="form-group">
                        <label for="exampleTextarea1">Tallents</label>
                        <textarea
                          class="form-control"
                          id="exampleTextarea1"
                          rows="8"
                        ><?php 
				 $sql = " SELECT * FROM `star_personal category`
				 INNER JOIN `star_categorys` ON `star_personal category`.`category_id`=`star_categorys`.`category_id` WHERE `star_id`=:star_id ";
 $stmt = $conn2->prepare($sql);
$stmt->bindParam("star_id",$star_id);
$stmt->execute();

while ($row = $stmt->fetch()) {
  echo $row['category_name'].',';
}
?>
				
						</textarea>
                      </div>
					  <div class="form-group">
                        <label for="exampleTextarea1">Social Media Links</label>
                        <textarea
                          class="form-control"
                          id="exampleTextarea1"
                          rows="8" readonly
                        ><?php 
				  $sql = "SELECT `start_id`, `star_id`, `mediaName`, `link`, `followers`, `last_updated` FROM `social_stats` WHERE `star_id`=:star_id";
 $stmt = $conn2->prepare($sql);
 $stmt->bindParam("star_id",$star_id);
$stmt->execute();

while ($row = $stmt->fetch()) {
    echo $say_description= $row['mediaName'].' :'.$row['link'] ;
	
?>

<?php } ?></textarea>
                      </div>
					  <div class="form-group">
                        <label for="exampleTextarea1">Prices</label>
                        <textarea
                          class="form-control"
                          id="exampleTextarea1"
                          rows="8"
                        ><?php 
				  $sql = "SELECT * FROM `starsay_cat` LEFT OUTER JOIN `say_pricing`  ON `starsay_cat`.`say_category_id`=`say_pricing`.`say_category` WHERE `star_id`=:star_id";
 $stmt = $conn2->prepare($sql);
 $stmt->bindParam("star_id",$star_id);
$stmt->execute();

while ($row = $stmt->fetch()) {
    echo $say_description= $row['say_description'].' :'.$row['price'] ;
	$say_category_id= $row['say_category_id'];
?>

<?php } ?>	
						</textarea>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
			  
											<?php } ?>
          </div>
          </div>
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/select2/select2.min.js"></script>
    <script src="assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/file-upload.js"></script>
    <script src="assets/js/typeahead.js"></script>
    <script src="assets/js/select2.js"></script>
  </body>
</html>