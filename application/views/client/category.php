<div class="spacer"></div>
<div id="startchange"></div>
<div class="container-fluid category-header">
	<h1 class="text-center"><?php echo $categoryval;?></h1>
</div>
<div class="container category-subheader">
	<p><?php $details=$this->user->showcategory_category($categoryval);
	echo $details[0]->descr;?></p>
</div>
<hr>
<div class="container category-option">
	<div class="col-md-9">
		<select class="theme-select" data-placeholder="Select an option" id="tag" onchange="searchFilter()" >
			<option value="">All</option>  
		<?php 
		foreach ($query1 as $row) {?>
		        <option value="<?php echo $row->tag;?>" style="text-transform: capitalize;"><?php echo $row->tag;?> </option>  
		 <?php }?>
		</select>
	</div>
	<div class="col-md-3 col-xs-8">
		<input type="hidden" id="keywords" value="<?php echo $categoryval; ?>" onkeyup="searchFilter()"/>
		<select class="theme-select" data-placeholder="Select an option" id="sortBy" onchange="searchFilter()">
            <option value="default">Default sorting</option>
            <option value="popular">Sort by popularity</option>
            <option value="new">Sort by newness</option>
        </select>
	</div>
	<div class="col-md-8"></div>
	<div class="col-md-1 col-xs-4">
	</div>
</div>
<div class="container-fluid">
		<div class="post-list" id="postList">
			<?php foreach ($query as $row) {
				$category=str_replace(' ', '-', $row->category);
				$title=str_replace(' ', '-', $row->title);?>
			<div class="col-md-3 col-xs-6 product">
				<div class="row">
					<div class="product-img">
						<a href="<?php echo base_url("index.php/product/details/$category/$title"); ?>"><img src="<?php echo base_url();?>uploads/thumb/<?php echo $row->picture;?>" class="img-responsive  center-block">
						</a>
					</div>
					<div class="text-center">
						<h4><?php echo $row->title; ?></h4>
						<h5><b>₹<?php  
						$details=$this->user->showattribute($row->category);
						$details1=$this->user->showattributevalue($details[0]->attribute); echo $details1[0]->cost;?></b> 
						<?php if($details1[0]->scost !="0"){?>
						<sub>₹<strike><?php echo $details1[0]->scost;?><?php }?></strike></sub></h5>
					</div>
				</div>
				<a class="button1 theme-btn-circle" href="<?php echo base_url("index.php/product/details/$category/$title"); ?>"><i class="glyphicon glyphicon-shopping-cart" style= ></i></a>
				<!--<a class="button2 theme-btn-circle"  javascript:love2(<?php echo $row->id;?>);" id="love"><i class="glyphicon glyphicon-heart"></i></a>-->
			</div>
			<?php }?>

			 <div class="row col-md-12 col-xs-12 text-center ">
                <ul class="pagination center">
                    <li><?php echo $links; ?></li>
                </ul>
             </div>
		</div>
</div>