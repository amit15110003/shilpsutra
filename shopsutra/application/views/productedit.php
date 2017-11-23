<div class="content-wrapper">
<section class="content">
      <div class="col-md-6 col-md-offset-3">
      <div class="box box-primary">
        <?php $attributes = array("name" => "product");
      echo form_open_multipart("admin/updateproduct", $attributes);?>
          <div class="box-body">
          <div class="form-group">
                <input type="hidden" class="form-control"  name="productid" required value="<?php echo $productid;?>">
              </div>
            <div class="form-group">
              <label for="">Title</label>
                <input type="text" class="form-control"  name="title" required value="<?php echo $title;?>">
              </div>
              <div class="form-group">
              <label for="">Description</label>
                 <textarea class="form-control" rows="3" name="descr" required ><?php echo $Descr;?></textarea>
              </div>
              <div class="form-group">
                <label>Category</label>
                <select class="form-control select2" style="width: 100%;" name="category">
                  <option value="<?php echo $category; ?>" selected><?php echo $category; ?></option>
                <?php
              foreach( $query as $row)
                {?>
                  <option value="<?php echo $row->category; ?>" ><?php echo $row->category; ?></option>
                   <?php }?>
                </select>
              </div>
              </div>
              <div class="form-group">
                <label for="sehir">Tag</label>
                  <select id="dates-field2" class="multiselect-ui form-control" multiple="multiple" name="tag[]">
                    <option value="<?php echo $tag;?>" selected><?php echo $tag; ?></option>
                  <?php
              foreach( $query4 as $row)
                {?>
                    <option value="<?php echo $row->tag;?>"><?php echo $row->tag; ?>-<?php echo $row->category; ?></option>
                    <?php }?>
                </select>
              </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" name="submit" value="Upload">Submit</button>
            </div>
          <?php echo form_close(); ?>
          <?php echo $this->session->flashdata('msg'); ?>
          </div>
          </div>
      <div class="row">
      <div class="col-md-12">
      <?php foreach($query2 as $row){?>
      <div class="col-md-3 ">
      <img src="<?php echo base_url(); ?>../uploads/productthumbs/<?php echo $row->img; ?>">
      </div>
      <?php }?>
      <div class="row" style="margin-top: 40px;">
      <div class="col-md-6 col-md-offset-3">
      <div class="box box-primary">
        <?php $attributes = array("name" => "product");
      echo form_open_multipart("admin/productedit", $attributes);?>
          <div class="box-body">
          <input value="<?php echo $productid; ?>" id="first_name" type="hidden" class="validate" name="id">
              <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile" name="picture">
                </div>
              </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" class="btn btn-default" name="userSubmit" value="Add">Submit</button>
            </div>
          <?php echo form_close(); ?>
          <?php echo $this->session->flashdata('msg'); ?>
          </div>
          </div>
          </div>

         
          </section>


          <script src="<?php echo base_url('media/plugins/select2/select2.full.min.js'); ?>"></script>
          
          <!-- InputMask -->
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
