<div class="spacer"></div>
<div id="startchange"></div>
<div class="container-fluid category-option" style="margin-top: 50px;">
	<div class="col-md-9">
		<select class="" data-placeholder="Select an option" id="tag" onchange="searchFilter()" >
			<option value="">All</option>  
		<?php 
		foreach ($query1 as $row) {?>
		        <option value="<?php echo $row->tag;?>" style="text-transform: capitalize;"><?php echo $row->tag;?> </option>  
		 <?php }?>
		</select>
	</div>
	<div class="col-md-3 col-xs-8">
		<input type="hidden" id="keywords" value="<?php echo $categoryval; ?>" onkeyup="searchFilter()"/>
		<select class="theme-select" data-placeholder="Select an option" id="sortBy" onchange="searchFilter()" style="border: none;">
            <option value="default">Default sorting</option>
            <option value="popular">Sort by popularity</option>
            <option value="new">Sort by newness</option>
        </select>
	</div>
	<div class="col-md-8"></div>
	<div class="col-md-1 col-xs-4">
	</div>
</div>
<div >
<div class="container-fluid">
		<div class="post-list" id="postList">
			<?php foreach ($query as $row) {
				$category=str_replace(' ', '-', $row->category);
				$title=str_replace(' ', '-', $row->title);?>

			<div class="col-md-3 col-xs-6" >
				<a href="<?php echo base_url("index.php/product/details/$category/$title"); ?>">
				<div class=" col-md-12   product" style="background-color: #fff;">
						<div class="" style="background-color: #000;display: block;position: absolute;right:0;margin-top: 10px;padding: 2px 15px;">
							<span style="color: #fff;">SALE</span>
						</div>
				<div class="row ">
						<div class="product-img-overlayer"></div>
						<div class="product-img">
								<img src="<?php echo base_url();?>uploads/thumb/<?php echo $row->picture;?>" class="img-responsive center-block">
						</div>
						<div class="row " style="margin-left: -15px;margin-right: -15px;">
								<div class="text-left col-md-8" >
									<h4  style="text-transform: capitalize;color: #000;"><?php echo $row->title; ?></h4>
								</div>
								<div class="text-right col-md-4" >
									<h4  style="color: #848484;">Rs <?php echo $row->cost; ?></h4>
								</div>
								<p class="" style="color:#000;"><b>Size</b>
								<?php 
								$query3=$this->user->get_size_id($row->id);
								foreach ($query3 as $row2) { echo $row2->size; echo" "; } ?></p>
						</div>
							<div class="more-details col-md-12">
								<?php $i=0;
								$query1=$this->user->get_color_id($row->id);
								 foreach ($query1 as $row1) {$details=$this->user->type_color($row1->color);?>
								<div style="background-color:<?php echo $details['0']->colorcode;?>;height: 20px;width: 20px;border-radius: 50%;border:solid 2px #ccc;display: inline-block; "></div>
								<?php $i++; }?>
							</div>
					<button class="button1 theme-btn1 btn" href="<?php echo base_url("index.php/product/details/$category/$title"); ?>">ADD TO CART</button>
					<button class="button2 theme-btn1 btn"  javascript:love2(<?php echo $row->id;?>);" id="love">QUICK VIEW</button>
				</div>
				</div>
				</a>
			</div>
			<?php }?>

			 <div class="row col-md-12 col-xs-12 text-center ">
                <ul class="pagination center">
                    <li><?php echo $links; ?></li>
                </ul>
             </div>
		</div>
</div>
</div>