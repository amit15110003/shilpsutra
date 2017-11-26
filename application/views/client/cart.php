<div class="spacer"></div>
<div id="startchange"></div>
<div class="page-header ">
		<h1>My Cart</h1>	
</div>
<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-xs-12 col-md-10">
            <?php 
                if ($cart = $this->cart->contents()){
                    foreach ($cart as $item ) {
              $details=$this->user->get_product_by_id($item['id']);
              $details1=$this->user->attributevalue_cost($item['attributevalue']);
             ?>
            <div class="col-xs-12 col-md-12  cart-layout cart_item" id="cart_<?php echo $item['id'];?>">
                <div class="col-md-1 col-xs-6 cart-line text-center">
                    <h5><a href="<?php echo base_url()?>index.php/cart/removecart/<?php echo $item['rowid'];?>">x</a></h5>
                </div>
                <div class="col-md-2 col-xs-12">
                    <img src="<?php echo base_url();?>uploads/<?php echo $details[0]->picture;?>" class="img-responsive center-block" style="height: 120px;">
                </div>
                <div class="col-md-2 col-xs-12 cart-line">
                    <h5><a href="" style="color: #000;"><?php  echo $details[0]->title;?> </a></h5>
                    <p><?php echo $item['attributevalue']; ?></p>
                </div>
                <div class="col-md-2 col-xs-6 cart-line text-center">
                    <h5>&#8377;  <span id="itemcost_<?php echo $item['rowid'];?>"><?php echo  $details[0]->cost;?></span></h5>
                </div>
                <div class="col-md-3 col-xs-12 cart-line">
                    <div class="text-center quantity">
                        <input  step="1" min="1" max="" name="quantity" value="<?php echo $item['qty'];?>" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric" id="itemno_<?php echo $item['rowid'];?>" onchange="javascript:item1(<?php echo $item['rowid'];?>);" >
                    </div>
                </div>
                <div class="col-md-2 col-xs-6 cart-line text-center">
                    <h5>&#8377; <span id="cost_<?php echo $item['rowid'];?>"><?php echo  $details[0]->cost*$item['qty'];?></span></h5>
                </div>
            </div><?php }}?>
            <?php foreach ($query as $row ) {
              $details=$this->user->get_product_by_id($row->productid);
              $details1=$this->user->attributevalue_cost($row->attributevalue);
             ?>
            <div class="col-xs-12 col-md-12  cart-layout cart_item" id="cart_<?php echo $row->id;?>">
                <div class="col-md-1 col-xs-6 cart-line text-center">
                    <h5><a href="" onclick="javascript:remove_cart(<?php echo $row->id;?>);">x</a></h5>
                </div>
                <div class="col-md-2 col-xs-12">
                    <img src="<?php echo base_url();?>uploads/<?php echo $details[0]->picture;?>" class="img-responsive center-block" style="height: 120px;">
                </div>
                <div class="col-md-2 col-xs-12 cart-line">
                    <h5><a href="" style="color: #000;"><?php  echo $details[0]->title;?></a></h5>
                    <p><?php echo $row->attributevalue; ?></p>
                </div>
                <div class="col-md-2 col-xs-3 cart-line text-center">
                    <h5>&#8377;  <span id="itemcost_<?php echo $row->id;?>"><?php  
                     
                    echo $details[0]->cost;?></span></h5>
                </div>
                <div class="col-md-3 col-xs-6 cart-line">
                    <div class="text-center quantity">
                        <input  step="1" min="1" max="" name="quantity" value="<?php echo $row->item;?>" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric" id="itemno_<?php echo $row->id;?>" onchange="javascript:item(<?php echo $row->id;?>);" >
                    </div>
                </div>
                <div class="col-md-2 col-xs-3 cart-line text-center">
                    <h5>&#8377; <span id="cost_<?php echo $row->id;?>"><?php echo  $details[0]->cost*$row->item;?></span></h5>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
        <hr>
        <div class="col-md-offset-8 col-md-4" style="padding-top: 4%;">
            <table class="table table-hover ">
                <tbody>
                    <tr>
                        
                        
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>&#8377;
                  <span id="totalcost" >
                    <?php $i=0;
                    if(!empty($this->cart->contents()))
                    { foreach ($cart as $item )
                        {
                            $details=$this->user->get_product_by_id($item['id']);
                            $details1=$this->user->attributevalue_cost($item['attributevalue']);
                            $i=$i+($details[0]->cost*$item['qty']);
                        }
                    }
                    elseif(!empty($this->session->userdata('uid'))){
                   foreach ($query as $row ) {
                  $details=$this->user->get_product_by_id($row->productid);
                  $details1=$this->user->attributevalue_cost($row->attributevalue);
                   $i=$i+($details[0]->cost*$row->item);}}
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
                            $i=$i+($details[0]->cost*$item['qty']);
                        }
                    }
                    elseif(!empty($this->session->userdata('uid'))){
                   foreach ($query as $row ) {
                  $details=$this->user->get_product_by_id($row->productid);
                  $details1=$this->user->attributevalue_cost($row->attributevalue);
                   $i=$i+($details[0]->cost*$row->item);}}
                   echo $i;?></span></strong></h3></td>
                    </tr>
                </tbody>
            </table>
            <a class="theme-btn-lg col-xs-12 col-md-12 btn-lg btn" href="<?php echo base_url(); ?>index.php/checkout"  > PROCEED TO CHECKOUT</a>
        </div>
        </div>
    </div>
</div>
