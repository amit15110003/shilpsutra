<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

<link rel="stylesheet" href="<?php echo base_url('media/bootstrap/css/bootstrap.min.css'); ?>" type="text/css" media="screen">

<link rel="stylesheet" href="<?php echo base_url('media/bootstrap/css/bootstrap.min.css'); ?>" type="text/css" media="print">

<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style type="text/css" media="print, handheld">
    @import "<?php echo base_url('media/bootstrap/css/bootstrap.min.css'); ?>";
</style>
  </head>
  <body>
           <section class="content content_content" style="width: 70%; margin: auto;">
                    <section class="invoice">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12">
                            <h2 class="page-header">
                                <img src="<?php echo base_url(); ?>media/images/logosm.png" height="60" alt="">
                                    <small class="pull-right">Date: 2017/01/09</small>
                                </h2>
                            </div><!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-xs-12 table-responsive">
                            <table class="table">
                            <thead>
                            <tr >
                                <th >
                                From
                                <address>
                                     <?php $details= $this->user->get_deliveryadd_by_id($uid); ?> 
                                    <strong style="text-transform: capitalize;"><?php echo $details[0]->fname;?> <?php echo $details[0]->lname;?></strong>
                                    <br>
                                    Address:
                                    <?php echo $details[0]->addr;?><br>
                                    <?php echo $details[0]->town;?><br>
                                    <?php echo $details[0]->state;?>,<?php echo $details[0]->pin;?><br>
                                    Phone:
                                    <?php echo $details[0]->mob;?>                               </address>
                                    <?php ?>
                                    </th>
                                <th>
                                To
                                <address>
                                    <?php $details= $this->user->get_deliveryadd_by_id($uid); ?> 
                                    <strong style="text-transform: capitalize;"><?php echo $details[0]->fname;?> <?php echo $details[0]->lname;?></strong>
                                    <br>
                                    Address:
                                    <?php echo $details[0]->addr;?><br>
                                    <?php echo $details[0]->town;?><br>
                                    <?php echo $details[0]->state;?>,<?php echo $details[0]->pin;?><br>
                                    Phone:
                                    <?php echo $details[0]->mob;?>                               </address>
                                    <?php ?>
                                </th>
                                <th>
                                <b>Invoice #007612</b><br>
                                <br>
                                <b>Order ID:</b> 4F3S8J<br>
                                <b>Payment Due:</b> 2/22/2014<br>
                                <b>Account:</b> 968-34567<br><br><br>
                                </th>
                            </tr>
                            </thead>
                            </table><br> </div>
                        </div><!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Product</th>
                                            <th>Qty</th>
                                             <th>Price</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      foreach( $query as $row)
                                      {$details=$this->user->get_product_id($row->productid);?>
                                                                                <tr>
                                            <td class="product-thumbnail"><a  class="reveal-inline-block"><img src="<?php echo base_url(); ?>../uploads/<?php echo $details[0]->picture; ?>" width="100" height="100" alt=""></a></td>
                                            <td style="text-transform: capitalize;"><?php  echo $details[0]->title;?></td>
                                            <td><?php echo $row->item; ?></td>
                                            <td>$ <?php  echo $details[0]->cost;?></td>
                                            <td>$ <?php  echo $details[0]->cost*$row->item; ?></td>
                                        </tr>
                                      <?php }?>                                      </tbody>
                                </table>
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            
                                            
                                            <tr>
                                                <td></td>
                                                <td>Total:</td>
                                                <td>$ <?php $i=0;
                   foreach ($query as $row ) {
                  $details=$this->user->get_product_id($row->productid);
                   $i=$i+($details[0]->cost*$row->item);}
                   echo $i;?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </section>

  </body>
</html>     