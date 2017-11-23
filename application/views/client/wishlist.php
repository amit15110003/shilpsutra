<div class="spacer"></div>
<div id="startchange"></div>
<div class="page-header ">
		<h1>Wishlist</h1>	
</div>
<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-xs-12 col-md-10">
           <?php if(!empty($query)){ foreach ($query as $row ) {
              $details=$this->user->get_product_by_id($row->productid);
              $details1=$this->user->attributevalue_cost($row->attributevalue);
             ?>
            <div class="col-xs-12 col-md-4" id="cart_<?php echo $row->id;?>">
                <div class="cart-layout cart_item col-xs-12 col-md-12 card" id="cart_<?php echo $row->id;?>">
                <div class="col-md-1 col-xs-6">
                    <h5><a href="" onclick="javascript:remove_wish(<?php echo $row->id;?>);">x</a></h5>
                </div>
                <div class="col-md-12 col-xs-12">
                    <img src="<?php echo base_url();?>uploads/thumb/<?php echo $details[0]->picture;?>" class="img-responsive center-block" style="height: 150px;">
                </div>
                <div class="col-md-12 col-xs-12 text-center" >
                    <h4><b><a href="" style="color: #000;"><?php  echo $details[0]->title;?></a></b></h4>
                </div>
                <div class="col-md-4 col-xs-12 text-center" >
                    <h5><?php echo $row->attributevalue; ?></h5>
                </div>
                <div class="col-md-4 col-xs-6 text-center">
                    <h5><b>&#8377; <?php  
                     
                    echo $details1[0]->cost;?></b></h5>
                </div>
                <div class="col-md-4 col-xs-6 text-center">
                        <h5>Qty: <?php echo $row->item;?></h5>
                </div>
                <button onclick="javascript:move_cart(<?php echo $row->id;?>);" class="theme-btn col-md-12 col-xs-12" id="wish">Move to Cart</button>
                </div>
            </div>
            <?php }}else{?>
            <div class="text-center" style="padding-top:100px;padding-bottom:100px;">
                 
              <h3>Empty</h3>
              <a type="" class="btn" href="<?php echo base_url();?>" style="color:#000;"> CONTINUE SHOPPING</a>
             </div><?php }?>
        </div>
    </div>
</div>
