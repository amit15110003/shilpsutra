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
                 <td><a  class="btn btn-primary" href="<?php echo base_url().'index.php/admin/attributevalue/'.$row->id; ?>">Attribute</a></td>
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

