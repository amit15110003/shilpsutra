<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
        <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Order Id</th>
                  <th>Status</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
        foreach( $query as $row)
          {?>
                <tr>
                  <td><?php echo $row->orderid; ?></td>
                  <td><?php echo $row->status; ?></td>
                  <td><a  class="btn btn-primary" href="<?php echo base_url().'index.php/admin/orderview/'.$row->orderid; ?>">proceed</a></td>
                  <td><a  class="btn btn-primary" href="<?php echo base_url().'index.php/admin/orderview/'.$row->orderid; ?>">View</a> <a  class="btn btn-primary" href="<?php echo base_url().'index.php/admin/order/'.$row->orderid; ?>">Print</a></td>
                </tr>
                 <?php }?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
     
    </section>

    
  </div>