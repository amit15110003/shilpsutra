<div class="spacer"></div>
<div id="startchange"></div>
<div class="page-header">
		<h1>My Dashboard</h1>
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
		<h2>Hello <?php echo $this->session->userdata('fname'); ?> <?php echo $this->session->userdata('lname'); ?></h2>
		<br>
		<h4>From your account dashboard you can view your recent orders, manage your shipping and billing addresses and edit your password and account details.</h4>
	</div>
</div>