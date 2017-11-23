<div class="spacer"></div>
<div id="startchange"></div>
<div class="page-header">
		<h1>Register</h1>
</div>
<div class="container" style="padding-top: 20px;">
	<div class="col-md-offset-4 col-md-4 ">
		<div class="card">
        <?php $attributes = array("name" => "forget");
          echo form_open("forget", $attributes);?>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
            </div>
          <button class="btn btn-primary pull-right" type="submit" name="submit">Send
          </button>
        <?php echo form_close(); ?>
      
		</div>
</div></div>