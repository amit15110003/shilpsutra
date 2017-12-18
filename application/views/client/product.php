<div class="spacer"></div>
<div id="startchange"></div>
<div class="container-fluid single-product" style="margin-top: 50px;">
	<div class="col-md-1 center-block hidden-xs">
		<div id="gallery_01">
 		<div class="col-md-12 side-img active">
			<a  href="#" class="elevatezoom-gallery active" data-update="" data-image="<?php echo base_url(); ?>uploads/thumb/<?php echo $picture;?>" 
			data-zoom-image="<?php echo base_url(); ?>uploads/<?php echo $picture;?>">
			<img src="<?php echo base_url(); ?>uploads/thumb/<?php echo $picture;?>" width="100" height="100" class="img-responsive center-block"  /></a>
		</div>
		<?php
			if(!empty($query)){
			 foreach ($query as $row) {?>
 		<div class="col-md-12 side-img">
			<a  href="#" class="elevatezoom-gallery"
			     data-image="<?php echo base_url(); ?>uploads/thumb/<?php echo $row->img; ?>"
			     data-zoom-image="<?php echo base_url(); ?>uploads/<?php echo $row->img; ?>"
			    ><img src="<?php echo base_url(); ?>uploads/thumb/<?php echo $row->img; ?>" width="100" height="100" class="img-responsive center-block"  /></a>
		</div>
		<?php }}?>
		</div>
	</div>
	<div class="col-md-6 single-product-img">
	    <div class="col-md-12 ">
	    	<div class="single-product-image">
				<img style="border:1px solid #e8e8e6;" id="zoom_03" src="<?php echo base_url(); ?>uploads/thumb/<?php echo $picture;?>" 
				data-zoom-image="<?php echo base_url(); ?>uploads/<?php echo $picture;?>" class="img-responsive center-block" />
			</div>
		</div>
	</div>
	<div class="col-md-5 ">
		<div class="row">
			<div class="col-md-12 col-xs-12 ">
				<h1 class="text-center" style="text-transform: capitalize;font-size: 50px;font-weight: bold;"><?php echo $title; ?> </h1>
			</div>
		</div>
		
		<div class="row">
		<div class="col-md-12 text-center">
		<h5><?php $Descr=entity_decode($Descr,$charset = NULL); echo auto_typography(html_escape($Descr)); ?></h5>
		<div><span style="font-size: 24px;"><b>&#8377; <?php echo $cost; ?></b></span></div>
		</div>
		<div class="post-list" id="postList1">
			<div class="row">
				<div class="col-md-12 text-center">
						<input id="pid" class="hide" value="<?php echo $id;?>"></input>
							<h5>Color</h5>
						<?php $i=0; foreach ($query4 as $row) {$details=$this->user->type_color($row->color);?>
							<button type="submit" id="color_<?php echo $i;?>" style="background-color:<?php echo $details['0']->colorcode;?>;" onclick="searchqty1(<?php echo $id;?>,<?php echo $i;?>);" value="<?php echo $row->color; ?>" class="<?php if(!empty($color)){if($row->color==$color){echo 'active-color';}}elseif($i=='0'){echo 'active';};?>"></button>
							<?php $i++; } ?>
				</div>
				<div class="col-md-6" >
					<div class="row" style="border: solid 1px  #ccc;padding: 8px 5px;">
						<div class="col-md-6">
							<h5>Size</h5>
						</div>
						<div class="col-md-6">
							<select class="" id="size" onchange="searchqty(<?php echo $id;?>);">
						  		<?php foreach ($query3 as $row) {?>
						  			<option><?php echo $row->size; ?></option>
						 		<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row"  style="border: solid 1px  #ccc;padding: 8px 5px;">
					<div class="col-md-6">
							<h5>Quantity</h5>
					</div>
					<div class="col-md-6">
					<select class="" id="qty">
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
				</div>
			</div>
			<br>
			<div class="row text-center">
				<p><?php  echo $qty; ?> Item left!</p>
			</div>
			<div class="row text-center">
				<div class="col-md-6 col-md-offset-3 col-xs-12" style="padding-bottom: 20px;">
			            	<?php if(!empty($this->session->userdata('uid'))){?>
			                <div class="" id="addcartbtn" ><button  class="theme-btn btn col-md-12 col-xs-12" onclick="javascript:cartadd(<?php echo $id;?>);"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><span class="btn-text"> Add to cart</span></button ></div>
			                <?php }else{?>
			                <div class="" id="addcartbtn" ><button  class="theme-btn btn col-md-12 col-xs-12" onclick="javascript:cartadd1(<?php echo $id;?>);"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><span class="btn-text"> ADD TO CART</span></button ></div>
			                <?php }?>
	       		</div>
	       	</div>
	    </div>
	       	<div class="row">
				<div class="col-md-6 col-md-offset-3 col-xs-12 text-center">
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
		        <hr>
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
</div>
<!--<div class="container product-details">
	 <ul class="nav nav-tabs text-center"  role="tablist">
	    <li class="active"><a href="#comment" aria-controls="coment" role="tab" data-toggle="tab" style="font-size:18px;">Comments (<?php echo $review;?>)</a></li>
	    <li ><a href="#info" aria-controls="info" role="tab" data-toggle="tab" style="font-size:18px;">Promoters</a></li>
	  </ul>
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
            <?php  }?>	<a type="button" class="" data-toggle="modal" data-target="#myModal" style="font-size: 16px;text-decoration: underline;">
			 Read more
			</a>
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
               <button href="#" data-toggle="modal" data-target=".login" class="btn col-md-2 col-xs-12" >LOGIN</button><?php }?>
			</div>
	    </div>
	  </div>
</div>
<br><br>-->
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
            <p>&#8377;<?php echo $row->cost;?></p>
            </div>
         </div>
        <?php }?>
</div>