<?php 
/*
?>
	<h3 style="color: red" align="center">WEBSITE UNDER CONSTRACTION</h3>
<?php
*/
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
        jq("#contentku").hide();
    }).ajaxStop(function () {
    jq("#loading").hide();
        jq("#contentku").show();    
    });
});
function cari(batas,hal) {
    var kota=jq('#kota').val();
    var harga_awal=toAngka(jq('#harga_awal').val());
    var harga_akhir=toAngka(jq('#harga_akhir').val());
    var kata_kunci=jq('#kata_kunci').val();
    var jenis=jq('#jenis').val();
    jq.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>solid/pencarian",
        data: {"kota":kota
        ,"harga_awal":harga_awal,"harga_akhir":harga_akhir,"kata_kunci":kata_kunci,"jenis":jenis,"batas":batas,"hal":hal},
        success: function(resp){
            jq('#hasil_cari').html(resp);
        },
        error:function(event, textStatus, errorThrown) {
            alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
        }
    });
}
function load() {
    jq("#loading").hide();
}
function toAngka(rp){
    return parseInt(rp.replace(/,.*|\D/g,''),10) 
}
function toRp(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return rev2.split('').reverse().join('');
}
function rup1() {
    var nominal= document.getElementById("harga_awal").value;
    var nominal2=toAngka(nominal);
    ripaihnya=toRp(nominal2);
    document.getElementById("harga_awal").value = ripaihnya;
}
function rup2() {
    var nominal= document.getElementById("harga_akhir").value;
    var nominal2=toAngka(nominal);
    ripaihnya=toRp(nominal2);
    document.getElementById("harga_akhir").value = ripaihnya;   
}
</script>
</head>
<body onload="cari(5,1)">
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
                        <div class="panel-primary">
                                        <div class="panel-heading" style="text-align: center;">
                                        <b >Perumahan Terbaru</b>
                                        </div>
                                 <div class="info">
                  

                                        <?php 
                                        foreach ($samping_produk->result_array() AS $sam_prod) {
                                          $url_per=str_replace(' ', '-',$sam_prod['judul']);
                                          $url_per='perumahan-'.$url_per.'-'.$sam_prod['id_produk'].'.html';

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

                                          if (empty($nama1) || $nama1=='') {
                                              $nama1='error.jpg';
                                          }
                                                 ?>
                                      

                              
                              
                                          <a href="<?php echo base_url() ?><?php echo $url_per; ?>">
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

                                </div>
                                
							                      <div class="panel-footer">
                                  
                                </div>
                                </div> 

                                
                                     <div class="panel-primary">
                                        <div class="panel-heading" style="text-align: center;">
                                        <b >Model Terbaru</b>
                                        </div>
                                
                                <div class="info">               
							            <?php 
								            foreach ($samping_model->result_array() AS $sam_mod) {
                              $url_model=str_replace(' ', '-',$sam_mod['nama_model']);
                              $url_model='detail-'.$url_model.'-'.$sam_mod['id_model'].'.html';
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
                                              if (empty($nama2) || $nama2=='') {
                                                  $nama2='error.jpg';
                                              }
    								                     ?>

								          
								              <a href="<?php echo base_url() ?><?php echo $url_model; ?>">
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
                                </div>
                                <div class="panel-footer">
                                  
                                </div>
                                </div>
                          <div class="panel-primary">
                                        <div class="panel-heading" style="text-align: center;">
                                        <b >Article Terbaru</b>
                                        </div>
                               
                                <div class="info">
                                       
								        <?php 
							            foreach ($samping_artikel->result_array() AS $sam_ar) {
                            $url_ar=str_replace(' ', '-',$sam_ar['judul']);
                            $url_ar='article-'.$url_ar.'-'.$sam_ar['id_artikel'].'.html';
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
                                          if (empty($nama3) || $nama3=='') {
                                              $nama3='error.jpg';
                                          }
							             ?>
							               
							              <a href="<?php echo base_url() ?><?php echo $url_ar; ?>">
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
                        <div class="panel-footer">
                          
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
                    
                        <div class="copyright" style="text-align: center;">
                        <p>
                            <a href="https://www.facebook.com/perumahan.qurani?fref=ts" target="_blank">
                                <img src="<?php echo base_url() ?>cdn/uploads/fb.PNG" style="width: 35px;height: 30px;">
                            </a>
                            <a href="https://www.linkedin.com/in/ichsan-wahyudi-2974a456" target="_blank">
                                <img src="<?php echo base_url() ?>cdn/uploads/ln.PNG" style="width: 35px;height: 30px;">
                            </a>
                        </p>
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
    </footer><!-- Footer End -->
    <!-- js  -->

</body>
</html>