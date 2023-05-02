<?php
include '../includes/Dbconnect.php';
$reques_id=$_POST['request_id'];
						
				 $sql = "SELECT * FROM `request` INNER JOIN `customer` ON `customer`.`user_id`=`request`.`user_id`  INNER JOIN
				 `starsay_cat` on `request`.`category_id`=`starsay_cat`.`say_category_id` WHERE `reques_id`=:reques_id";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("reques_id",$reques_id);
$stmt->execute();

while ($row = $stmt->fetch()) {
  
?>
 
          <form method="POST" action="#" onsubmit="return false">
			  <div class="form-group mt-3">
                  From :<input type="text"  class="form-control" id="request_id" name="From" value="<?php echo $row['person_from'];?>"  readonly>
                </div>
				<div class="form-group mt-3">
                 To: <input type="text"  class="form-control" id="request_id" name="To" value="<?php echo $row['person_to'];?>"  readonly>
                </div>
				<div class="form-group mt-3">
                  Category: <input type="text"  class="form-control" id="request_id" name="Category" value="<?php echo $row['say_description'];?>"  readonly>
                </div>
				<div class="form-group mt-3">
                  Date Required: <input type="text"  class="form-control" id="request_id" name="Date Required" value="<?php echo $row['b_date'];?>" readonly>
                </div>
				<div class="form-group mt-3">
                  Prefered Language:<input type="text"  class="form-control" id="request_id" name="Langauage" value="<?php echo $row['prefared_lang'];?>" readonly>
                </div>
                
                <div class="form-group mt-3">
                  Details of Request: <textarea type="text" class="form-control" name="Details" readonly ><?php echo $row['request_purpose_instruction'];?></textarea>
                </div>
				 <div class="form-group mt-3">
                   Exra Informion: <textarea type="text" class="form-control" name="Extra Information" readonly><?php echo $row['extra_info'];?></textarea>
                </div>
				
				<div id="request_respnse"></div>
              
                <div class="text-center mt-3">
                  <button type="button" id="upload" class="btn buy-tickets">Close</button>
                </div>
              </form>  
			
			
			
<?php } ?>