<div class="spacer"></div>
<div id="startchange"></div>
<div class="container-fluid category-header">
	<h1 class="text-center">Search</h1>
</div>
<br>
<!--<div class="container">
	<div class="col-md-3 col-xs-8">
		<input type="hidden" id="keywords" value="<?php echo $categoryval; ?>" onkeyup="searchFilter()"/>
		<select class="theme-select" data-placeholder="Select an option" id="sortBy" onchange="searchFilter()">
            <option value="">Default sorting</option>
            <option value="popular">Sort by popularity</option>
            <option value="new">Sort by newness</option>
            <option value="low">Sort by price: low to high</option>
            <option value="high">Sort by price: high to low</option>
        </select>
	</div>
	<div class="col-md-8"></div>
	<div class="col-md-1 col-xs-4">
	</div>
</div>-->
<div class="container-fluid">
		<div class="post-list" id="postList">
			<?php foreach ($query as $row) {
				$category=str_replace(' ', '-', $row->category);
				$title=str_replace(' ', '-', $row->title);?>
			<div class="col-md-3 col-xs-6 product">
				<div class="row">
					<div class="product-img">
						<a href="<?php echo base_url("index.php/product/details/$category/$title"); ?>" target="_blank"><img src="<?php echo base_url();?>uploads/thumb/<?php echo $row->picture;?>" class="img-responsive">
						</a>
					</div>
					<div class="text-center">
						<h5><?php echo $row->title; ?></h5>
						<h5>₹<?php  
						$details=$this->user->showattribute($row->category);
						$details1=$this->user->showattributevalue($details[0]->attribute); echo $details1[0]->cost;?></h5>
					</div>
				</div>
				<a class="button1 theme-btn-circle" href="<?php echo base_url("index.php/product/details/$category/$title"); ?>" target="_blank"><i class="glyphicon glyphicon-shopping-cart"></i></a>
				<!--<button type="button" class="button2 theme-btn-circle"><i class="glyphicon glyphicon-heart"></i></button>-->
			</div>
			<?php }?>

			 <div class="row col-md-12 col-xs-12 text-center ">
                <ul class="pagination center">
                    <li ><?php echo $links; ?></li>
                </ul>
             </div>
		</div>
</div>