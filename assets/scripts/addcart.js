function cartAdd(student_id,session_id,course_id){
	// ;
    $.ajax({
       type: "POST",
       url: '../actions/do_cart.php',
       data: "student_id="+student_id+"&session_id="+session_id+"&course_id="+course_id,
       success:  function(data)
       {
          if (data.trim() == 'success') { 
			console.log(data);
			
          }
          else {
	 console.log(data.trim());
			
          }
       }
   });
	}
	
	
	
	
function do_dotal(){
	
	$.ajax({
       type: "POST",
       url: 'getTotal.php',
       success:  function(data)
       {
          if (data.trim() === 'success') { 
			document.getElementById("total").innerHTML="ZMK "+data;
			document.getElementById("cartTotal").innerHTML="ZMK"+data;
          }
          else {
		 
		  //document.getElementById("total").innerHTML="ZMK"+data;
		 
          }
       }
   });

}
function do_cartNo(){
	
	$.ajax({
       type: "POST",
       url: 'getCart_no.php',
       success:  function(data1)
       {
          if (data1.trim() === 'success') { 
		  document.getElementById("cartNumber").innerHTML=data1;}
          else {
		  document.getElementById("cartNumber").innerHTML=data1;
		 
          }
       }
   });

}
function recalculateCart(product_id,number){
	//var numberofproduct=document.getElementById(product_id).innerHTML;
	var carttyp=document.getElementById("cartype").value;
	
	$.ajax({
       type: "POST",
       url: 'recalculate.php',
	   data:"product_id="+product_id+"&number="+number+"&cartype="+carttyp,
       success:  function(data1)
       {
          if (data1.trim() === 'success') { 
			var table = document.getElementById ("summerytable");
         
		 relordTable();
		
          }
          else { 
		  
		   relordTable(carttyp);
		    product_cart_no(product_id);
		  //var table = document.getElementById ("summerytable");
		  //load("#summerytable");
         // location.reload();
		   //table.load("product_summery.php");
		   //console.log(data1);
          }
       }
   });
	
		
}
function relordTable(carttype){
	//console.log(carttype);
	$.ajax({
       type:"POST",
       url:'do_refresh_groc_table.php',
	   data:"carttype="+carttype,
       success:  function(data2)
       {
       console.log(data2);
	 
	var  data =JSON.parse(data2);
	
		 
		 document.getElementById ("num_of_items").innerHTML=data['grandtotalnumberofitems'];
		 document.getElementById ("num_of_items2").innerHTML=data['grandtotalnumberofitems'];
		 document.getElementById ("cartNumber").innerHTML=data['grandtotalnumberofitems'];
		 document.getElementById ("subtotal").innerHTML=data['subtotal'];
		 document.getElementById ("serviceCharge").innerHTML=data['servicecharg'];
		 document.getElementById ("totalTax").innerHTML=data['tax'];
		// document.getElementById ("TotalDiscount").innerHTML=data['totaldiscount'];
		 document.getElementById ("total").innerHTML=data['totalcharge'];
		//document.getElementById("GrocetablePlace").innerHTML=data2;
        if(data['totalcharge']>249){
			if(carttype=='8'){
				document.getElementById ("buttonpay").innerHTML='<a  class="button pull-right  fa fa-hand-o-right" href="#" onclick="order(8)" >Make a Payment<span class="button" aria-hidden="true"></span></a>';
			}else{
				document.getElementById ("buttonpay").innerHTML='<a  class="button pull-right  fa fa-hand-o-right" href="#" onclick="order(1)" >Make a Payment<span class="button" aria-hidden="true"></span></a>';
			}
			deliverytime(data['totalcharge']);
		}else{
			document.getElementById ("buttonpay").innerHTML='';
		deliverytime(data['totalcharge']);	
		}  
       }
   });
}
//change delievrytime on change of Total
function deliverytime(total){
	$.ajax({
       type: "POST",
       url: 'deliveryTime.php',
	   data:"total="+total,
       success:  function(data1)
       {
		 document.getElementById('deliverytime').innerHTML=data1;  
		  
       }
   });
	
}
// calculating the product totals when product quanity changes 
function product_cart_no(product_id){
	
	
	//var numberofproduct=document.getElementById(product_id).innerHTML;
		var totalID=product_id+"prodtotal";
		 
	$.ajax({
       type: "POST",
       url: 'do_product_total.php',
	   data:"prod_id="+product_id,
       success:  function(data1)
       {
		   
		  
          if (data1.trim() == 0) { 
			//remove item function here
 
		 
          }
          else { 
		   document.getElementById(totalID).innerHTML="ZMW "+data1;
		  
          }
       }
   });
	
		
}





function deliveryAdress(){
	var e = document.getElementById ("currentAddress");
	var address= e.options[e.selectedIndex].value;
	$.ajax({
       type: "POST",
       url: 'do_getAddress.php',
	   data:"currentAddress="+address,
       success:  function(data1)
       {	  
    document.getElementById("deliveryAddress").innerHTML=data1;
		  
          
       }
   });

}
//deleting a cart raw item
function removeit(data){
	//e.preventDefault();
	
	
	//console.log($(this));
  data.closest('tr').remove();
   var name=data.name; 
   console.log(data);
  removeItemfromCart(name);
   
}

/*function showsnackbar() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}*/
function removeItemfromCart(product_id){
var product=product_id;
$.ajax({
       type: "POST",
       url: 'removeCartItem.php',
       data: "product_id="+product,
       success: function(data)
       {
	   if(data=="success"){
		console.log("item Removed");
	   }else{
        do_cartNo();
		do_dotal();
		relordTable();
       }
	   }
   });
}

function SnackResponse() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
