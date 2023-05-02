<?php
//include 'includes/sessions.php';
$cat_id=$_POST['cat_id'];
$celeb_id=$_POST['celeb_id'];
$total_amount=0;
include '../includes/Dbconnect.php';
	
 $sql = "SELECT `price_id`, `star_id`, `say_category`, `price`, `last_updated` FROM `say_pricing` WHERE `star_id`=:celeb_id AND `say_category`=:cat_id";
 $stmt = $conn2->prepare($sql);
  $stmt->bindParam("cat_id",$cat_id);
  $stmt->bindParam("celeb_id",$celeb_id);
$stmt->execute();

while ($row = $stmt->fetch()) {
    $total_amount= $row['price'];
}




if($cat_id==1){ 
//Birthday 
?>

<form action="" method="POST" onsubmit="true" role="form" >
             <div class="row">
			 <div class="form-group mt-3">
			 <input type="hidden" class="form-control" name="category_id"  value="<?php echo $cat_id; ?>">
			 <input type="hidden" class="form-control" name="celeb_id"  value="<?php echo $celeb_id; ?>">
			 <input type="hidden" class="form-control" name="totalamount"  value="<?php echo $total_amount; ?>">
              <input type="text" class="form-control" name="NameFrom"  placeholder="Person requesting video"   required>
            </div>
            
			</div>
			<br>
            <div class="row">
              <div class="form-group mt-3">
               <input type="text" class="form-control" name="NameTo"  placeholder="To: Persons name" required>
              </div>
			   </div>
			   <br>
			    <div class="row">
				 <div class="form-group col-md-3">
              Date Required
              </div>
              <div class="form-group col-md-9 mt-md-0">
                <input type="date" class="form-control" name="date_required"  placeholder="Birthdate - YYYY/MM/DD e.g 01/08/1982" >
              </div>
            </div>
           <div class="form-group mt-3">
              <textarea type="text" class="form-control" rows="7ss" name="purpose"   placeholder="instructions to the  celebrity" required></textarea>
            </div>
		
			<br>
			<div class="row">
              <div class="form-group mt-3">
               
              <textarea type="text" class="form-control" rows="7ss" name="extra"  id="extra" placeholder="Any extra Information to the celebrity" required></textarea>
            
              </div>
             
            </div>
			<br>
			
			
			<div class="form-group mt-3">
              <input type="text" class="form-control" name="language" id="language"  placeholder="Prefered Language" required><span id="checkbothpass"></span>
            </div>
            
			
            <div id="form_valid_message" class="my-3">
            
            </div>
			<?php echo "<h4>Price is ZMW <style='color:green'>".$total_amount."<h4>"; ?>
            <div class="text-center"><button class="buy-tickets"  name="request_submit" type="submit">Submit and proceed  to payment ></button></button></div>
			</form>
			
			<?php
} elseif($cat_id==2){
//Reprimand/roast
?>
<form action="" method="POST" onsubmit="true" role="form" >
             <div class="row">
			 <div class="form-group mt-3">
			 <input type="hidden" class="form-control" name="category_id"  value="<?php echo $cat_id; ?>">
			 <input type="hidden" class="form-control" name="celeb_id"  value="<?php echo $celeb_id; ?>">
			 <input type="hidden" class="form-control" name="totalamount"  value="<?php echo $total_amount; ?>">
              <input type="text" class="form-control" name="NameFrom"  placeholder="Person requesting video"   required>
            </div>
            
			</div>
			<br>
            <div class="row">
              <div class="form-group mt-3">
               <input type="text" class="form-control" name="NameTo"  placeholder="To: Persons name" required>
              </div>
			   </div>
			   <br>
			    <div class="row">
				 <div class="form-group col-md-3">
              Date Required
              </div>
              <div class="form-group col-md-9 mt-md-0">
                <input type="date" class="form-control" name="date_required"  placeholder="Birthdate - YYYY/MM/DD e.g 01/08/1982" >
              </div>
            </div>
           <div class="form-group mt-3">
              <textarea type="text" class="form-control" rows="7ss" name="purpose"   placeholder="instructions to the  celebrity" required></textarea>
            </div>
		
			<br>
			<div class="row">
              <div class="form-group mt-3">
               
              <textarea type="text" class="form-control" rows="7ss" name="extra"  id="extra" placeholder="Any extra Information to the celebrity" required></textarea>
            
              </div>
             
            </div>
			<br>
			
			
			<div class="form-group mt-3">
              <input type="text" class="form-control" name="language" id="language"  placeholder="Prefered Language" required><span id="checkbothpass"></span>
            </div>
            
			
            <div id="form_valid_message" class="my-3">
            
            </div>
			<?php echo "<h4>Price is ZMW <style='color:green'>".$total_amount."<h4>"; ?>
            <div class="text-center"><button class="buy-tickets"  name="request_submit" type="submit">Submit and proceed  to payment ></button></button></div>
			</form>
<?php

} elseif($cat_id==4){

//Other(Anniversary, Mothers days, Fathers day, Graduations, Best wishes etc)
?>
<form action="" method="POST" onsubmit="true" role="form" >
             <div class="row">
			 <div class="form-group mt-3">
			 <input type="hidden" class="form-control" name="category_id"  value="<?php echo $cat_id; ?>">
			 <input type="hidden" class="form-control" name="celeb_id"  value="<?php echo $celeb_id; ?>">
			 <input type="hidden" class="form-control" name="totalamount"  value="<?php echo $total_amount; ?>">
              <input type="text" class="form-control" name="NameFrom"  placeholder="Person requesting video"   required>
            </div>
            
			</div>
			<br>
            <div class="row">
              <div class="form-group mt-3">
               <input type="text" class="form-control" name="NameTo"  placeholder="To: Persons name" required>
              </div>
			   </div>
			   <br>
			    <div class="row">
				 <div class="form-group col-md-3">
              Date Required
              </div>
              <div class="form-group col-md-9 mt-md-0">
                <input type="date" class="form-control" name="date_required"  placeholder="Birthdate - YYYY/MM/DD e.g 01/08/1982" >
              </div>
            </div>
           <div class="form-group mt-3">
              <textarea type="text" class="form-control" rows="7ss" name="purpose"   placeholder="instructions to the  celebrity" required></textarea>
            </div>
		
			<br>
			<div class="row">
              <div class="form-group mt-3">
               
              <textarea type="text" class="form-control" rows="7ss" name="extra"  id="extra" placeholder="Any extra Information to the celebrity" required></textarea>
            
              </div>
             
            </div>
			<br>
			
			
			<div class="form-group mt-3">
              <input type="text" class="form-control" name="language" id="language"  placeholder="Prefered Language" required><span id="checkbothpass"></span>
            </div>
            
			
            <div id="form_valid_message" class="my-3">
            
            </div>
			<?php echo "<h4>Price is ZMW <style='color:green'>".$total_amount."<h4>"; ?>
            <div class="text-center"><button class="buy-tickets"  name="request_submit" type="submit">Submit and proceed  to payment ></button></button></div>
			</form>

<?php

} elseif($cat_id==8){

//Business
?>
<form action="" method="POST" onsubmit="true" role="form" >
             <div class="row">
			 <div class="form-group mt-3">
			 <input type="hidden" class="form-control" name="category_id"  value="<?php echo $cat_id; ?>">
			 <input type="hidden" class="form-control" name="celeb_id"  value="<?php echo $celeb_id; ?>">
			 <input type="hidden" class="form-control" name="totalamount"  value="<?php echo $total_amount; ?>">
              <input type="text" class="form-control" name="NameFrom"  placeholder="Person requesting video"   required>
            </div>
            
			</div>
			<br>
            <div class="row">
              <div class="form-group mt-3">
               <input type="text" class="form-control" name="NameTo"  placeholder="To: Persons name" required>
              </div>
			   </div>
			   <br>
			    <div class="row">
				 <div class="form-group col-md-3">
              Date Required
              </div>
              <div class="form-group col-md-9 mt-md-0">
                <input type="date" class="form-control" name="date_required"  placeholder="Birthdate - YYYY/MM/DD e.g 01/08/1982" >
              </div>
            </div>
           <div class="form-group mt-3">
              <textarea type="text" class="form-control" rows="7ss" name="purpose"   placeholder="instructions to the  celebrity" required></textarea>
            </div>
		
			<br>
			<div class="row">
              <div class="form-group mt-3">
               
              <textarea type="text" class="form-control" rows="7ss" name="extra"  id="extra" placeholder="Any extra Information to the celebrity" required></textarea>
            
              </div>
             
            </div>
			<br>
			
			
			<div class="form-group mt-3">
              <input type="text" class="form-control" name="language" id="language"  placeholder="Prefered Language" required><span id="checkbothpass"></span>
            </div>
            
			
            <div id="form_valid_message" class="my-3">
            
            </div>
			<?php echo "<h4>Price is ZMW <style='color:green'>".$total_amount."<h4>"; ?>
            <div class="text-center"><button class="buy-tickets"  name="request_submit" type="submit">Submit and proceed  to payment ></button></button></div>
			</form>
<?php

} elseif($cat_id==5){


?>
<form action="" method="POST" onsubmit="true" role="form" >
             <div class="row">
			 <div class="form-group mt-3">
			 <input type="hidden" class="form-control" name="category_id"  value="<?php echo $cat_id; ?>">
			 <input type="hidden" class="form-control" name="celeb_id"  value="<?php echo $celeb_id; ?>">
			 <input type="hidden" class="form-control" name="totalamount"  value="<?php echo $total_amount; ?>">
              <input type="text" class="form-control" name="NameFrom"  placeholder="Person requesting video"   required>
            </div>
            
			</div>
			<br>
            <div class="row">
              <div class="form-group mt-3">
               <input type="text" class="form-control" name="NameTo"  placeholder="To: Persons name" required>
              </div>
			   </div>
			   <br>
			    <div class="row">
				 <div class="form-group col-md-3">
              Date Required
              </div>
              <div class="form-group col-md-9 mt-md-0">
                <input type="date" class="form-control" name="date_required"  placeholder="Birthdate - YYYY/MM/DD e.g 01/08/1982" >
              </div>
            </div>
           <div class="form-group mt-3">
              <textarea type="text" class="form-control" rows="7ss" name="purpose"   placeholder="instructions to the  celebrity" required></textarea>
            </div>
		
			<br>
			<div class="row">
              <div class="form-group mt-3">
               
              <textarea type="text" class="form-control" rows="7ss" name="extra"  id="extra" placeholder="Any extra Information to the celebrity" required></textarea>
            
              </div>
             
            </div>
			<br>
			
			
			<div class="form-group mt-3">
              <input type="text" class="form-control" name="language" id="language"  placeholder="Prefered Language" required><span id="checkbothpass"></span>
            </div>
            
			
            <div id="form_valid_message" class="my-3">
            
            </div>
			<?php echo "<h4>Price is ZMW <style='color:green'>".$total_amount."<h4>"; ?>
            <div class="text-center"><button class="buy-tickets"  name="request_submit" type="submit">Submit and proceed  to payment ></button></button></div>
			</form>
<?php	
}

elseif($cat_id==6){


?>
<form action="" method="POST" onsubmit="true" role="form" >
             <div class="row">
			 <div class="form-group mt-3">
			 <input type="hidden" class="form-control" name="category_id"  value="<?php echo $cat_id; ?>">
			 <input type="hidden" class="form-control" name="celeb_id"  value="<?php echo $celeb_id; ?>">
			 <input type="hidden" class="form-control" name="totalamount"  value="<?php echo $total_amount; ?>">
              <input type="text" class="form-control" name="NameFrom"  placeholder="Person requesting video"   required>
            </div>
            
			</div>
			<br>
            <div class="row">
              <div class="form-group mt-3">
               <input type="text" class="form-control" name="NameTo"  placeholder="Business Name" required>
              </div>
			   </div>
			   <br>
			    <div class="row">
				 <div class="form-group col-md-3">
              Date Required
              </div>
              <div class="form-group col-md-9 mt-md-0">
                <input type="date" class="form-control" name="date_required"  placeholder="Birthdate - YYYY/MM/DD e.g 01/08/1982" >
              </div>
            </div>
           <div class="form-group mt-3">
              <textarea type="text" class="form-control" rows="7ss" name="purpose"   placeholder="instructions to the  celebrity" required></textarea>
            </div>
		
			<br>
			<div class="row">
              <div class="form-group mt-3">
               
              <textarea type="text" class="form-control" rows="7ss" name="extra"  id="extra" placeholder="Information about the business and products" required></textarea>
            
              </div>
             
            </div>
			<br>
			
			
			<div class="form-group mt-3">
              <input type="text" class="form-control" name="language" id="language"  placeholder="Prefered Language" required><span id="checkbothpass"></span>
            </div>
            
			
            <div id="form_valid_message" class="my-3">
            
            </div>
			<?php echo "<h4>Price is ZMW <style='color:green'>".$total_amount."<h4>"; ?>
            <div class="text-center"><button class="buy-tickets"  name="request_submit" type="submit">Submit and proceed  to payment ></button></button></div>
			</form>
<?php	
}


?>


