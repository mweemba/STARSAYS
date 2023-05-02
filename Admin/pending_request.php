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
              <h3 class="mb-0"> StarSay Requests.</span>
              </h3>
              
            </div>
              <div class="row">
              <div class="col-xl-8 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body px-0 overflow-auto">
        
                    <div class="table-responsive">
					
					
<?php 
include 'modal.php';	
if(isset($_POST['post_change_status'])){
	
$model_request_id= $_POST['model_request_id'];
  $model_action_to_take= $_POST['model_action_to_take'];
  $comment= $_POST['comment'];
 $todaysdate=date("Y/m/d");
$SQL4 ="UPDATE `request` SET `acceptedBy_admin`=:comment ,`date_modified`=:todaysdate ,`status_code`=:model_action_to_take WHERE `reques_id`=:model_request_id";
  
 
  $stmt = $conn2->prepare($SQL4);
  $stmt->bindParam("model_request_id",$model_request_id);
  $stmt->bindParam("model_action_to_take",$model_action_to_take);
  $stmt->bindParam("comment",$comment);
  $stmt->bindParam("todaysdate",$todaysdate);
  
  
 


if ($stmt->execute()){
  

 echo '<div class="alert alert-success"> The Request has been edited successfully !</div>';
    		
}else {


			
			 echo '<div class="alert alert-warning"> There was an aerror in editing the request!</div>';
			
			
		
//}

	
	}
	}
	
	
		
		if(isset($_POST['SearchButton'])){
		$select = 'SELECT * ,custo.first_name as cust_first,custo.last_name as cust_last,cusStar.first_name as starFirst, cusStar.last_name as starlast,cusStar.mid_name as starmid  ';
  $from = ' FROM `request` INNER JOIN `customer` as custo ON `request`.`user_id`=custo.`user_id` 
  INNER JOIN `star_details` ON `request`.`celeb_id`=`star_details`.`star_id`  INNER JOIN `customer` as cusStar on `star_details`.`user_id`=cusStar.`user_id` ';
  $where = 'WHERE TRUE';
  
  
  //getting variables
  $Having='';

  $category= $_POST['category'];
 $status= $_POST['status'];
  $for_celebrity= $_POST['for_celebrity'];
  $for_user= $_POST['for_user'];
  $date_from= $_POST['date_from'];
 $date_to =$_POST['date_to'];
//checking which variable  have been entered in the search
  if (!empty($for_celebrity)){
    $where .= " AND cusStar.first_name LIKe '%$for_celebrity%' OR cusStar.last_name  LIKe '%$for_celebrity%' OR cusStar.mid_name LIKe '%$for_celebrity%' OR `stage_aka` LIKe '%$for_celebrity%'";
  }
  
  if (!empty($for_user)){
    $where .= " AND custo.`first_name` LIKe '%$for_user%' OR custo.`last_name` LIKe '%$for_user%' OR custo.`mid_name` LIKe '%$for_user%'";
  }
  if (!empty($date_from)){
     $where .= " AND `request`.`date_made` >='$date_from'";
  }
  if (!empty($date_to) )
    $where .= " AND  `request`.`date_made` <='$date_to'";
  }
   if (!empty($category)){
    $where .= " AND `request`.`category_id``='$category'";
  }
  
   if (!empty($status)){
    $where .= " AND `request`.`status_code`='$status'";
  }
 
  

$sql = $select . $from . $where;

		
		$stmt = $conn2->prepare($sql);
		$stmt->execute();
		
		$count = $stmt->rowCount();
				If($count<1){
					echo '<div class="alert alert-warning"> There Are No Results for the Search!</div>';
					
				} else{ ?>
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

	
	//$stmt->bindParam("category",$category);

											
	$stmt->execute();
	while($row = $stmt->fetch()){   ?>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img src="<?php  if(!$row['picture']){ echo '../assets/img/Stars/user.png'; } else{ echo '../assets/img/'.$row['picture']; };?>" alt="image" />
                                <div class="table-user-name ml-3">
                                  <p class="mb-0 font-weight-medium"> Request By <?php echo $row['cust_first']; ?>  <?php echo  $row['cust_last']; ?> For  AKA <?php echo $row['stage_aka']; ?></p>
                                  
                                </div>
                              </div>
                            </td>
                            <td><?php echo $row['date_created']; ?> </td>
                            <td>
                              <?php if($row['approved']=='W'){ echo '<div class="badge badge-inverse-warning">Pending Aproval By Admin';} elseif($row['approved']=='N'){ echo '<div class="badge badge-inverse-danger">Not approved by admin';}
							  elseif($row['approved']=='Y'){ echo '<div class="badge badge-inverse-success">Yes';}?> </div>
                            </td>
                            <td> <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuOutlineButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                        
                          <a class="dropdown-item" href="request_view.php?request_id=<?php echo $row['reques_id']?>">View Details</a>
						    <div class="dropdown-divider"></div>
							<a class="dropdown-item" href="request_view.php?request_id=<?php echo $row['reques_id']?>">View Video</a>
						    <div class="dropdown-divider"></div>
                          <a class="dropdown-item" data-toggle="modal" data-target="#myModal" onclick="model_action(<?php echo $row['reques_id']?>,16)">Revert to user</a>
						   <div class="dropdown-divider"></div>
                          <a class="dropdown-item" data-toggle="modal" data-target="#myModal" onclick="model_action(<?php echo $row['reques_id']?>,13)">Approve for upload</a>
                           <div class="dropdown-divider"></div>
						  
                          <a class="dropdown-item" data-toggle="modal" data-target="#myModal"onclick="model_action(<?php echo $row['reques_id']?>,18)">Approve uploaded</a>
                           
						    <div class="dropdown-divider"></div>
                          <a class="dropdown-item" data-toggle="modal" data-target="#myModal" onclick="model_action(<?php echo $row['reques_id']?>,17)">Revert to Celebrity </a>
                        </div>
						
                      </div>
					  </td>
                          </tr>
						  
	<?php } ?>
	
                      </tbody>
                      </table>
					  <?php } ?>
					  
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
                    <div class="card-title font-weight-medium"> Search Requests </div>
                   
                 <form class="forms-sample" method="POST" action="" >
                      <div class="form-group">
                        <label for="exampleInputName1">For Celebrity</label>
                        <input type="text" class="form-control" name="for_celebrity" placeholder="Enter User first name ,middle name or last name" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">From User</label>
                        <input type="text" class="form-control" name="for_user" placeholder="Enter User first name ,middle name or last name" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Date From</label>
                        <input type="date" class="form-control" name="date_from" placeholder="date from" />
                      </div>
					  <div class="form-group">
                        <label for="exampleInputPassword4">Date to </label>
                        <input type="date" class="form-control" name="date_to"  placeholder="Password" />
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Status</label>
                        <select class="form-control" name="status" >
						<option value="">--Select Status--</option>
							<?php					
$dataSQL="
SELECT `statsu_code`, `description`, `date_updated` FROM `req_status_codes`";
	$stmt = $conn2->prepare($dataSQL);
	//$stmt->bindParam("category",$category);

											
	$stmt->execute();
	while($row = $stmt->fetch()){   ?>
						<option value="<?php echo $row['statsu_code']; ?>"><?php echo $row['description']; ?></option>
	<?php }?>
                        </select>
                      </div>
                    
                     <div class="form-group">
                        <label for="exampleSelectGender">Category</label>
                        <select class="form-control" name="category" >
						<option value="">--Select Category--</option>
                       <?php					
					$dataSQL="
					SELECT `say_category_id`, `say_description`, `session`, `active` FROM `starsay_cat`";
						$stmt = $conn2->prepare($dataSQL);
						//$stmt->bindParam("category",$category);

																
						$stmt->execute();
						while($row = $stmt->fetch()){   ?>
						<option value="<?php echo $row['say_category_id']; ?>"><?php echo $row['say_description']; ?></option>
	               <?php }?>
                        </select>
                      </div>
                      
                      <button type="submit" name="SearchButton" class="btn btn-primary mr-2"> Search </button>
                     
                    </form>
              
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
    <!-- plugins:js --<script src="assets/vendors/js/vendor.bundle.base.js"></script>
	C
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
	<script >
	function model_action(request_id,actiontotake){
		document.getElementById("model_action_to_take").value =actiontotake;
		document.getElementById("model_request_id").value =request_id;
	}
	
	</script>
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
	 <script src="assets/vendors/js/vendor.bundle.base.js"></script>
   <script src="assets/js/General.js"></script>
  
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
	
	
    <!-- End custom js for this page -->
  </body>
</html>