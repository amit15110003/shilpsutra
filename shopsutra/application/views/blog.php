<div class="content-wrapper">
<section class="content">
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
      <div class="box box-primary">
        <?php $attributes = array("name" => "blog");
      echo form_open_multipart("admin/blog", $attributes);?>
          <div class="box-body">
            <div class="form-group">
              <label for="">Title</label>
                <input type="text" class="form-control"  name="title" required>
              </div>
              <div class="form-group">
              <label for="">Short Description</label>
                <input type="text" class="form-control"  name="sdescr" required>
              </div>
              <div class="form-group">
              <label for="">Description</label>
                 <textarea class="form-control" rows="3" name="descr" required></textarea>
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

         <!--<div class="box-body">
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
                  <td><a  class="btn btn-primary" href="<?php echo base_url().'index.php/admin/attributevalue/'.$row->id; ?>">Attribute</a></td>
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
</div>

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
