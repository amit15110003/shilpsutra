
  <?php foreach ($query as $row) {
            $category=str_replace(' ', '-', $row->category);
            $title=str_replace(' ', '-', $row->title);?>
             <div class="col-md-3 col-xs-6">
              <a href="<?php echo base_url("index.php/product/details/$category/$title"); ?>">
              <div class=" col-md-12   product">
                  <div class="" style="background-color: #000;display: block;position: absolute;right:0;margin-top: 10px;padding: 2px 15px;">
                    <span style="color: #fff;">SALE</span>
                  </div>
              <div class="row ">
                  <div class="product-img-overlayer"></div>
                  <div class="product-img">
                      <img src="<?php echo base_url();?>uploads/thumb/<?php echo $row->picture;?>" class="img-responsive center-block">
                  </div>
                  <div class="row ">
                      <h5 class="text-left" style="text-transform: capitalize;font-weight: bold;color: #000;"><?php echo $row->title; ?></h5>
                      <h5 class="text-left" style="color: #848484;">Rs <?php echo $row->cost; ?></h5>
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
                    <li ><?php echo $links; ?></li>
                </ul>
             </div>