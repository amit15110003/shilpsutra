<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin| Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('media/bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('media/plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('media/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('media/dist/css/skins/_all-skins.min.css'); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('media/plugins/datatables/dataTables.bootstrap.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('media/plugins/select2/select2.min.css'); ?>">
  <!-- jQuery 2.2.0 -->
<script src="<?php echo base_url('media/plugins/jQuery/jQuery-2.2.0.min.js'); ?>"></script>


  </head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url("index.php/admin"); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SHILP</b>SHUTRA</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SHILP</b>SHUTRA</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('media/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">

                <p>
                  <b>SHILP</b>SHUTRA
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo base_url("index.php/home/logout"); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Client's Details</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('index.php/admin/client'); ?>"><i class="fa fa-circle-o"></i>Users</a></li>
             <li><a href="<?php echo base_url('index.php/admin/subscriber'); ?>"><i class="fa fa-circle-o"></i>subscriber</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url('index.php/admin/product'); ?>">
            <i class="fa fa-th"></i> <span>Product</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('index.php/admin/viewproduct'); ?>">
            <i class="fa fa-th"></i> <span>View Product</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Add Fields</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('index.php/admin/category'); ?>"><i class="fa fa-circle-o"></i> Category</a></li>
            <li><a href="<?php echo base_url('index.php/admin/size'); ?>"><i class="fa fa-circle-o"></i>Size</a></li>
            <li><a href="<?php echo base_url('index.php/admin/sizek'); ?>"><i class="fa fa-circle-o"></i>Size-Kids</a></li>
            <li><a href="<?php echo base_url('index.php/admin/type'); ?>"><i class="fa fa-circle-o"></i> Color</a></li>
            <li><a href="<?php echo base_url('index.php/admin/tag'); ?>"><i class="fa fa-circle-o"></i> Tag</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url('index.php/admin/order'); ?>">
            <i class="fa fa-th"></i> <span>Order</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('index.php/admin/blog'); ?>">
            <i class="fa fa-th"></i> <span>Blog</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>       