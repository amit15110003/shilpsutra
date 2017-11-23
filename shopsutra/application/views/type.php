<div class="content-wrapper">
<section class="content">
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
      <div class="box box-primary">
              <?php $attributes = array("name" => "type");
      echo form_open("admin/type", $attributes);?>
            <div class="box-body">
            <div class="form-group">
              <label for="">Color</label>
                <input type="text" class="form-control"  name="color">
              </div>
            <div class="form-group">
              <label for="">Color Code</label>
                <input type="text" class="form-control"  name="code">
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
                  <th>Type</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
        foreach( $query as $row)
          {?>
                <tr>
                  <td><?php echo $row->color; ?> </td>
                  <td><a  class="btn btn-primary" href="<?php echo base_url().'index.php/admin/Deletetype/'.$row->id; ?>">delet</a></td>
                </tr>
                 <?php }?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </section>