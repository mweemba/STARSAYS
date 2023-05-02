

function getCountry_code(){
	var e = document.getElementById ("country_id");
	var country_id= e.options[e.selectedIndex].value;

	$.ajax({
       type: "POST",
       url: 'actions/do_GetDialingCode.php',
	   data:"country_id="+country_id,
       success:  function(data1)
       {	  
    document.getElementById("dialing_code").value=data1;
		  
          
       }
   });

}


function get_view_request(request_id){
	

	$.ajax({
       type: "POST",
       url: 'actions/get_view_request.php',
	   data:"request_id="+request_id,
       success:  function(data1)
       {	  
    document.getElementById("viewRequest").innerHTML=data1;
		  //console.log(data1);
          
       }
   });

}

function get_edit_request(request_id){
	

	$.ajax({
       type: "POST",
       url: 'actions/get_edit_request.php',
	   data:"request_id="+request_id,
       success:  function(data1)
       {	  
    document.getElementById("editRequest").innerHTML=data1;
		  //console.log(data1);
          
       }
   });

}



function get_video_request(request_id){
	

	$.ajax({
       type: "POST",
       url: 'actions/get_video_request.php',
	   data:"request_id="+request_id,
       success:  function(data1)
       {	  
    document.getElementById("video_place").innerHTML=data1;
		  //console.log(data1);
          
       }
   });

}
function get_delete_r(request_id){
	


    document.getElementById("request_id_r").value=request_id;
		  //console.log(data1);
          
 

}

function getCountry_code_star(){
	var e = document.getElementById ("country_id");
	var country_id= e.options[e.selectedIndex].value;

	$.ajax({
       type: "POST",
       url: 'actions/do_GetDialingCode.php',
	   data:"country_id="+country_id,
       success:  function(data1)
       {	  
   // document.getElementById("dialing_code").value=data1;
		  
       // document.getElementsByName("dialing_code").value=data1;  
	   document.getElementById("dialing_code1").value=data1;
	   document.getElementById("dialing_code2").value=data1;
	   document.getElementById("dialing_code3").value=data1;
       }
   });

}

function getRequestForm(star_id){
		var e = document.getElementById ("select_type");
	var cat_id= e.options[e.selectedIndex].value;

	$.ajax({
       type: "POST",
       url: 'actions/request_form.php',
	   data:"cat_id="+cat_id+"&celeb_id="+star_id,
       success:  function(data1)
       {	  
	   console.log(data1);
    document.getElementById("form_place").innerHTML=data1;
		  
          
       }
   });

	
}