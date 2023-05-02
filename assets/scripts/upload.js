$('#upload').on('click', function() {
    var file_data = $('#video_file').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
	
	
	console.log(file_data.size-10485760) ;

    if(file_data.size > 10485760) { // 10 MB (this size is in bytes)
        document.getElementById("request_respnse").innerHTML='<div class="alert alert-danger"> The Video is large than 10MB Please upload smaller file</div>';       
    }else{
		
		document.getElementById("request_respnse").innerHTML='Uploading...';
     form_data.append('request_id', document.getElementById("request_id").value);
form_data.append('comment', document.getElementById("comment_id").value); 	 
    $.ajax({
        url: 'actions/do_file_upload.php', // <-- point to server-side PHP script 
        dataType: 'text',  // <-- what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){
			
			if(php_script_response.trim()=='success'){
            document.getElementById("request_respnse").innerHTML='<div class="alert alert-success"> The Video has been succefully Uploaded</div>';
			
			
        }else{
			
			document.getElementById("request_respnse").innerHTML=php_script_response;
		}
		
		}
     });
	 
	}
});


function putname(request_id){
	
	
	document.getElementById("request_id").value=request_id;
}