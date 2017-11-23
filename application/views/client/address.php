<div class="spacer"></div>
<div id="startchange"></div>
<div class="page-header">
		<h1>Address</h1>
</div>
<div class="container">
	<div class="col-md-2" style="border-right:solid 1px #ccc;">
		<a href="<?php echo base_url("index.php/orders"); ?>" class="list-group-item"> Orders</a>
        <a href="<?php echo base_url("index.php/wishlist"); ?>" class="list-group-item"> Wishlist</a>
		<a href="<?php echo base_url("index.php/profile/address"); ?>" class="list-group-item">Addresses</a>
		<a href="<?php echo base_url("index.php/profile/account_details"); ?>" class="list-group-item">Account details</a>
		<a href="<?php echo base_url("index.php/home/logout"); ?>" class="list-group-item">Logout</a>
	</div>
	<div class="col-md-9 col-md-offset-1" >

			<div class="col-md-4">
				<h4>Billing Address</h4>
			</div>	
			<div class="col-md-8">
				<h5 style="text-transform: capitalize;"><?php echo $fname;?> <?php echo $lname;?></h5>	
				<button class="theme-btn col-xs-12 col-md-8" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample"> EDIT</button>
				<br><br>
			</div>
				<div class="col-md-12 collapse" id="collapseExample1" style="padding-top: 50px;padding-bottom: 50px;">
				     <?php $attributes = array("name" => "billing");
      					echo form_open("profile/address", $attributes);?>
				      <div class=" col-md-6">
					    <label for="exampleInputName2">First Name <span style="color: red;">*</span></label>
					    <input type="text" class="theme-form" id="exampleInputName2" placeholder="" name="fname" value="<?php echo $fname;?>" required>
					  </div>
					  <div class="col-md-6">
					    <label for="exampleInputEmail2">Last Name<span style="color: red;">*</span></label>
					    <input type="text" class="theme-form" id="exampleInputEmail2" placeholder="" name="lname" 
					    value="<?php echo $lname;?>" required>
					  </div>
					  <div class=" col-md-12">
					    <label for="exampleInputEmail1";>Street address<span style="color: red;">*</span></label>
					    <input type="text" class="theme-form" id="exampleInputEmail1" placeholder="House number and street name"  name="addr" value="<?php echo $addr;?>" required>
					  </div>
					  <div class=" col-md-6">
					    <label for="exampleInputEmail1";>Country<span style="color: red;">*</span></label>
					    <input class="theme-form" id="" type="text" placeholder="INDIA" name="country" value="INDIA" readonly>
					  </div>
					  <div class=" col-md-6">
					    <label for="exampleInputEmail1";>Town / City<span style="color: red;">*</span></label>
					    <input type="text" class="theme-form" id="exampleInputEmail1" name="town" value="<?php echo $town;?>" required>
					  </div>
					  <div class=" col-md-12">
						    <label for="exampleInputEmail1">State<span style="color: red;">*</span></label>
						    <select class="form-control" name="state" >
								  <?php if(!empty($state)){?><option value="<?php echo $state;?>" selected='selected'><?php echo $state;?></option><?php }else{?><option value="">Choose State</option><?php }?></option><option value="AP" >Andhra Pradesh</option><option value="AR" >Arunachal Pradesh</option><option value="AS" >Assam</option><option value="BR" >Bihar</option><option value="CT" >Chhattisgarh</option><option value="GA" >Goa</option><option value="GJ" >Gujarat</option><option value="HR" >Haryana</option><option value="HP" >Himachal Pradesh</option><option value="JK" >Jammu and Kashmir</option><option value="JH" >Jharkhand</option><option value="KA" >Karnataka</option><option value="KL" >Kerala</option><option value="MP" >Madhya Pradesh</option><option value="MH" >Maharashtra</option><option value="MN" >Manipur</option><option value="ML" >Meghalaya</option><option value="MZ" >Mizoram</option><option value="NL" >Nagaland</option><option value="OR" >Orissa</option><option value="PB" >Punjab</option><option value="RJ" >Rajasthan</option><option value="SK" >Sikkim</option><option value="TN" >Tamil Nadu</option><option value="TS" >Telangana</option><option value="TR" >Tripura</option><option value="UK" >Uttarakhand</option><option value="UP" >Uttar Pradesh</option><option value="WB" >West Bengal</option><option value="AN" >Andaman and Nicobar Islands</option><option value="CH" >Chandigarh</option><option value="DN" >Dadra and Nagar Haveli</option><option value="DD" >Daman and Diu</option><option value="DL"  >Delhi</option><option value="LD" >Lakshadeep</option><option value="PY" >Pondicherry (Puducherry)</option>
							</select>
					  </div>
					  <div class=" col-md-12">
					    <label for="exampleInputEmail1";>Postcode / ZIP<span style="color: red;">*</span></label>
					    <input type="text" class="theme-form" id="exampleInputEmail1" name="pin" value="<?php echo $pin;?>" required>
					  </div>
					  <div class=" col-md-6">
					    <label for="exampleInputName2">Phone <span style="color: red;">*</span></label>
					    <input type="text" class="theme-form" id="exampleInputName2" placeholder="" name="mob" value="<?php echo $mob;?>" required>
					  </div>
					  <div class="col-md-6">
					    <label for="exampleInputEmail2">Email address</label>
					    <input type="email" class="theme-form" id="exampleInputEmail2" placeholder="">
					  </div>
					  <div class="col-md-12">
					      <br>
					  <button type="submit" class="theme-btn col-sm-12 col-md-3 col-md-offset-9" > UPDATE</button></div>
      				<?php echo form_close(); ?>
				</div>
			<div class="col-md-4">
				<h4>Shipping Address</h4>
			</div>	
			<div class="col-md-8">
				<h5 style="text-transform: capitalize;"><?php echo $fname1;?> <?php echo $lname1;?></h5>	
				<button class="theme-btn col-xs-12 col-md-8" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample"> EDIT</button><br><br>
			</div>
				<div class="col-md-12 collapse" id="collapseExample2" style="padding-top: 50px;padding-bottom: 50px;">
				      <?php $attributes = array("name" => "Shipping");
      					echo form_open("profile/shipping", $attributes);?>
				      <div class=" col-md-6">
					    <label for="exampleInputName2">First Name <span style="color: red;">*</span></label>
					    <input type="text" class="theme-form" id="exampleInputName2" placeholder="" name="fname1" value="<?php echo $fname1;?>" required>
					  </div>
					  <div class="col-md-6">
					    <label for="exampleInputEmail2">Last Name<span style="color: red;">*</span></label>
					    <input type="text" class="theme-form" id="exampleInputEmail2" placeholder="" name="lname1" value="<?php echo $lname1;?>" required>
					  </div>
					  <div class=" col-md-12">
					    <label for="exampleInputEmail1";>Street address<span style="color: red;">*</span></label>
					    <input type="text" class="theme-form" id="exampleInputEmail1" placeholder="House number and street name"  name="addr1" value="<?php echo $addr1;?>" required>
					  </div>
					  <div class=" col-md-12">
					    <label for="exampleInputEmail1";>Country<span style="color: red;">*</span></label>
					    <input class="theme-form" id="" type="text" placeholder="INDIA" name="country1" value="INDIA" readonly>
					  </div>
					  <div class=" col-md-12">
					    <label for="exampleInputEmail1";>Town / City<span style="color: red;">*</span></label>
					    <input type="text" class="theme-form" id="exampleInputEmail1" name="town1" value="<?php echo $town1;?>" required>
					  </div>
					  <div class=" col-md-12">
						    <label for="exampleInputEmail1">State<span style="color: red;">*</span></label>
						    <select class="form-control" name="state1" >
								  <?php if(!empty($state1)){?><option value="<?php echo $state1;?>" selected='selected'><?php echo $state1;?></option><?php }else{?><option value="">Choose State</option><?php }?><option value="AP" >Andhra Pradesh</option><option value="AR" >Arunachal Pradesh</option><option value="AS" >Assam</option><option value="BR" >Bihar</option><option value="CT" >Chhattisgarh</option><option value="GA" >Goa</option><option value="GJ" >Gujarat</option><option value="HR" >Haryana</option><option value="HP" >Himachal Pradesh</option><option value="JK" >Jammu and Kashmir</option><option value="JH" >Jharkhand</option><option value="KA" >Karnataka</option><option value="KL" >Kerala</option><option value="MP" >Madhya Pradesh</option><option value="MH" >Maharashtra</option><option value="MN" >Manipur</option><option value="ML" >Meghalaya</option><option value="MZ" >Mizoram</option><option value="NL" >Nagaland</option><option value="OR" >Orissa</option><option value="PB" >Punjab</option><option value="RJ" >Rajasthan</option><option value="SK" >Sikkim</option><option value="TN" >Tamil Nadu</option><option value="TS" >Telangana</option><option value="TR" >Tripura</option><option value="UK" >Uttarakhand</option><option value="UP" >Uttar Pradesh</option><option value="WB" >West Bengal</option><option value="AN" >Andaman and Nicobar Islands</option><option value="CH" >Chandigarh</option><option value="DN" >Dadra and Nagar Haveli</option><option value="DD" >Daman and Diu</option><option value="DL"  >Delhi</option><option value="LD" >Lakshadeep</option><option value="PY" >Pondicherry (Puducherry)</option>
							</select>
					  </div>
					  <div class=" col-md-12">
					    <label for="exampleInputEmail1";>Postcode / ZIP<span style="color: red;">*</span></label>
					    <input type="text" class="theme-form" id="exampleInputEmail1" name="pin1" value="<?php echo $pin1;?>" required>
					  </div>
					  <div class=" col-md-6">
					    <label for="exampleInputName2">Phone <span style="color: red;">*</span></label>
					    <input type="text" class="theme-form" id="exampleInputName2" placeholder="" name="mob1" value="<?php echo $mob1;?>" required>
					  </div>
					  <div class="col-md-6">
					    <label for="exampleInputEmail2">Email address</label>
					    <input type="email" class="theme-form" id="exampleInputEmail2" placeholder="">
					  </div>
					  
					  <div class="col-md-12">
					      <br>
					  <button type="submit" class="theme-btn col-sm-12 col-md-3 col-md-offset-9" > UPDATE</button></div>
      				<?php echo form_close(); ?>
				</div>
	</div>
</div>	
