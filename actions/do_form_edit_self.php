 
 
 	<?php include '../includes/Dbconnect.php';
	$dbuser=$_POST['user_id'];
										 $query="SELECT * FROM `customer` INNER JOIN `users_tbl` on `users_tbl`.`user_id`=`customer`.`user_id` WHERE `users_tbl`.`user_id`=:dbuser";
											//SELECT `customer_id`, `first_name`, `mid_name`, `last_name`, `user_id`, `gender`, `dob`, `city`, `contact_no`, `country`, `picture`, `date_created` FROM `customer` WHERE 1
											$stmt = $conn2->prepare($query);
											$stmt->bindParam(":dbuser",$dbuser);
											$stmt->execute();
											while($row = $stmt->fetch()){ ?>
	
 <div class="section-header">
	
          <h2>Edit Details</h2>
          
        </div>

      
        <div class="form">
          <form action="" method="POST" onsubmit="return checkeditvalid()" role="form" >
		  
             <div class="row">
			 <div class="form-group mt-3">
              <input type="text" class="form-control" name="LastName" id="subject" placeholder="Last Name Here" value="<?php echo $row['last_name'];?>" required>
            </div>
            
			</div>
			<br>
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $row['first_name'];?>" placeholder="Your FirstName" required>
              </div>
              <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="text" class="form-control" name="middlename" id="middlename" value="<?php echo $row['mid_name'];?>" placeholder="Your Middle Name" >
              </div>
            </div>
            
			<div class="form-group mt-3">
             
				<select name="gender" class="form-control" onchange="getCountry_code()" id="country_id">
				<option value="<?php echo $row['gender'];?>"><?php if($row['gender']){echo $row['gender'];} else { echo "--Select Gender--"; }?></option>
				           
					  <option value="Male>">Male</option>
					   <option value="FeMale">FeMale</option>
					  
					 
					</select>
            </div>
		<br>
			<div class="row">
			 &nbsp;&nbsp;&nbsp;Date of Birth
			 <?php $date = DateTime::createFromFormat("Y-m-d",$row['dob']);
 $day=$date->format("d");
$month_f=$date->format("F");
$month_n=$date->format("m");
$year=$date->format("Y");
 ?>
              <div class="form-group col-md-1">
               <select name="dob_day" class="form-control" id="country_id">
				<option value="<?php echo $day;?>"><?php if($day){echo $day;} else { echo "Day"; }?></option>
				           
					  <option value="01">01</option>
					    <option value="02">02</option>
					  <option value="03">03</option>
					    <option value="04">04</option>
					  <option value="05">05</option>
					    <option value="06">06</option>
					  <option value="07">07</option>
					    <option value="08">08</option>
						  <option value="09">09</option>
					    <option value="10">10</option>
					  <option value="11">11</option>
					    <option value="12">12</option>
					  <option value="13">13</option>
					    <option value="14">14</option>
					  <option value="15">15</option>
					    <option value="16">16</option>
						 <option value="17">17</option>
					    <option value="18">18</option>
					  <option value="19">19</option>
					  <option value="20">20</option>
					    <option value="21">21</option>
					  <option value="22">22</option>
					    <option value="23">23</option>
					  <option value="24">24</option>
					    <option value="25">25</option>
						  <option value="26">26</option>
					    <option value="27">27</option>
					  <option value="28">28</option>
					    <option value="29">29</option>
					  <option value="30">30</option>
					    <option value="31">31</option>
					 
						
					</select>
              </div>
              <div class="form-group col-md-3">
                <select name="dob_month" class="form-control" onchange="getCountry_code()" id="country_id">
				<option value="<?php echo $month_n;?>"><?php if($month_f){echo $month_f;} else { echo "Month"; }?></option>
				           
					  <option value="01">January</option>
					   <option value="02">February</option>
					  <option value="03">March</option>
					   <option value="04">April</option>
					   <option value="05">May</option>
					   <option value="06">June</option>
					   <option value="07">July</option>
					   <option value="08">August</option>
					   <option value="09">September</option>
					   <option value="10">October</option>
					   <option value="11">November</option>
					   <option value="12">December</option>
					 
					</select>
              </div>
			<div class="form-group col-md-2">
                <select name="dob_yr" class="form-control" onchange="getCountry_code()" id="country_id">
				<option value="<?php echo $year; ?>"><?php if($year){echo $year;} else { echo "Year"; }?></option>
				           
					 <?php  $sql = "SELECT * FROM `years`";
 $stmt = $conn2->prepare($sql);

$stmt->execute();

while ($row1 = $stmt->fetch()) {
    $year= $row1['year'];
	
?>


					  <option value="<?php echo $year ?>"><?php echo $year; ?></option>
					  
		<?php } ?>
					  
					 
					</select>
              </div>
            </div>
			<br>
			<div class="form-group col-md-9">
                <select name="country" class="form-control" onchange="getCountry_code()" id="country_id">
				<option value="<?php echo $row['country'];?>"><?php if($row['country']){echo $row['country'];} else { echo "--Select Country--"; }?></option>
				           
					 <?php  $sql = "SELECT `Id`, `Country`, `country_code`, `dialing_code` FROM `countrie_codes`";
 $stmt = $conn2->prepare($sql);

$stmt->execute();

while ($row1 = $stmt->fetch()) {
    $Country= $row1['Country'];
	
?>


					  <option value="<?php echo $Country ?>"><?php echo $Country; ?></option>
					  
		<?php } ?>
					  
					 
					</select>
              </div>
			
			<div class="form-group mt-3">
             
                <input type="text" name="city" class="form-control" id="city" placeholder="City" value="<?php echo $row['city']; ?>"required>
             
              
            </div>
			
            <div id="form_valid_message" class="my-3">
            
            </div>
            <div class="text-center"><button class="buy-tickets" type="submit" name="submit_self_edit">Submit</button></div>
          </form>
        </div>
											<?php }?>