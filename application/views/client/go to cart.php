
					 	<?php if(!empty($this->user->check_cart($this->session->userdata('uid'),$id))) {?>
					 		<a type="button" class="theme-btn-lg col-md-12 col-xs-12" href="<?php echo base_url("index.php/cart"); ?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Go To Cart</a>
					 		
			                <div class="" id="gocartbtn"><a  class="theme-btn-lg col-md-12 col-xs-12 " href="<?php echo base_url("index.php/cart"); ?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Go To Cart</a >
			              </div>
			            <?php }else{?>

			            
      <script type="text/javascript">
	    $("#gocartbtn").hide();
	  </script>
			            
                    $("#addcartbtn").hide();
                    $("#gocartbtn").show();



                    
                    $("#addcartbtn").hide();
                    $("#gocartbtn").show();