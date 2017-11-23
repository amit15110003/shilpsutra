<div class="content-wrapper">
<section class="content" style="padding-top: 100px;">
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
      <div class="box box-primary">
        <?php $attributes = array("name" => "attributevalue");
      echo form_open("admin/tag", $attributes);?>
            <div class="box-body">
              <div class="form-group">
                  <label>Category</label>
                 <select class="form-control select2" style="width: 100%;" name="category">
                <?php
                $details=$this->user->showcategory();
              foreach( $details as $row)
                {?>
                  <option value="<?php echo $row->category; ?>" ><?php echo $row->category; ?></option>
                   <?php }?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Tag</label>
                  <input type="text" class="form-control"  name="tag">
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
                  <th>Tag Name</th>
                  <th>Category</th>
                </tr>
                </thead>
                <tbody>
                <?php
        foreach( $query as $row)
          {?>
                <tr>
                  <td><?php echo $row->tag; ?> </td>
                  <td><?php echo $row->category; ?> </td>
                  <td><a  class="btn btn-primary" href="<?php echo base_url().'index.php/admin/Deletetag/'.$row->id; ?>">delete</a></td>
                </tr>
                 <?php }?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </section>