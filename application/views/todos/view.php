<form action="<?php echo base_url('todo'); ?>" method="post">
<table class="table">
        <thead>
          <tr>  
              <th>#</th>
              <th>Title</th>
              <th>Options</th>
          </tr> 
        </thead>
        <tbody> 
              <tr>  
                <td><?php echo $datas->id; ?></td>
                <td><?php echo $datas->title;?></td>
                <td><?php echo $datas->description;?></td>  
                        
            </tr> 
        </tbody>       
    </table>
    <div class="form-group">
              <input type="submit" value="Back" name="back" class="btn btn-success">
           </div> 
         </form>