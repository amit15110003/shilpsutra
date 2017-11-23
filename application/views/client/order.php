<div class="spacer"></div>
<div id="startchange"></div>
<div class="page-header ">
		<h1>Order</h1>	
</div>
<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-xs-12 col-md-10">
           <?php if(!empty($query)){
           foreach ($query as $row ) {
               
			$details2= $this->user->getorderadd($row->orderid);
             ?>
            <div class="col-xs-12 col-md-12" id="cart_<?php echo $row->id;?>">
                <div class="cart-layout cart_item col-xs-12 col-md-12 card" id="cart_<?php echo $row->id;?>">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <h4>
                            Order-Id: <?php  echo $row->orderid;?>
                        </h4>
                    </div>
                    <div class="col-md-4">
                        <h4>
                            Txn-Id: <?php  echo $row->txnid;?>
                        </h4>
                    </div>
                    <div class="col-md-4">
                        <h4>
                            Status: <?php  echo $row->status1;?>
                        </h4>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <h4>Billing Address</h4>
                        <p style="text-transform:capitalize;"><?php echo "<b>"; echo $details2[0]->billing_name;echo "</b>"; echo "<br>"; echo "Adress: ";echo $details2[0]->billing_address;echo ", ";echo $details2[0]->billing_city;echo "<br>"; echo $details2[0]->billing_state; echo ", "; echo "Pin:"; echo $details2[0]->billing_zip;echo "<br>"; echo $details2[0]->billing_tel; ?></p>
                    </div>
                    <div class="col-md-6">
                        <h4>Shipping Address</h4>
                        <p style="text-transform:capitalize;"><?php echo "<b>"; echo $details2[0]->delivery_name; echo "</b>"; echo "<br>"; echo "Adress: ";echo $details2[0]->delivery_address;echo ", ";echo $details2[0]->delivery_city;echo "<br>"; echo $details2[0]->delivery_state; echo ", "; echo "Pin:"; echo $details2[0]->delivery_zip;echo "<br>"; echo $details2[0]->delivery_tel; ?></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
                <?php 
                $details=$this->user->showorder_orderid($row->orderid);
              foreach($details as $row1){
              $details=$this->user->get_product_by_id($row1->productid);?>
              <div class="col-md-6 col-xs-12">
                <div class="col-md-6 col-xs-12">
                    <img src="<?php echo base_url();?>uploads/thumb/<?php echo $details[0]->picture;?>" class="img-responsive center-block" style="height: 120px;">
                </div>
                <div class="col-md-6 col-xs-12">
                <div class="col-md-12 col-xs-12 " >
                        <h4><b><a href="" style="color: #000;"><?php  echo $details[0]->title;?></a></b></h4>
                    </div>
                    <div class="col-md-12 col-xs-12 " >
                        <h5><?php echo $row1->attributevalue; ?></h5>
                    </div>
                    <div class="col-md-6 col-xs-6 ">
                        <h5><b>&#8377; <?php  
                         
                        echo $row1->cost;?></b></h5>
                    </div>
                    <div class="col-md-6 col-xs-6 ">
                            <h5>Qty: <?php echo $row1->item;?></h5>
                    </div>
                </div>
                </div>
                <?php }?>
                </div>
            </div>
            <?php }}else{?>
             <div class="text-center" style="padding-top:100px;padding-bottom:100px;">
                 
              <h3>Empty</h3>
              <a type="" class="btn" href="<?php echo base_url();?>" style="color:#000;"> CONTINUE SHOPPING</a>
             </div>
            <?php }?>
        </div>
    </div>
</div>
