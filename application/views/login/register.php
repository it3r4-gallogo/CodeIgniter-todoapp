<?php 
		session_destroy();
		?>
<center>
	<h2 style="margin-top: 2%;">  Register </h2>
	<div style="margin-top: 2%; width: 40%; background-color: rgb(150, 102, 115); color: rgb(235,235,235); padding: 2% 5% 2% 5%;">
		<form action="<?php echo base_url('register_user');?>"method="post">
		  <div class="form-group">
		    <label for="fname">First Name</label>
		    <input type="text" class="form-control" placeholder="Enter First Name" name="fname">
		  </div>
		  <div class="form-group">
		    <label for="lname">Last Name</label>
		    <input type="text" class="form-control" placeholder="Enter Last Name" name="lname">
		  </div>
		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
		  </div>
		  <input type="submit" class="btn btn-primary" value="Register">
		</form>
	</div>
	<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/test.js'); ?>" ></script>
</center>
<br><br><br>
