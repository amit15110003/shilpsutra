<div class="content-wrapper">
<section class="content">
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
      <div class="box box-primary">
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label for="">Font Color</label>
                <input type="text" class="form-control"  name="color">
            </div>
            <div class="form-group">
              <label for="">Header</label>
                <input type="text" class="form-control"  name="h1">
            </div>
            <div class="form-group">
              <label for="">Sub Header</label>
                <input type="text" class="form-control"  name="h2">
            </div>
            <div class="form-group">
              <label for="">Address</label>
                <input type="text" class="form-control"  name="address">
            </div>
            <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile" name="picture">
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" class="btn btn-default" name="userSubmit" value="Add">Submit</button>
            </div>
          </div>
          </div>
          </div>
         <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>category</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
        foreach( $query as $row)
          {?>
                <tr>
                  <td><?php echo $row->h1; ?> </td><td><?php echo $row->h2; ?> </td>
                  <td><a  class="btn btn-primary" href="<?php echo base_url().'index.php/admin/Deleteslider/'.$row->id; ?>">delet</a></td>
                </tr>
                 <?php }?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </section>