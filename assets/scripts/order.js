function order(type){
var number_of_items= document.getElementById('num_of_items').innerHTML;
var total= document.getElementById('total').innerHTML;
var address= document.getElementById('deliveryAddress').innerHTML;

if(address.trim() ==""){
	alert('Please Select A delivery Address');
}
else{
	var address= document.getElementById('addressID').innerHTML;
$.ajax({
       type: 'POST',
       url: 'do_order.php',
	   data: 'total='+total+'&items='+number_of_items+'&address='+address+"&ordertype="+type,
       success:  function(data)
       {
       //destroy();
	   console.log(data);
		window.location='invoice_final.php?dta='+data;
		
       }
   });
}
}

function changePaymentopt(opt){
	
if(opt==2){
	
	$.ajax({
       type: 'POST',
       url: 'credit_form.php',
       success:  function(data)
       {
        //console.log(data);
		//window.open('invoice_final.php?dta='+data,'_blank');
		document.getElementById("creditform").innerHTML=data;
		document.getElementById("cashform").innerHTML="";
		facility=0.15;
		facilityadd(facility);
		
       }
   });
		
}
else{
	var newform="<form><button>PayNow</button></form>";
	document.getElementById("payoption").innerHTML=newform;
	facility=0;
		facilityadd(facility);
}

}

function facilityadd(facility){
	
	var grandTotal= document.getElementById('total').innerHTML;
	var productTotal= document.getElementById('producttotal').innerHTML;
	if(facility==0){
	var currentfacility= document.getElementById('facility').innerHTML;
	var NewgrandTotal=parseFloat(grandTotal) - parseFloat(currentfacility);
	document.getElementById('facility').innerHTML=facility;
	 document.getElementById('total').innerHTML=NewgrandTotal;
	 
	}
	else{
	var faciltyfee= productTotal * facility;
	console.log(productTotal);
	var NewgrandTotal=parseFloat(grandTotal) + parseFloat(faciltyfee);
	grandTotal= document.getElementById('total').innerHTML=NewgrandTotal;
	document.getElementById('facility').innerHTML=faciltyfee;
	document.getElementById('paymentfeedback').innerHTML="<h5><font color='red'> *Note that an extra facility fee will apply for all credit purchases</h5>";
	}
	
}
function processCreditOrder(){
	var empNumber= document.getElementById('empNumber').value;
	var e = document.getElementById('employerId');
	var empopt= e.options[e.selectedIndex].value;
	var total= document.getElementById('total').innerHTML;
	var ey = document.getElementById('contyear');
	var contactYear=ey.options[ey.selectedIndex].value;
	var em = document.getElementById('contMonth');
	var contract_yr=em .options[em.selectedIndex].value;
	//var emaildata =document.documentElement.innerHTML;
	var emaildata=document.getElementById('mydata').innerHTML;;
	//console.log(emaildata);
	
	$.ajax({
       type: 'POST',
       url: 'do_credit_sales.php',
	   data: 'employeee='+empNumber+'&employer='+empopt+'&total='+total+'&emaildata='+emaildata,
       success:  function(data)
       {
		   if(data=='success'){
			  document.getElementById("creditform").innerHTML="";
			document.getElementById("creditform").innerHTML= "<br><h1><img height='30px' src='images/tick.jpg'><font color='green'>PAID</h1><h4>Method:On Credit</h4>";
			   sendemail();
		   }
		   
		   else{
			  console.log(data);
			    document.getElementById("paymentfeedback").innerHTML='<div class="alert alert-danger">'+data+"</div>";
				
		   }
        //console.log(data);
		//window.open('invoice_final.php?dta='+data,'_blank');
       }
   });
}
function sendemail(){
	
	var emaildata=document.getElementById('mydata').innerHTML;;
	//var emaildata=document.getElementById('mydata').innerHTML;;
	$.ajax({
       type: 'POST',
       url: 'do_sendEmal.php',
	   data: 'emaildata='+emaildata,
       success:  function(data)
       {
		   if(data=='success'){
			   console.log("done");
			   
		   }
		   
		   else{
			   
			console.log(data);   
				
		   }
        //console.log(data);
		//window.open('invoice_final.php?dta='+data,'_blank');
       }
   });
	
}

function sendrecieptemail(){
	
	var emaildata=document.getElementById('mydata').innerHTML;
	var email=document.getElementById('emailAddress').innerHTML;
	//var emaildata=document.getElementById('mydata').innerHTML;;
	$.ajax({
       type: 'POST',
       url: 'do_sendEmal.php',
	   data: 'emaildata='+emaildata+'emailAddress'+email,
       success:  function(data)
       {
		   if(data=='success'){
			   console.log("done");
			   
		   }
		   
		   else{
			   
			console.log(data);   
				
		   }
        //console.log(data);
		//window.open('invoice_final.php?dta='+data,'_blank');
       }
   });
	
}
