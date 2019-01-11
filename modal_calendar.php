

          <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="form-horizontal" method="POST" action="editEventTitle.php">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Event</h4>
        </div>
        <div class="modal-body">
        
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Event Name</label>
          <div class="col-sm-10">
            <input type="text" name="title" readonly class="form-control" id="title" placeholder="Title">
          </div>
          </div>
               <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Address</label>
          <div class="col-sm-10">
            <input type="text" name="title" readonly class="form-control" id="address" placeholder="Title">
          </div>
          </div>

          
          <input type="hidden" name="id" class="form-control" id="id">
        
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
        </div>
      </form>
      </div>
      </div>
    </div>