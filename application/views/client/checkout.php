<div class="spacer"></div>
<div id="startchange"></div>
<div class="page-header">
		<h1>Checkout</h1>
</div>
<script>
	window.onload = function() {
		var d = new Date().getTime();
		document.getElementById("tid").value = d;
	};
</script>
 <?php 
      if(empty($this->session->userdata('uid'))){ ?>
<div class="container"><h4>Have account <a href="">Login</a> Or Create account <a href="">Register</a></h4>
<h3>Or</h3> </div>
<?php }?>
<div class="container">
<div class="col-md-9">
<div class="col-md-12">
 <h3>Billing Details</h3>
 <?php $attributes = array("name" => "payment");
            echo form_open("payment", $attributes);?>
    <input type="hidden" name="tid" id="tid" readonly />
  <div class=" col-md-12">
    <input type="text" class="theme-form" id="exampleInputName2" placeholder="Name*" name="billing_name" value="<?php echo $fname; ?> <?php echo $lname; ?>" required>
  </div>
  <div class=" col-md-12">
    <input type="text" class="theme-form" id="exampleInputEmail1" placeholder="Address*" name="billing_address"  value="<?php echo $addr; ?>" required>
  </div>
  <div class=" col-md-6">
    <input class="theme-form" id="" type="text" name="billing_country" value="India" readonly required>
  </div>
  <div class=" col-md-6">
    <input type="text" class="theme-form" id="exampleInputEmail1" placeholder="Town / City*" name="billing_city"  value="<?php echo $town; ?>" required>
  </div>
  <div class=" col-md-6">
	    <label for="exampleInputEmail1";>State<span style="color: red;">*</span></label>
	    <select class="form-control" name="billing_state" required>
	        <?php if(!empty($state)){?><option value="<?php echo $state;?>" selected='selected'><?php echo $state;?></option><?php }else{?><option value="">Choose State</option><?php }?><option value="AP" >Andhra Pradesh</option><option value="AR" >Arunachal Pradesh</option><option value="AS" >Assam</option><option value="BR" >Bihar</option><option value="CT" >Chhattisgarh</option><option value="GA" >Goa</option><option value="GJ" >Gujarat</option><option value="HR" >Haryana</option><option value="HP" >Himachal Pradesh</option><option value="JK" >Jammu and Kashmir</option><option value="JH" >Jharkhand</option><option value="KA" >Karnataka</option><option value="KL" >Kerala</option><option value="MP" >Madhya Pradesh</option><option value="MH" >Maharashtra</option><option value="MN" >Manipur</option><option value="ML" >Meghalaya</option><option value="MZ" >Mizoram</option><option value="NL" >Nagaland</option><option value="OR" >Orissa</option><option value="PB" >Punjab</option><option value="RJ" >Rajasthan</option><option value="SK" >Sikkim</option><option value="TN" >Tamil Nadu</option><option value="TS" >Telangana</option><option value="TR" >Tripura</option><option value="UK" >Uttarakhand</option><option value="UP" >Uttar Pradesh</option><option value="WB" >West Bengal</option><option value="AN" >Andaman and Nicobar Islands</option><option value="CH" >Chandigarh</option><option value="DN" >Dadra and Nagar Haveli</option><option value="DD" >Daman and Diu</option><option value="DL" >Delhi</option><option value="LD" >Lakshadeep</option><option value="PY" >Pondicherry (Puducherry)</option>
		</select>
  </div>
  <div class=" col-md-6">
    <input type="text" class="theme-form" id="exampleInputEmail1" placeholder="Postcode / ZIP*" name="billing_zip"  value="<?php echo $pin; ?>" required>
  </div>
  <div class=" col-md-6">
    <input type="text" class="theme-form" id="exampleInputName2" placeholder="Contact Number*" name="billing_tel"  value="<?php echo $mob; ?>" required>
  </div>
  <div class="col-md-6">
    <input type="email" class="theme-form" id="exampleInputEmail2" placeholder="Email-id* " name="billing_email"  value="<?php echo $this->session->userdata('email'); ?>" required>
  </div>
  <!--<div class="col-md-6">
    <label>
      <input type="checkbox" checked>Shipping is same as billing Address. 
    </label>
  </div>-->
  <br>
  </div>
  <div class="col-md-12 Shipping">
  <h3>Shipping Details</h3>
    <div class=" col-md-12">
    <input type="text" class="theme-form" id="exampleInputName2" placeholder="Name*" name="delivery_name" value="<?php echo $fname1; ?> <?php echo $lname1; ?>" required>
  </div>
  <div class=" col-md-12">
    <input type="text" class="theme-form" id="exampleInputEmail1" placeholder="Address*" name="delivery_address" value="<?php echo $addr1; ?>">
  </div>
  <div class=" col-md-6">
    <input class="theme-form" id="" type="text" name="delivery_country" value="India" readonly required>
  </div>
  <div class=" col-md-6">
    <input type="text" class="theme-form" id="exampleInputEmail1" placeholder="Town / City*" name="delivery_city" value="<?php echo $town1; ?>" required>
  </div>
  <div class=" col-md-6">
	    <label for="exampleInputEmail1";>State<span style="color: red;">*</span></label>
	    <select class="form-control" name="delivery_state" required>
			  <?php if(!empty($state)){?><option value="<?php echo $state1;?>" selected='selected'><?php echo $state1;?></option><?php }else{?><option value="">Choose State</option><?php }?><option value="AP" >Andhra Pradesh</option><option value="AR" >Arunachal Pradesh</option><option value="AS" >Assam</option><option value="BR" >Bihar</option><option value="CT" >Chhattisgarh</option><option value="GA" >Goa</option><option value="GJ" >Gujarat</option><option value="HR" >Haryana</option><option value="HP" >Himachal Pradesh</option><option value="JK" >Jammu and Kashmir</option><option value="JH" >Jharkhand</option><option value="KA" >Karnataka</option><option value="KL" >Kerala</option><option value="MP" >Madhya Pradesh</option><option value="MH" >Maharashtra</option><option value="MN" >Manipur</option><option value="ML" >Meghalaya</option><option value="MZ" >Mizoram</option><option value="NL" >Nagaland</option><option value="OR" >Orissa</option><option value="PB" >Punjab</option><option value="RJ" >Rajasthan</option><option value="SK" >Sikkim</option><option value="TN" >Tamil Nadu</option><option value="TS" >Telangana</option><option value="TR" >Tripura</option><option value="UK" >Uttarakhand</option><option value="UP" >Uttar Pradesh</option><option value="WB" >West Bengal</option><option value="AN" >Andaman and Nicobar Islands</option><option value="CH" >Chandigarh</option><option value="DN" >Dadra and Nagar Haveli</option><option value="DD" >Daman and Diu</option><option value="DL">Delhi</option><option value="LD" >Lakshadeep</option><option value="PY" >Pondicherry (Puducherry)</option>
		</select>
  </div>
  <div class=" col-md-6">
    <input type="text" class="theme-form" id="exampleInputEmail1" placeholder="Postcode / ZIP*" name="delivery_zip" value="<?php echo $pin1; ?>" required>
  </div>
  <div class=" col-md-6">
    <input type="text" class="theme-form" id="exampleInputName2" placeholder="Contact Number*" name="delivery_tel" value="<?php echo $mob1; ?>" required>
  </div>
  </div>
</div>
<div class="col-md-3">
    <div style="border:solid 1px #ccc;border-radius:5px;padding-top:20px;padding-bottom:20px;padding-left:10px;padding-right:10px;">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        
                        <input class="form-control"  type="text" name="promo_code" value="" placeholder="Promocode"/>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>&#8377;
                  <span id="totalcost" >
                    <?php $i=0;
                    if(!empty($cart =$this->cart->contents()))
                    { foreach ($cart as $item )
                        {
                            $details=$this->user->get_product_by_id($item['id']);
                            $details1=$this->user->attributevalue_cost($item['attributevalue']);
                            $i=$i+($details1[0]->cost*$item['qty']);
                        }
                    }
                    elseif(!empty($this->session->userdata('uid'))){
                   foreach ($query as $row ) {
                  $details=$this->user->get_product_by_id($row->productid);
                  $details1=$this->user->attributevalue_cost($row->attributevalue);
                   $i=$i+($details1[0]->cost*$row->item);}}
                   echo $i;?></span></strong></h5></td>
                    </tr>
                    <tr>
                        
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>0</strong></h5></td>
                    </tr>
                    <tr>
                        
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>&#8377;
                  <span id="totalcost1" ><?php $i=0;
                  if(!empty($this->cart->contents()))
                    { foreach ($cart as $item )
                        {
                            $details=$this->user->get_product_by_id($item['id']);
                            $details1=$this->user->attributevalue_cost($item['attributevalue']);
                            $i=$i+($details1[0]->cost*$item['qty']);
                        }
                    }
                    elseif(!empty($this->session->userdata('uid'))){
                   foreach ($query as $row ) {
                  $details=$this->user->get_product_by_id($row->productid);
                  $details1=$this->user->attributevalue_cost($row->attributevalue);
                   $i=$i+($details1[0]->cost*$row->item);}}
                   echo $i;?></span></strong></h3></td>
                    </tr>
                </tbody>
            </table>
            <button class="theme-btn-lg col-xs-12 col-md-12 btn-lg btn" type="submit" >COUNTINUE</button>
        </div>
    </div>
    <?php echo form_close();?>
        </div>
</div>
<div class="container"></div>