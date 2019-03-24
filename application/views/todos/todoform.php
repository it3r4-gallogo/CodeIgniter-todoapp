<form action="<?php echo base_url('savetodo'); ?>" method="post">
        <div  class="form-group">
          <label><b>Title:</b></label>
          <input type="text"  class="form-control" name="todo_title">
         </div>
          <div  class="form-group">
             <label><b>Description: </b></label>
             <textarea name="todo_description" class="form-control"></textarea>
          </div>
          <div class="form-group">
              <input type="submit" value="Save Todo" class="btn btn-success">
           </div> 
      </form>