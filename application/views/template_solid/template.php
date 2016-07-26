<?php 
?>
  <h3 style="color: red" align="center">WEBSITE UNDER CONSTRACTION</h3>
<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Solid Konstruksi</title>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">


    <meta content="GrayGrids" name="author">
    <link href="<?php echo base_url() ?>asset/pengunjung/css/bootstrap.min.css" madia="screen" rel="stylesheet" type=
    "text/css">
    <link href="<?php echo base_url() ?>asset/pengunjung/fonts/font-awesome.min.css" madia="screen" rel="stylesheet"
    type="text/css">
    <link href="<?php echo base_url() ?>asset/pengunjung/fonts/intimate-fonts.css" madia="screen" rel="stylesheet" type=
    "text/css">
    <link href="<?php echo base_url() ?>asset/pengunjung/css/main.css" madia="screen" rel="stylesheet" type="text/css">
    
    <script src="<?php echo base_url() ?>asset/jquery.js"></script>
     <script src="<?php echo base_url() ?>asset/admin/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url() ?>asset/jR3DCarousel.min.js"></script>
     
      <link href="<?php echo base_url() ?>asset/gambar/lsb.css" rel="stylesheet">
      <script src="<?php echo base_url() ?>asset/gambar/lsb.min.js"></script>
      <script type="text/javascript">
          var jq = $.noConflict();
          jq(window).load(function() {
            jq.fn.lightspeedBox();
          });


          jq(document).ready(function () {
                jq(document).ajaxStart(function () {
                    jq("#loading").show();
                    jq("#isi").hide();
                }).ajaxStop(function () {
                    jq("#loading").hide();
                    jq("#isi").show();
                });
            });
      </script>

   <script type="text/javascript">
    function load() {
      jq("#loading").hide();
    }
  </script>

</head>
<body onload="load()">
  <div id="loading" style="text-align: center;margin: 10px;padding: 10px;">
            <img src="<?php echo base_url() ?>/asset/img/loading.gif" style="width: 200px;height: 200px;">
  </div>
<div id="isi">

    <header class="site-header">
<?php echo $_top_menu;?>
    </header>


    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
            

   <?php echo $_content;?>        

                </div>





                 <div class="col-md-4">
                    <div class="sidebar">
                        <div class="entry-widget">
                            <div class="widget-profile">
                               
                                <div class="info">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                '
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-inner text-center">
                     
                   
                        <div class="copyright">
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
 

              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- Footer End -->
    <!-- js  -->
</div>
</body>
</html>