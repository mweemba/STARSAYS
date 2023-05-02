<?php
include '../includes/Dbconnect.php';
$reques_id=$_POST['request_id'];
						
				 $sql = "SELECT * FROM `request` INNER JOIN `customer` ON `customer`.`user_id`=`request`.`user_id`  INNER JOIN
				 `starsay_cat` on `request`.`category_id`=`starsay_cat`.`say_category_id`  INNER JOIN  `star_details` ON `request`.`celeb_id`=`star_details`.`star_id`  WHERE `reques_id`=:reques_id";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("reques_id",$reques_id);
$stmt->execute();

while ($row = $stmt->fetch()) {
  
?>
 
          <form method="POST" action="" >
		  
			  <div class="form-group mt-3">
			    <div class="form-group mt-3">
                 Request_id: <input type="text"  class="form-control" id="request_id" name="request_id" value="<?php echo $reques_id;?>" readonly>
                </div>
				
				<div class="form-group mt-3">
                 Celebrity Stage Name: <input type="text"  class="form-control" id="request_id" name="celeb_name" value="<?php echo $row['stage_aka'];?>" readonly>
                </div>
                  From :<input type="text"  class="form-control" id="request_id" name="NameFrom" value="<?php echo $row['person_from'];?>"  >
                </div>
				<div class="form-group mt-3">
                 To: <input type="text"  class="form-control" id="request_id" name="NameTo" value="<?php echo $row['person_to'];?>"  >
                </div>
				<div class="form-group mt-3">
                  Category: <select name="category_id" class="form-control" readonly>
				  <Option value="<?php echo $row['category_id'];?>" ><?php echo $row['say_description'];?></option>
				  		  
					  
					  
		           </select>
                </div>
				<div class="form-group mt-3">
                  Date Required: <input type="date"  class="form-control" id="request_id" name="date_required" value="<?php echo $row['b_date'];?>" >
                </div>
				<div class="form-group mt-3">
					 
					
                  Prefered Language:<input type="text"  class="form-control" id="request_id" name="language" value="<?php echo $row['prefared_lang'];?>" >
                </div>
                
                <div class="form-group mt-3">
                  Details of Request: <textarea type="text" class="form-control" name="purpose" rows="5"   ><?php echo $row['request_purpose_instruction'];?></textarea>
                </div>
				 <div class="form-group mt-3">
                   Exra Informion: <textarea type="text" class="form-control" name="extra" rows="5" ><?php echo $row['extra_info'];?></textarea>
                </div>
				
				<div id="request_respnse"></div>
              
                <div class="text-center mt-3">
                  <button type="submit" id="upload" name="request_edit" class="btn buy-tickets">Save</button>
				  <button type="button" id="upload" class="btn buy-tickets">Close</button>
                </div>
              </form>  
			
			
			
<?php } ?>