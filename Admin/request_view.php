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
              <h3 class="page-title">Celebrity Profile</h3>
              
            </div>
            <div class="row">
               <?php 
			   $request_id=$_GET['request_id'];
			    $sql = "SELECT * FROM `request` INNER JOIN `customer` ON `customer`.`user_id`=`request`.`user_id`  INNER JOIN
				 `starsay_cat` on `request`.`category_id`=`starsay_cat`.`say_category_id` WHERE `reques_id`=:request_id";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("request_id",$request_id);
$stmt->execute();

while ($row = $stmt->fetch()) {
  
?>
                 <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                     
                    
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputName1">From :</label>
<input type="text"  class="form-control" id="request_id" name="From" value="<?php echo $row['person_from'];?>"  readonly>
                      </div>
					  
					   <div class="form-group">
                        <label for="exampleInputName1">To:</label>
                         <input type="text"  class="form-control" id="request_id" name="To" value="<?php echo $row['person_to'];?>"  readonly>
                      </div>
					   <div class="form-group">
                        <label for="exampleInputName1">Category:</label>
                         <input type="text"  class="form-control" id="request_id" name="Category" value="<?php echo $row['say_description'];?>"  readonly>
                      </div>
					   <div class="form-group">
                        <label for="exampleInputName1">Date Required:</label>
                         <input type="text"  class="form-control" id="request_id" name="Date Required" value="<?php echo $row['b_date'];?>" readonly>
                      </div>
					   <div class="form-group">
                        <label for="exampleInputName1">Prefered Language:</label>
                        <input type="text"  class="form-control" id="request_id" name="Langauage" value="<?php echo $row['prefared_lang'];?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Details of Request:</label>
                         <textarea type="text" rows="8" class="form-control" name="Details" readonly ><?php echo $row['request_purpose_instruction'];?></textarea>
                      </div>
					  
                     
					  
                      <div class="form-group">
                        <label for="exampleTextarea1">Exra Informion:</label>
                        <textarea type="text" rows="8" class="form-control" name="Extra Information" readonly><?php echo $row['extra_info'];?></textarea>
                      </div>
					  
                      <a href="pending_request.php"><button  type="button" class="btn btn-light">Back</button><a>
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