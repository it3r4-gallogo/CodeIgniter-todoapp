<?php 
    session_destroy();
    ?>
<form action="<?php echo base_url('login_user');?>" method="POST">
  <h1 style="text-align:center "> Log in To-do App </h1>
  <input style="margin-bottom: 10px;" type="text" name="email" placeholder="Email"><br>
  <input style="margin-bottom: 10px;" type="password" name="password" placeholder="Password"><br><br>
  <input type="submit" class="btn btn-primary" class="btn btn-primary" value="Login">
</form>
<p> Not yet registered?<a href="<?php echo base_url('users');?>"> Click here! </a> </p>
