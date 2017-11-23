<div class="spacer"></div>
<div id="startchange"></div>
<div class="container single-product">
	<div class="col-md-7 center-block single-product-image">
		<img id="zoom_01" src="<?php echo base_url();?>uploads/thumb/<?php echo $picture;?>" data-zoom-image="<?php echo base_url();?>uploads/<?php echo $picture;?>" class="img-responsive center-block" style="margin-top: -50px;" />
	</div>
	<div class="col-md-5">
		<div class="row">
			<div class="col-md-10 col-xs-12 ">
				<h1 style="text-transform: capitalize;"><?php echo $title; ?> </h1>
				<p><?php if(!empty($artist)) {?> By <?php echo $artist; }?></p>
			</div>
			<div class="col-md-2 col-xs-12">
				 <?php if($this->session->userdata('uid')){?>
			           	<?php if(!empty($this->user->check_love($this->session->userdata('uid'),$id))) {?>
			           
			           		<button  onclick="javascript:love(<?php echo $id;?>);" id="love" class="btn text-center love" style="background-color: #fff;border:solid 1px #ccc;"><span class="glyphicon glyphicon-heart loveremove" aria-hidden="true" id="heart" ></span>
			           		<span class="text-center col-md-12" id="lovetext" style="font-size:12px;"><?php echo $love;?></span><span style="display: none;" id="lovetext1"><?php echo $love;?></span></button >
			            <?php }else{?>
			            <button  onclick="javascript:love(<?php echo $id;?>);" id="love" class="btn  text-center love" ><span class="glyphicon glyphicon-heart loveadd" aria-hidden="true" ></span>
			           		<span class="text-center col-md-12" id="lovetext" style="font-size:12px;"><?php echo $love;?></span><span style="display: none;" id="lovetext1"><?php echo $love;?></span></button >
			        <?php } }else {?><button  data-toggle="modal" data-target=".login" class=" btn  text-center love" ><span class="glyphicon glyphicon-heart loveadd" aria-hidden="true"></span>
			        <span class="text-center col-md-12 " id="lovetext" style="font-size:12px;"><?php echo $love;?></span><span style="display: none;" id="lovetext1"><?php echo $love;?></span></button >
			        <?php }?>
				
			</div>
		</div>
		
		<div class="row">
		<div class="col-md-12">
		<h5><?php $Descr=entity_decode($Descr,$charset = NULL); echo auto_typography(html_escape($Descr)); ?></h5>
		<div><span style="font-size: 24px;"><b>&#8377;<span id="pricedisplay"></span> </b></span></div>
		</div>
		 <?php $details=$this->user->showattribute($category);
		 foreach($details as $row ){?>
			<div class="col-md-6">
				<p><?php echo $row->attribute;?></p>
				<select class="form-control" onchange="price()" id="price">
			      <?php $details=$this->user->showattributevalue($row->attribute);
		 			foreach($details as $row ){?>
				 		 <option  value="<?php echo $row->cost;?>"><?php echo $row->attributevalue;?></option>
				  <?php }?>
				</select>
			</div><?php }?>
			<div class="col-md-6">
				<p>Quantity</p>
				<select class="form-control" id="qty">
				  <option>1</option>
				  <option>2</option>
				  <option>3</option>
				  <option>4</option>
				  <option>5</option>
				  <option>6</option>
				  <option>7</option>
				  <option>8</option>
				  <option>9</option>
				  <option>10</option>
				</select>
			</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12 col-xs-12" style="padding-bottom: 20px;">
			            	<?php if(!empty($this->session->userdata('uid'))){?>
			                <div class="" id="addcartbtn" ><button  class="theme-btn-lg col-md-12 col-xs-12" onclick="javascript:cartadd(<?php echo $id;?>);"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><span class="btn-text"> Add to cart</span></button ></div>
			                <?php }else{?>
			                <div class="" id="addcartbtn" ><button  class="theme-btn-lg col-md-12 col-xs-12" onclick="javascript:cartadd1(<?php echo $id;?>);"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><span class="btn-text"> ADD TO CART</span></button ></div>
			                <?php }?>
	       		</div>
				<div class="col-md-6 col-xs-12">
			            <?php if($this->session->userdata('uid')){?>
			           	<?php if(!empty($this->user->check_wish($this->session->userdata('uid'),$id))) {?>
			           	<button onclick="javascript:wishlist(<?php echo $id;?>);" class="btn col-md-12 col-xs-12 wishadd" id="wish"><span id="wishtext">ADDED TO WISHLIST</span></button>
			            <?php }else{?>
			            <button onclick="javascript:wishlist(<?php echo $id;?>);" class="btn col-md-12 col-xs-12" id="wish"><span id="wishtext">ADD TO WISHLIST</span></button>
			          	<?php } }else {?>
			          	<button class="btn col-md-12 col-xs-12" href="#"  data-toggle="modal" data-target=".login">ADD TO WISHLIST</button>
			          	<?php }?>
		        </div>
		        <div class="col-md-12 col-xs-12">
		        	<h4>Category:<small><?php echo $category; ?></small></h4>
		        	<h4>Tags</h4>
		        	<?php $myArray =explode(',', $tag);
		        		foreach($myArray as $my_Array){?>
		        			<button class="btn btn-sm"><?php echo $my_Array;?></button>  
					<?php }?>
		        </div>
	    	</div>
	</div>
</div>
<div class="container product-details">
	 <ul class="nav nav-tabs text-center"  role="tablist">
	    <li class="active"><a href="#comment" aria-controls="coment" role="tab" data-toggle="tab" style="font-size:18px;">Comments (<?php echo $review;?>)</a></li>
	    <li ><a href="#info" aria-controls="info" role="tab" data-toggle="tab" style="font-size:18px;">Promoters</a></li>
	  </ul>
	  <!-- Tab panes -->
	  <div class="tab-content">
	    <div role="tabpanel" class="tab-pane " id="info">
	    	 <p class=""> </p>
	    </div>
	    <div role="tabpanel" class="tab-pane active" id="comment">
	        <br>
            <?php
             foreach (array_slice($query1, 0, 3) as $row) {?>
            <div class="">
              <div class="">
                <p>Posted by <b style="text-transform: capitalize;"><?php echo $row->uname; ?></b></p>
                <p>&#34;<?php echo $row->review; ?>&#34;</p>
              </div>
            </div>
            <?php  }?>
		    <!--	<a type="button" class="" data-toggle="modal" data-target="#myModal" style="font-size: 16px;text-decoration: underline;">
			 Read more
			</a>-->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Comment</h4>
			      </div>
			      <div class="modal-body">
			        
						   		<?php
				             		foreach ($query1 as $row) {?>
				            		<div class="">
				              		<div class="">
				                		<p>Posted by <b style="text-transform: capitalize;"><?php echo $row->uname; ?></b></p>
				                		<p>&#34;<?php echo $row->review; ?>&#34;</p>
				              		</div>
				            		</div>
				           		 <?php  }?>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn theme-btn" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
	    	<?php if(!empty($this->session->userdata('uid'))){
                 $attributes = array("name" => "review");
                echo form_open("profile/review", $attributes);?>
	    	<div class="col-md-8">
	    		  <div class="form-group hide">
                    <input type="text" class="form-control" name="productid" value="<?php echo $id;?>">
                  </div>
                  <div class="form-group hide">
                    <input type="text" class="form-control" name="uname" value="<?php echo $this->session->userdata('fname'); ?> <?php echo $this->session->userdata('lname'); ?>">
                  </div>
	    		<div class="col-xs-12 col-md-10">
				    <input type="text" name="review" class="theme-form" id="exampleInputEmail1" placeholder="Comment Here">
				</div>
				<button type="submit" class="theme-btn btn col-xs-12 col-md-2" >Submit</button>
				<?php echo form_close(); }else{ ?>
				<h5><a data-toggle="modal" data-target=".login" style="font-size:16px;" style="text-decoration:underline;">Login</a> to comment</h5>
               <!-- <button href="#" data-toggle="modal" data-target=".login" class="btn col-md-2 col-xs-12" >LOGIN</button>--><?php }?>
			</div>
	    </div>
	  </div>
</div>
<br><br>
<hr>
<div class="container-fluid">
      <h3 class="offset-left-5">Related Products</h3>
	<?php foreach ($query2 as $row ) {
				$category=str_replace(' ', '-', $row->category);
				$title=str_replace(' ', '-', $row->title);?>
		<div class="col-md-2 col-xs-6 text-center">
            <div class="related-product">
            	<a href="<?php echo base_url("index.php/product/details/$category/$title"); ?>">
	            	<div class="related-product-img">
	            	<img alt="" src="<?php echo base_url(); ?>uploads/thumb/<?php echo $row->picture;?>"  class="img-responsive center-block">
	            	</div>
            	</a>
            </div>
            <div class="text-center">
              <p><a href="<?php echo base_url("index.php/product/details/$category/$title"); ?>" style="text-decoration:none;color:#000;" ><?php echo $row->title;?></a></p>
            <p>&#8377;<?php  
            $details=$this->user->showattribute($row->category);
            $details1=$this->user->showattributevalue($details[0]->attribute); echo $details1[0]->cost;?></p>
            </div>
         </div>
        <?php }?>
</div>