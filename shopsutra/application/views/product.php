<div class="content-wrapper">
<section class="content">
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
      <div class="box box-primary">
        <?php $attributes = array("name" => "product");
      echo form_open_multipart("admin/product", $attributes);?>
          <div class="box-body">
            <div class="form-group">
              <label for="">Title</label>
                <input type="text" class="form-control"  name="title" required>
              </div>
              <div class="form-group">
              <label for="">Cost</label>
                <input type="text" class="form-control"  name="cost" required>
              </div>
              <div class="form-group">
              <label for="">Description</label>
                 <textarea class="form-control" rows="3" name="descr" required></textarea>
              </div>
              <div class="form-group">
                <label>Category</label>
                <select class="form-control select2" style="width: 100%;" name="category">
                <?php
              foreach( $query as $row)
                {?>
                  <option value="<?php echo $row->category; ?>" ><?php echo $row->category; ?></option>
                   <?php }?>
                </select>
              </div>
              <div class="form-group">
                <label for="sehir">Tag</label>
                <select id="dates-field2" class="multiselect-ui form-control" multiple="multiple" name="tag[]">
                  <?php
              foreach( $query4 as $row)
                {?>
                    <option value="<?php echo $row->tag;?>"><?php echo $row->tag; ?></option>
                    <?php }?>
                </select>
              </div>
              <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile" name="picture">
                </div>
              </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" name="submit" value="Upload">Submit</button>
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
                  <th>Title</th>
                </tr>
                </thead>
                <tbody>
                <?php
        foreach( $query2 as $row)
          {?>
                <tr>
                  <td><?php echo $row->title; ?> </td>
                  <td><a  class="btn btn-primary" href="<?php echo base_url().'index.php/admin/Deletelibrary/'.$row->id; ?>">delete</a></td>
                  <td><a  class="btn btn-primary" href="<?php echo base_url().'index.php/admin/productedit/'.$row->id; ?>">Edit</a></td>
                </tr>
                 <?php }?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </section>


          <script src="<?php echo base_url('media/plugins/select2/select2.full.min.js'); ?>"></script>
<script src="<?php echo base_url('media/plugins/input-mask/jquery.inputmask.js'); ?>"></script>
<script src="<?php echo base_url('media/plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"></script>
<script src="<?php echo base_url('media/plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>
<!-- date-range-picker -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();


  


    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    
  });
</script>

<script type="text/javascript">
 
$('select[name=category]').on('change', function(){
  
  var categoryN = $(this).val(); 
  $('select[name=scategory]').find('option:not([value^='+ categoryN +'])').remove();
  
});

</script>
