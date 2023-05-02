  <!-- Modal Order Form -->
      <div id="reject-modal" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Reject Request</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="actions/celeb_reject_req.php">
			  <div class="form-group">
                  <input type="hidden"  class="form-control" id="request_id_r" name="request_id_r" placeholder="Your Name">
                </div>
                <div class="form-group">
                  <textarea type="text" class="form-control" name="comment_r" placeholder="Comment" required></textarea>
				  
                </div>
               
                <div class="text-center mt-3">
                  <button type="submit" name="" class="btn">Submit</button>
                </div>
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

  
	
	  <!-- Modal Order Form -->
      <div id="upload-modal" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
		  
            <div class="modal-header">
              <h4 class="modal-title">Upload Video</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="#" onsubmit="return false">
			  <div class="form-group">
                  <input type="hidden"  class="form-control" id="request_id" name="your-name" placeholder="Your Name">
                </div>
                <div class="form-group">
                  <input type="file" class="form-control" name="video_file"  id="video_file" accept="video/*" placeholder="Your Name">
                </div>
                <div class="form-group mt-3">
                   <textarea type="text" class="form-control" id="comment_id" name="comment" placeholder="Comment"></textarea>
                </div>
				
				<div id="request_respnse"></div>
              
                <div class="text-center mt-3">
                  <button type="submit" id="upload" class="btn buy-tickets">Upload</button>
                </div>
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
	  
	    <!-- Modal Order Form -->
		
		
      <div id="view-modal" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">View Request</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div  id="viewRequest" class="modal-body">
			
			
            
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
	  
	  
	     <div id="edit-modal" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Request</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div  id="editRequest" class="modal-body">
			
			
            
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

<div id="view-video" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">View Video</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div  id="video_place" class="modal-body">
			
			
            
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
