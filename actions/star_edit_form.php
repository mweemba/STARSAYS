	<?php include '../includes/Dbconnect.php';
	$dbuser=$_POST['user_id'];
										 $query="SELECT * FROM `customer` INNER JOIN `users_tbl` on `users_tbl`.`user_id`=`customer`.`user_id` WHERE `users_tbl`.`user_id`=:dbuser";
											//SELECT `customer_id`, `first_name`, `mid_name`, `last_name`, `user_id`, `gender`, `dob`, `city`, `contact_no`, `country`, `picture`, `date_created` FROM `customer` WHERE 1
											$stmt = $conn2->prepare($query);
											$stmt->bindParam(":dbuser",$dbuser);
											$stmt->execute();
											while($row = $stmt->fetch()){ ?>

<form action="Star_Register.php" method="POST" onsubmit="return checkregistervalid()" role="form" >
             <div class="row">
			 <div class="control-group mt-3" style="width:300px;margin: 0 auto;">

										<label class="control-label">Picture<span class="required">*</span></label>

										<div class="controls">
                                      <div class="slim"
										 data-label="Drop your image here"
										 data-fetcher="fetch.php"
										 data-instant-edit="true" 
										 data-size="640,680"
										 data-ratio="64:68">
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
		  
<?php }?>