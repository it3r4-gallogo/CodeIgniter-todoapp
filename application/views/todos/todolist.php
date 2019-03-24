<?php if ((isset($_SESSION['logged_in']))) { ?>
  <p> Welcome <?php echo $_SESSION['email'] ?></p>
  <label> Here are your todos </label>
<table class="table">
        <thead>
          <tr>  
              <th>#</th>
              <th>Title</th>
              <th>Options</th>
          </tr> 
        </thead>
        <tbody> 
           <?php foreach($todos as $todo): ;?>
            <tr>  
                <td><?php echo $todo['id']; ?></td>
                <td><?php echo $todo['title'];?></td>
                <td>
                  <a href="<?php echo base_url('edit');?>?id=<?php echo $todo['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                  <a href="<?php echo base_url('delete');?>?id=<?php echo $todo['id']; ?>"  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete # <?php echo$todo['id'] ?>?');">Delete</a>
                   <a href="<?php echo base_url('view');?>?id=<?php echo $todo['id']; ?>" class="btn btn-primary btn-sm">View Details</a>
                </td>
            </tr> 
          <?php endforeach;?>
        </tbody>  

    </table>
<?php } else {
  header('location:'.base_url());
} ?>