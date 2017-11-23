<div class="content-wrapper">
<section class="content">
      <div class="col-md-6">
                    <?php $attributes = array("name" => "search");
                      echo form_open("admin/viewproduct", $attributes);?>
                    <div class="form-group">
                      <label class="rd-navbar-search-form-input">
                        <input type="text" class="form-control"  name = "keyword" placeholder="Search" required>
                      </label>
                      <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                  <?php echo form_close(); ?>
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
        foreach( $query as $row)
          {?>
                <tr>
                  <td><?php echo $row->title; ?> </td>
                  <td><?php echo $row->category; ?> </td>
                  <td><?php $time = $row->posted;
                          $time = date('g:i A, dS M Y', strtotime($time));
                        echo $time; ?> </td>
                  <td><a  class="btn btn-primary" href="<?php echo base_url().'index.php/admin/Deletelibrary/'.$row->id; ?>">delete</a></td>
                   <td>
                   <?php if($row->status=='pending'){?><a  class="btn btn-primary" href="<?php echo base_url().'index.php/admin/status/'.$row->id; ?>"><?php echo $row->status; ?></a><?php } else{?><a  class="btn btn-primary" href="<?php echo base_url().'index.php/admin/status1/'.$row->id; ?>"><?php echo $row->status; ?></a><?php }?></td>
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
