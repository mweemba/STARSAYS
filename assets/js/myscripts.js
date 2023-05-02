$("#self_user_pass_form").on('submit',(function(e) {
	event.preventDefault();
	
	console.log(FormValidate1());
	 if(FormValidate1()==true){
	 
	var postData = $("#self_user_pass_form").serializeArray();
	
	$.ajax({
       type: 'POST',
       url: '../actions/update_password.php',
	   data: postData,
       success:  function(data)
       {
       //destroy();
	   	console.log(data);
		
	document.getElementById('self_edit_pass').innerHTML=data;
			
		
		
       }
   });
   
	 }
}));






$(document).ready(function(){
 $("#self_edit Details").on('submit',(function(e) {
	 
	 event.preventDefault();
	var postData = $("#self_user_edit_form").serializeArray();
	
	$.ajax({
       type: 'POST',
       url: '../actions/Do_self_edit_details.php',
	   data: postData,
       success:  function(data)
       {
       //destroy();
	   	console.log(data);
		
	document.getElementById('self_edit_response').innerHTML=data;
			
		
		
       }
   });

	 
	 

  
 
}));
});