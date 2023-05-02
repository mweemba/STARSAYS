

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
	  <form method="POST" target="">
        <div class="form-group">
                
                        <input type="text"  class="form-control" id="model_request_id" name="model_request_id" hidden  >
						 <input type="text"  class="form-control" id="model_action_to_take" name="model_action_to_take" hidden  >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Comment:</label>
                         *<textarea type="text" rows="8" class="form-control" id="comment" name="comment" required> </textarea>
                      </div>
					  
      </div>
	 
      <div class="modal-footer">
        <button type="submit"  name="post_change_status" class="btn btn-default" >Save</button><button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
      </div>
	  
	  </form>
    </div>

  </div>
</div>