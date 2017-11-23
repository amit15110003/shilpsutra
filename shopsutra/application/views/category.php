<div class="content-wrapper">
<section class="content">
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
      <div class="box box-primary">
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label for="">Category</label>
                <input type="text" class="form-control"  name="category">
            </div>
            <div class="form-group">
              <label for="">Category Description</label>
                <input type="text" class="form-control"  name="descr">
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
                  <td><?php echo $row->category; ?> </td>
                  <td><a  class="btn btn-primary" href="<?php echo base_url().'index.php/admin/Deletecategory/'.$row->id; ?>">delet</a></td>
                </tr>
                 <?php }?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </section>