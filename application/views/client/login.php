<div class="spacer"></div>
<div id="startchange"></div>
<div class="page-header">
		<h1>Login</h1>
</div>
<div class="container" style="padding-top: 20px;">
	<div class="col-md-offset-4 col-md-4 ">
		<div class="card">
		<?php $attributes = array("name" => "loginform");
            echo form_open("login/login", $attributes);?>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
		  </div>
		  <button class="theme-btn-lg col-md-12 col-xs-12"> LOGIN</button>
		<?php echo form_close(); ?>
		<br>
		<div style="padding-top: 40px;">
			<h5 style="text-align: center;"><a href="#"  style="text-decoration:none;">LOST YOUR PASSWORD?</a></h5>

		</div>
		<div class="col-md-offset-5 col-md-2" style="background-color: #000;height: 1px;"></div>
		<br>
		<h4 class=" "><b>Social Login</b></h4>
		 <a href="<?php echo $loginURL;?>" class="btn col-md-6 col-xs-12" style="background-color: #e24825;color: #fff;">Google</a>
		 <a href="<?php echo $authUrl;?>" class="btn col-md-6 col-xs-12" style="background-color: #385499;color: #fff;">Facebook</a>
		 
</div>
<br><hr>
<h4>Or Create <a href="<?php echo base_url();?>index.php/signup" style="text-decoration:none;">New Account</a></h4>
</div></div>