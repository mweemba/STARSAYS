 
$(document).ready(function() {
  $('#loginform').submit(function(e) {
  var username=document.getElementById("username").value;
 var password=document.getElementById("password").value;
    e.preventDefault();
	// ;
    $.ajax({
       type: "POST",
       url: 'actions/do_login.php',
       data: "username="+username+"&password="+password,
       success: function(data)
       {
          if (data.trim() === 'success') {
          
		   window.location = 'index.php';
			
          }else if(data.trim() === 'success2'){
			 window.location = 'Admin/index.php'; 
		  }
          else {
		  console.log(data);
			document.getElementById("LoginResponse").innerHTML="<font color='Red'>"+data+"</font>";
			
          }
       }
   });
 });
});
