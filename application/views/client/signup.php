<div class="spacer"></div>
<div id="startchange"></div>
<div class="page-header">
		<h1>Register</h1>
</div>
<div class="container" style="padding-top: 20px;">
	<div class="col-md-offset-4 col-md-4 ">
		<div class="card">
		<?php $attributes = array("name" => "loginform");
            echo form_open("signup/index", $attributes);?>
           <div class="form-group">
		    <label for="exampleInputEmail1">First Name</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="First Name" name="fname">
		  </div>
		   <div class="form-group">
		    <label for="exampleInputEmail1">Last Name</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Last Name" name="lname">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
		  </div>
		  <button class="theme-btn-lg col-md-12 col-xs-12"> Signup</button>
		<?php echo form_close(); ?>
		<br>
		<div style="padding-top: 40px;">
			<h5 style="text-align: center;"><a href="#">LOST YOUR PASSWORD?</a></h5>

		</div>
</div></div></div>