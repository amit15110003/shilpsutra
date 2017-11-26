
  <?php foreach ($query as $row) {
            $category=str_replace(' ', '-', $row->category);
            $title=str_replace(' ', '-', $row->title);?>
         <div class="col-md-3 col-xs-6 product">
        <div class="row">
          <div class="product-img">
                  <a href="<?php echo base_url("index.php/product/details/$category/$title"); ?>"><img src="<?php echo base_url();?>uploads/thumb/<?php echo $row->picture;?>" class="img-responsive center-block">
                  </a>
               </div>
               <div class="text-center">
                  <h4><?php echo $row->title; ?></h4>
                  <h5><?php echo $row->cost; ?></h5>
               </div>
            </div>
            <a class="button1 theme-btn-circle" href="<?php echo base_url("index.php/product/details/$category/$title"); ?>"><i class="glyphicon glyphicon-shopping-cart"></i></a>
            <!--<button type="button" class="button2 theme-btn-circle"><i class="glyphicon glyphicon-heart"></i></button>-->
         </div>
         <?php }?>

          <div class="row col-md-12 col-xs-12 text-center ">
                <ul class="pagination center">
                    <li ><?php echo $links; ?></li>
                </ul>
             </div>