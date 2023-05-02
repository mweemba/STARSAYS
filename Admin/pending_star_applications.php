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
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
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
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Pending Star Applications.</span>
              </h3>
              
            </div>
              <div class="row">
              <div class="col-xl-8 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body px-0 overflow-auto">
                   
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="bg-light">
                          <tr>
                            <th>Name</th>
                            <th>Date Time applied</th>
                            <th>Status</th>
                            <th>Options</th>
                          </tr>
                        </thead>
                        <tbody>
	<?php					
$dataSQL="
SELECT * FROM `star_details` 
INNER JOIN `customer` ON `star_details`.`user_id`=`customer`.`user_id`
 WHERE `approved`='W' OR `approved`='R'
";
	$stmt = $conn2->prepare($dataSQL);
	//$stmt->bindParam("category",$category);

											
	$stmt->execute();
	while($row = $stmt->fetch()){   ?>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img src="<?php  if(!$row['picture']){ echo '../assets/img/Stars/user.png'; } else{ echo '../assets/img/'.$row['picture']; };?>" alt="image" />
                                <div class="table-user-name ml-3">
                                  <p class="mb-0 font-weight-medium"> <?php echo $row['first_name']; ?>  <?php echo  $row['last_name']; ?> AKA <?php echo $row['stage_aka']; ?> </p>
                                  
                                </div>
                              </div>
                            </td>
                            <td><?php echo $row['date_created']; ?> </td>
                            <td>
                              <?php if($row['approved']=='W'){ echo '<div class="badge badge-inverse-warning">Pending';} elseif($row['approved']=='N'){ echo '<div class="badge badge-inverse-danger">No';}
							  elseif($row['approved']=='Y'){ echo '<div class="badge badge-inverse-success">Yes';}?> </div>
                            </td>
                            <td> <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuOutlineButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                        
                          <a class="dropdown-item" href="celebrity_profile_view.php?star_id=<?php echo $row['star_id']?>">View Details</a>
						    <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Reject</a>
						   <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Approve</a>
                           <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Revert</a>
                        </div>
                      </div></td>
                          </tr>
						  
	<?php } ?>
                      </tbody>
                      </table>
                    </div>
                    <a class="text-black mt-3 d-block pl-4" href="#">
                      <span class="font-weight-medium h6">View all order history</span>
                      <i class="mdi mdi-chevron-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title font-weight-medium"> Business Survey </div>
                    <p class="text-muted"> Lorem ipsum dolor sitadipiscing elit, sed amet do eiusmod tempor we find a new solution </p>
                    <div class="d-flex flex-wrap border-bottom py-2 border-top justify-content-between">
                      <img class="survey-img mb-lg-3" src="assets/images/dashboard/img_3.jpg" alt="" />
                      <div class="pt-2">
                        <h5 class="mb-0">Villa called Archagel</h5>
                        <p class="mb-0 text-muted">St, San Diego, CA</p>
                        <h5 class="mb-0">$600/mo</h5>
                      </div>
                    </div>
                    <div class="d-flex flex-wrap border-bottom py-2 justify-content-between">
                      <img class="survey-img mb-lg-3" src="assets/images/dashboard/img_1.jpg" alt="" />
                      <div class="pt-2">
                        <h5 class="mb-0">Luxury villa in Hermo</h5>
                        <p class="mb-0 text-muted">Glendale, CA</p>
                        <h5 class="mb-0">$900/mo</h5>
                      </div>
                    </div>
                    <div class="d-flex flex-wrap border-bottom py-2 justify-content-between">
                      <img class="survey-img mb-lg-3" src="assets/images/dashboard/img_2.jpg" alt="" />
                      <div class="pt-2">
                        <h5 class="mb-0">House on the Clarita</h5>
                        <p class="mb-0 text-muted">Business Survey</p>
                        <h5 class="mb-0">$459/mo</h5>
                      </div>
                    </div>
                    <a class="text-black mt-3 d-block font-weight-medium h6" href="#">View all <i class="mdi mdi-chevron-right"></i></a>
                  </div>
                </div>
              </div>
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
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/flot/jquery.flot.js"></script>
    <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="assets/vendors/flot/jquery.flot.pie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>