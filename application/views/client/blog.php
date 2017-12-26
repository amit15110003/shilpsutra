<div class="spacer"></div>
<div id="startchange"></div>
<div class="title animated fadeInDown" id="title">
                          Your Blog Title
                </div>
                 
                <div class="container">
                  <ul class="blog-post columns-2">
                    <?php foreach ($query as $row) {
                      ?>
                    <li>
                      <img src="<?php echo base_url();?>uploads/blog/<?php echo $row->image; ?>"/>
                      <h3><?php echo $row->title; ?></h3>
                      <p class="text-justify"><?php echo $row->descr; ?></p>
                      <div class="button">Read More</div>
                    </li><?php 
                  }?>
                  </ul>
                </div>