 <form action="<?php echo base_url('todo/update'); ?>" method="post">
        <div  class="form-group">
          <input type="hidden" name="id" value="<?php echo $datas->id;?>">
          <label><b>Title:</b></label>
          <input type="text"  class="form-control" name="update_title" value="<?php echo $datas->title; ?>">
         </div>
          <div  class="form-group">
             <label><b>Description: </b></label>
             <input type ="text" name="update_description" class="form-control" value="<?php echo $datas->description; ?>"></input>
          </div>
          <div class="form-group">
              <input type="submit" value="Update Todo" name="submit" class="btn btn-success">
           </div> 
          
           
      </form>
     