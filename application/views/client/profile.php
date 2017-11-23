<div class="spacer"></div>
<div id="startchange"></div>
<div class="page-header">
		<h1>Profile</h1>
</div>
<div class="container">
  <div class="col-md-2" style="border-right:solid 1px #ccc;">
    <a href="<?php echo base_url("index.php/orders"); ?>" class="list-group-item"> Orders</a>
    <a href="<?php echo base_url("index.php/wishlist"); ?>" class="list-group-item"> Wishlist</a>
    <a href="<?php echo base_url("index.php/profile/address"); ?>" class="list-group-item">Addresses</a>
    <a href="<?php echo base_url("index.php/profile/account_details"); ?>" class="list-group-item">Account details</a>
    <a href="<?php echo base_url("index.php/home/logout"); ?>" class="list-group-item">Logout</a>
  </div>
  <div class="col-md-9 col-md-offset-1">
      <div class="row">
        <h3><b>Account Details</b></h3>
        <?php $attributes = array("name" => "account_details");
                    echo form_open("profile/account_details", $attributes);?>
          <div class=" col-md-6">
            <label for="exampleInputName2">First Name </label>
            <input type="text" class="theme-form" id="exampleInputName2" placeholder="First Name" name="fname" value="<?php echo $fname; ?>" style="text-transform: capitalize;">
          </div>
          <div class="col-md-6">
            <label for="exampleInputEmail2">Last Name</label>
            <input type="text" class="theme-form" id="exampleInputEmail2" placeholder="Last Name" name="lname" value=" <?php echo $lname; ?>" style="text-transform: capitalize;">
          </div>
          <div class=" col-md-12">
            <label for="exampleInputEmail1">Contact</label>
            <input type="text" class="theme-form" id="exampleInputEmail1" name="contact" value=" <?php echo $contact; ?>" required>
            <br>
          </div>
        <button  type="submit" class="theme-btn col-sm-12 col-md-3 col-md-offset-9">UPDATE</button>
        <?php echo form_close(); ?>
        </div>
        <div class="row">
          <h3><b>Password Change</b></h3>
          <br>
        <?php $attributes = array("name" => "password");
                    echo form_open("profile/password", $attributes);?>
          <div class="col-md-12">
            <label for="exampleInputEmail1">New Password</label>
            <input type="Password" class="theme-form" id="exampleInputEmail1">
          
            <br></div>
          <button type="submit" class="theme-btn col-sm-12 col-md-3 col-md-offset-9" > UPDATE</button>
        <?php echo form_close(); ?>
      </div>
      </div>
  </div>
</div>
