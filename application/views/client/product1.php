			
			<div class="row">
			  <div class="col-md-12 text-center ">
				<h5>Color</h5>
				<?php 
				$i=0;
				foreach ($query4 as $row) {$details=$this->user->type_color($row->color);?>
				<button type="submit" id="color_<?php echo $i;?>" style="background-color:<?php echo $details['0']->colorcode;?>;" onclick="searchqty1(<?php echo $id;?>,<?php echo $i;?>);" value="<?php echo $row->color; ?>" class="color <?php if($row->color==$color){echo 'active-color';}?>"></button>
				<?php $i++;} ?>
			</div>
			<div class="col-md-12" style="height: 10px;"></div>
			<div class="col-md-6" >
				<div class="row" style="border: solid 1px #ccc;padding: 8px 5px;margin-top: 2px;margin-bottom: 2px;">
					<div class="col-md-6 col-xs-6">
							<h5>Size</h5>
					</div>
					<div class="col-md-6 col-xs-6">
					<select class="" id="size" onchange="searchqty(<?php echo $id;?>);" style="padding-top: 6px;">
					  <?php foreach ($query3 as $row) {?>
					  <option <?php if($row->size==$size){echo 'selected';}?>><?php echo $row->size; ?></option>
					 <?php } ?>
					</select>
					</div>
				</div>
			</div>
			<div class="col-md-6" >
				<div class="row" style="border: solid 1px #ccc;padding: 8px 5px;margin-top: 2px;margin-bottom: 2px;">
					<div class="col-md-6 col-xs-6">
					<h5>Quantity</h5>
					</div>
					<div class="col-md-6 col-xs-6">
						<select class="" id="qty" style="padding-top: 6px;">
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
				<p class="col-md-12 col-xs-12"><?php  echo $qty; ?> Item left!</p>
			</div>
			<div class="row ">
				<div class="col-md-6 col-md-offset-3 col-xs-12 " style="padding-bottom: 20px;">
					<?php if($qty=='0'){?>
					<div class="text-center" id="addcartbtn" ><button  class="theme-btn btn col-md-12 col-xs-12" onclick="javascript:cartadd(<?php echo $id;?>);" > OUT OF STOCK</button >
					<?php }else{?>
			            	<?php if(!empty($this->session->userdata('uid'))){?>
			                <div class="text-center" id="addcartbtn" ><button  class="theme-btn btn col-md-12 col-xs-12" onclick="javascript:cartadd(<?php echo $id;?>);" ><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" ></span><span class="btn-text"> ADD TO CART</span></button ></div>
			                <?php }else{?>
			                <div class="text-center" id="addcartbtn" ><button  class="theme-btn btn col-md-12 col-xs-12" onclick="javascript:cartadd1(<?php echo $id;?>);"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><span class="btn-text"> ADD TO CART</span></button ></div>
			                <?php }?>
			        <?php }?>
	       		</div>
	       	</div>