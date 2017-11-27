<div class="content-wrapper">
<section class="content" style="padding-top: 100px;">
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
      <div class="box box-primary">
        <?php $attributes = array("name" => "Size-kids");
      echo form_open("admin/sizek", $attributes);?>
            <div class="box-body">
              <div class="form-group">
                <label for="">Size-Kids</label>
                  <input type="text" class="form-control"  name="sizek">
              </div>
              <div class="form-group">
                <label for="">Description</label>
                  <input type="text" class="form-control"  name="descr">
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
          <?php echo form_close(); ?>
          <?php echo $this->session->flashdata('msg'); ?>
          </div>
          </div>
          </div>
         <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Size-Kids</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
        foreach( $query as $row)
          {?>
                <tr>
                  <td><?php echo $row->sizek; ?> </td>
                  <td><?php echo $row->descr; ?> </td>
                  <td><a  class="btn btn-primary" href="<?php echo base_url().'index.php/admin/Deletesizek/'.$row->id; ?>">delete</a></td>
                </tr>
                 <?php }?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </section>