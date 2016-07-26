<!DOCTYPE html>
<html lang="en">
<head>
  <title>Solid Citra Konstruksi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="<?php echo base_url() ?>asset/admin/css/bootstrap.min.css" rel="stylesheet">

  <script src="<?php echo base_url() ?>asset/jquery.js"></script>
    <script src="<?php echo base_url() ?>asset/admin/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    body {
      position: relative; 
  }
  .affix {
      top:0;
      width: 100%;
      z-index: 9999 !important;
  }
  .navbar {
      margin-bottom: 0px;
  }

     .jumbotron {
      margin-bottom: 0;
    }
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

    .affix {
      top: 0;
      width: 100%;
  }

  .affix + .container-fluid {
      padding-top: 70px;
  }
   .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
  }
 
  </style>

  <script type="text/javascript">
    function load() {
      $("#loading").hide();
    }
  </script>
</head>
<body onload="load()"  data-spy="scroll" data-target=".navbar" data-offset="50">

   <?php echo $_top_menu;?> 




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



<br>
<div class="container-fluid">
  <div class="row content">

   

      <div class="col-sm-9" style="min-height: 500px;">
          <?php echo $_content;?> 

      </div>
      
    <div class="col-sm-3 sidenav">
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Product Terbaru</a></li>
          <?php 
            foreach ($samping_produk->result_array() AS $sam_prod) {
              $ex_foto=explode(".", $sam_prod['foto']);
              $jml  =count($ex_foto)-1;
              $nama1="";
              for ($i=0; $i <=$jml ; $i++) { 
                if ($i==0) {
                  $nama1=$ex_foto[0];
                }elseif ($i<$jml) {
                  $nama1=$nama1.".".$ex_foto[$i];
                }else{
                  $nama1=$nama1."_thumb.".$ex_foto[$i];
                }
              }
                     ?>
              <a href="<?php echo base_url() ?>solid/detail_produk/<?php echo $sam_prod['id_produk']; ?>">
                  <div class="thumbnail">
                      <p style="text-align: center;margin-top: 0px;" class="btn-warning">
                          <b><?php echo $sam_prod['judul']; ?></b>
                      </p>
                      <img src="<?php echo base_url() ?>cdn/uploads/thumb/<?php echo $nama1; ?>">
                  </div>
              </a>
             <?php
            }
          ?>
      </ul>

      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Model Rumah Terbaru</a></li>
          <?php 
            foreach ($samping_model->result_array() AS $sam_mod) {
              $ex_foto=explode(".", $sam_mod['foto']);
              $jml  =count($ex_foto)-1;
              $nama2="";
              for ($i=0; $i <=$jml ; $i++) { 
                if ($i==0) {
                  $nama2=$ex_foto[0];
                }elseif ($i<$jml) {
                  $nama2=$nama2.".".$ex_foto[$i];
                }else{
                  $nama2=$nama2."_thumb.".$ex_foto[$i];
                }
              }
                     ?>
              <a href="<?php echo base_url() ?>solid/detail_model/<?php echo $sam_mod['id_model']; ?>">
                  <div class="thumbnail">
                      <p style="text-align: center;margin-top: 0px;" class="btn-warning">
                          <b><?php echo $sam_mod['nama_model']; ?></b>
                      </p>
                      <img src="<?php echo base_url() ?>cdn/uploads/thumb/<?php echo $nama2; ?>">
                  </div>
              </a>
             <?php
            }
          ?>
      </ul>



       <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Article</a></li>
          <?php 
            foreach ($samping_artikel->result_array() AS $sam_ar) {
              $ex_foto=explode(".", $sam_ar['foto']);
              $jml  =count($ex_foto)-1;
              $nama3="";
              for ($i=0; $i <=$jml ; $i++) { 
                if ($i==0) {
                  $nama3=$ex_foto[0];
                }elseif ($i<$jml) {
                  $nama3=$nama3.".".$ex_foto[$i];
                }else{
                  $nama3=$nama3."_thumb.".$ex_foto[$i];
                }
              }
                     ?>
              <a href="<?php echo base_url() ?>solid/detail_artikel/<?php echo $sam_ar['id_artikel']; ?>">
                  <div class="thumbnail">
                      <p style="text-align: center;margin-top: 0px;" class="btn-warning">
                          <b><?php echo $sam_ar['judul']; ?></b>
                      </p>
                      <img src="<?php echo base_url() ?>cdn/uploads/thumb/<?php echo $nama3; ?>">
                  </div>
              </a>
             <?php
            }
          ?>
      </ul>
    </div>
  </div>
</div>
 


<br><br>

<footer class="container-fluid text-center">
  <?php 
    foreach ($profil->result_array() AS $data_profil) {
        ?>
          <p><b><?php echo $data_profil['nama']; ?></b><br>
              <?php echo $data_profil['alamat']; ?><br>
              Email : <?php echo $data_profil['email']; ?> , Telp : <?php echo $data_profil['telp']; ?>
          </p>
        <?php
    }
  ?>  
 
</footer>

</body>
</html>
