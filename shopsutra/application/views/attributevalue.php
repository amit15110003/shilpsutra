<div class="content-wrapper">
<section class="content" style="padding-top: 100px;">
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
      <div class="box box-primary">
        <?php $attributes = array("name" => "attributevalue");
      echo form_open("admin/attributevalue", $attributes);?>
            <div class="box-body">
              <div class="form-group">
                  <label>Attribute</label>
                  <select class="form-control select2" style="width: 100%;" name="attribute">
                  <?php
                  $details=$this->user->showattribute();
                foreach( $details as $row)
                  {?>
                    <option value="<?php echo $row->attribute; ?>" ><?php echo $row->attribute; ?></option>
                     <?php }?>
                  </select>
              </div>
              <div class="form-group">
                <label for="">Attribute Value</label>
                  <input type="text" class="form-control"  name="attributevalue">
              </div>
              <div class="form-group">
                <label for="">Attribute Cost</label>
                  <input type="text" class="form-control"  name="cost">
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
                  <th>Attributevalue</th>
                  <th>Attribute</th>
                  <th>Cost</th>
                </tr>
                </thead>
                <tbody>
                <?php
        foreach( $query as $row)
          {?>
                <tr>
                  <td><?php echo $row->attributevalue; ?> </td>
                  <td><?php echo $row->attribute; ?> </td>
                  <td><?php echo $row->cost; ?> </td>
                  <td><a  class="btn btn-primary" href="<?php echo base_url().'index.php/admin/Deleteattributevalue/'.$row->id; ?>">delete</a></td>
                </tr>
                 <?php }?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </section>