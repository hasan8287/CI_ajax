
<div class="container-fluid" style="margin:0px;padding: 0px;">
 <div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
    <?php 
    $i=0;
    foreach ($detail_album->result_array()  AS $data_slide) {
      if ($i==0) {
        ?>
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <?php
      }else{
        ?>
          <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>"></li>
        <?php
      }
      $i++;
    }
    
    ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox"> 
    <?php 
    $o=0;
    foreach ($detail_album->result_array()  AS $data_slide) {
      if ($o==0) { ?>
        <div class="item active">
          <img src="<?php echo base_url() ?>cdn/uploads/<?php echo $data_slide['foto']; ?>" alt="<?php echo $data_slide['judul']; ?>" 
           style="max-height: 450px;">
          <div class="carousel-caption">
            <h3><?php echo $data_slide['judul']; ?></h3>
          </div>
        </div>
      <?php }else{
        ?>
        <div class="item">
          <img src="<?php echo base_url() ?>cdn/uploads/<?php echo $data_slide['foto']; ?>" alt="<?php echo $data_slide['judul']; ?>"
           style="max-height: 450px;">
          <div class="carousel-caption">
            <h3><?php echo $data_slide['judul']; ?></h3>
          </div>
        </div>
        <?php
      }
    $o++;
     }
    ?>

    </div>

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

</div>
