<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Shilpsutra</title>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url();?>media/js/jquery.elevatezoom.js"></script>
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>media/css/bootstrap.css" rel="stylesheet">
    <!--<link href="<?php echo base_url();?>media/css/bootstrapPlusPlus.css" rel="stylesheet">-->
    <link href="<?php echo base_url();?>media/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>media/css/bootstrap-dropdownhover.css" rel="stylesheet">
    <link href="<?php echo base_url();?>media/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>media/css/style1.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>media/css/prism.css">
    <link href="<?php echo base_url();?>media/css/blog.css" rel="stylesheet">
  <script src="<?php echo base_url();?>media/js/jquery.toc.js"></script>
  <script src="<?php echo base_url();?>media/js/prism.js"></script>
<link rel="icon" href="images/favicon.html" type="image/x-icon">
<style type="text/css">
  
  .love{
   background-color: #fff;border:solid 1px #ccc;
  }
  .loveadd{
    font-size:30px;
  }
  .loveremove{
    color: #ea472e !important;font-size:30px;
  }
</style>
  </head>
  <body>
  <!--header-->
   <nav class="navbar navbar-default">
  <div class="container" style="">
  <div class="row">
          <div class="header-img" style="">
              <a href="<?php echo base_url(""); ?>"><img src="<?php echo base_url();?>media/image/logo.jpg" class="img-responsive"  style="height:50px;"></a>
          </div>
          <div class="" >
            <select class="col-md-1" style="display: block;position: absolute;right:15px;">
                  <option>INR</option>
                   <option>USD</option>
                    <option>GBP</option>
            </select>
          </div>
    </div>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="padding-left: 10px;">
      <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" >
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href=""  class="navbar-toggle navbar-mobile pull-right" data-toggle="modal" data-target=".search">
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
      </a>
      <?php if ($this->session->userdata('fname')){ ?>
          <a class=" dropdown-toggle dropdown navbar-toggle navbar-mobile pull-right" type="button" data-toggle="dropdown" data-hover="dropdown">
           <?php echo $result = substr($this->session->userdata('fname'), 0, 4); ?> <span class="glyphicon glyphicon-user" aria-hidden="true">  </span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url("index.php/profile"); ?>">Profile</a></li>
            <li><a href="<?php echo base_url("index.php/orders"); ?>" class="list-group-item"> Orders</a></li>
            <li><a href="<?php echo base_url("index.php/wishlist"); ?>" class="list-group-item"> Wishlist</a></li>
            <li><a href="<?php echo base_url("index.php/profile/address"); ?>" class="list-group-item">Addresses</a></li>
            <li><a href="<?php echo base_url("index.php/profile/account_details"); ?>" class="list-group-item">Account details</a></li>
            <li><a href="<?php echo base_url("index.php/home/logout"); ?>" class="list-group-item">Logout</a></li>
          </ul>
        <?php } else{?><a data-toggle="modal" data-target=".login"  class="navbar-toggle navbar-mobile pull-right"><span class="glyphicon glyphicon-user" aria-hidden="true"> </span></a>
        <?php }?>
      <a href="<?php echo base_url("index.php/cart"); ?>" class="navbar-toggle navbar-mobile pull-right">
        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><span class="badge" id="cartcounter">
          <?php 
            if(!empty($this->session->userdata('uid')))
            {
                $detail1=$this->user->countproduct($this->session->userdata('uid'));
                    if(!empty($detail1))
                      { 
                        echo $detail1; 
                      }
                  else{
                    echo"0";
                    }
            }
            elseif(!empty($this->cart->contents()))
            {
              $i=0;
              $cart = $this->cart->contents();
              foreach($cart as $items)
              {
                $i++;
              }
               echo $i;
            }
            else{echo"0";} ?>
        </span>
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li>
            <a href="<?php echo base_url(''); ?>">
            HOME</a>
          </li>
        <?php 
                $details=$this->user->showcategory();
                foreach ($details as $row ) {
                  $category=str_replace(' ', '-', $row->category);?>
          <li>
            <a href="<?php echo base_url("index.php/product/category/$category"); ?>">
            <?php echo $row->category;?></a>
          </li>
        <?php }?>
            <li>
                <a href="<?php echo base_url(''); ?>">
                BLOG</a>
            </li>
      </ul>
      <ul class="nav navbar-nav navbar-right" style="padding-right: 20px;">
          <!--<li>
              <?php $attributes = array("name" => "search");
                      echo form_open("home/search_keyword", $attributes);?>
              <div class="form-inline" style="padding-top:10px;">
               <div class = "input-group form-inline" style="border-radius:20px !important;">
               <input type = "text" class = "form-control" placeholder="Search" name="keyword" style="border-radius:20px !important;border: solid 1px #000;">
               
               <span class = "input-group-btn">
                  <li><a class = "btn btn-default" type = "submit" style="border-radius:0px !important;">
                     <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                  </a></li>
               </span>
               
            </div>
              </div>
                  <?php echo form_close(); ?>
             </li>-->
        <?php if ($this->session->userdata('fname')){ ?>
        <li class="dropdown">
          <a class=" dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" style="text-transform: capitalize;">
           <?php echo $result = substr($this->session->userdata('fname'), 0, 8); ?> <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url("index.php/profile"); ?>">Profile</a></li>
            <li><a href="<?php echo base_url("index.php/orders"); ?>" class="list-group-item"> Orders</a></li>
            <li><a href="<?php echo base_url("index.php/wishlist"); ?>" class="list-group-item"> Wishlist</a></li>
            <li><a href="<?php echo base_url("index.php/profile/address"); ?>" class="list-group-item">Addresses</a></li>
            <li><a href="<?php echo base_url("index.php/profile/account_details"); ?>" class="list-group-item">Account details</a></li>
            <li><a href="<?php echo base_url("index.php/home/logout"); ?>" class="list-group-item">Logout</a></li>
          </ul>
        </li>
        <?php } else{?>
        <li><a data-toggle="modal" data-target=".login"><img src="<?php echo base_url();?>media/image/user.png " class="img-responsive center-block" style="height: 20px;"></a></li>
        <?php }?>
        <li>
          <a href="<?php echo base_url("index.php/cart"); ?>">
              <img src="<?php echo base_url();?>media/image/cart.png " class="img-responsive center-block" style="height: 20px;">
              <!--<span class="badge" id="cartcounter1">
              <?php 
            if(!empty($this->session->userdata('uid')))
            {
                $detail1=$this->user->countproduct($this->session->userdata('uid'));
                    if(!empty($detail1))
                      { 
                        echo $detail1; 
                      }
                  else{
                    echo"0";
                    }
            }
            elseif(!empty($this->cart->contents()))
            {
              $i=0;
              $cart = $this->cart->contents();
              foreach($cart as $items)
              {
                $i++;
              }
               echo $i;
            }
            else{echo"0";} ?>
              </span>-->
            </a>
          </li>
          <?php if ($this->session->userdata('fname')){ ?>
              <li><a data-toggle="modal" data-target=".login"><img src="<?php echo base_url();?>media/image/like.png " class="img-responsive center-block" style="height: 20px;"></a></li>
          <?php }else{?>
              <li><a href="<?php echo base_url("index.php/wishlist"); ?>"><img src="<?php echo base_url();?>media/image/like.png " class="img-responsive center-block" style="height: 20px;"></a></li>
          <?php }?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

  <!--endheader-->
<div class="modal fade search" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content text-center" style="padding:20px 10px 20px 10px;margin-top:40%;">
    <h3>Search</h3>
     <?php $attributes = array("name" => "search");
                      echo form_open("home/search_keyword", $attributes);?>
               <input type = "text" class = "theme-form" placeholder="Search" name="keyword" ><br>
                  <button class = "theme-btn" type = "submit">
                     Search
                  </button>
                  <?php echo form_close(); ?>
    </div>
  </div>
</div>

<div class="modal fade login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-md" role="document" style="margin-top:10%;">
    <div class="modal-content" style="border:none;">
      	<div class="col-md-8 col-md-offset-2 col-xs-12">
    		<div class="card">
    		<?php $attributes = array("name" => "loginform");
                echo form_open("login/login", $attributes);?>
    		  <div class="form-group">
    		    <label for="exampleInputEmail1">Email</label>
    		    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
    		  </div>
    		  <div class="form-group">
    		    <label for="exampleInputPassword1">Password</label>
    		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
    		  </div>
    		  <button class="theme-btn col-md-12 col-xs-12"> LOGIN</button>
    		<?php echo form_close(); ?>
    		<br><br><br>
    		<h4 class=" "><b>Social Login</b></h4>
                <a href="<?php  
		            $loginURL= $this->google->loginURL();
    		 echo $loginURL;?>" class="btn col-md-6 col-xs-12" style="background-color: #e24825;color: #fff;border-radius:0px;">Google</a>
    		 <a href="<?php  $authUrl=  $this->facebook->login_url();
    		 echo $authUrl;?>" class="btn col-md-6 col-xs-12" style="background-color: #385499;color: #fff;border-radius:0px;">Facebook</a>
    		 <br><br>
    		<h5 style="text-align: center;"><a href="<?php echo base_url();?>index.php/forget"  style="text-decoration:none;">LOST YOUR PASSWORD?</a></h5><hr>
    <h4>Or Create <a href="<?php echo base_url();?>index.php/signup" style="text-decoration:none;">New Account</a></h4>
    </div>
    </div>
    </div>
  </div>
</div>
    