<div class="content-wrapper">
<section class="content" style="padding-top: 100px;">
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
      <div class="box box-primary">
        <?php $attributes = array("name" => "attributevalue");
      echo form_open("admin/attributevalue/$pid", $attributes);?>
            <div class="box-body">
               <div class="form-group">
              <label for="">Produtid</label>
                <input type="hidden" class="form-control"  name="productid" value="<?php echo $pid; ?>" required>
              </div>
               <div class="form-group">
                <label for="sehir">Size</label>
                <select id="dates-field2" class="multiselect-ui form-control" multiple="multiple" name="size[]">
                  <?php
              foreach( $query3 as $row)
                {?>
                    <option value="<?php echo $row->size;?>"><?php echo $row->size; ?></option>
                    <?php }?>
                </select>
              </div>
              <div class="form-group">
                <label for="sehir">Size-kids</label>
                <select id="dates-field2" class="multiselect-ui form-control" multiple="multiple" name="sizek[]">
                  <?php
              foreach( $query5 as $row)
                {?>
                    <option value="<?php echo $row->sizek;?>"><?php echo $row->sizek; ?></option>
                    <?php }?>
                </select>
              </div>
              <div class="form-group">
                <label for="sehir">color</label>
                <select id="dates-field2" class="multiselect-ui form-control" multiple="multiple" name="color[]" required>
                  <?php
              foreach( $query6 as $row)
                {?>
                    <option value="<?php echo $row->color;?>"><?php echo $row->color; ?></option>
                    <?php }?>
                </select>
              </div>
              <div class="form-group">
              <label for="">Quantity</label>
                <input type="number" class="form-control"  name="qty" required>
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
                  <th>Attention Reset all the combination: <a  class="btn btn-primary btn-danger" onclick="javascript:reset(<?php echo $pid;?>);">Reset</a></th>
                </tr>
                <tr>
                  <th>Product Id</th>
                  <th>Size</th>
                  <th>Color</th>
                  <th>Quantity</th>
                </tr>
                </thead>
                <tbody>
                <?php
        foreach( $query1 as $row)
          {?>
                <tr>
                  <td><?php echo $row->productid; ?> </td>
                  <td><?php echo $row->size; ?> </td>
                  <td><?php echo $row->color; ?> </td>
                  <td><input id="qty_<?php echo $row->id; ?>" value="<?php echo $row->qty; ?>" onchange="javascript:qty(<?php echo $row->id;?>);"><p id="msg_<?php echo $row->id; ?>"></p></td>
                </tr>
                 <?php }?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </section>
<script type="text/javascript">
    function qty(id)
    {       
            var item = $("#qty_"+id).val();
            $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('Admin/updateqty');?>",
                    data: {id: id, item: item},
                    success: function (response) {
                      document.getElementById("msg_"+id).innerHTML="Successfully Updated";
                    }
                });
    }
  </script>
  <script type="text/javascript">
    function reset(id)
    {       
            confirm("Do you want to reset it?");
            $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('Admin/attributevaluereset');?>",
                    data: {id: id},
                    success: function (response) {
                      location.reload();
                    }
                });
    }
  </script>