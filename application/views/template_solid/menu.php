

<nav  class="navbar navbar-default navbar-intimate role="
        data-offset-top="50" data-spy="affix">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>

    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar" style="border-bottom: solid #EAF6E1 2px; ">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url() ?>cdn/uploads/logo.png" style='width: 200px;'></a></li>
          <li ><a href="<?php echo base_url(); ?>solid" >Home</a></li>

  

<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
Products<span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="<?php echo base_url() ?>daftar_perumahan/1">Perumahan</a></li>
    <li><a href="<?php echo base_url() ?>daftar_model/1">Model Rumah Tersedia</a></li>
    <li><a href="<?php echo base_url() ?>daftar_model_lainya/1">Model Rumah Lainya</a></li>
  </ul>
</li>


<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
Media<span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="<?php echo base_url() ?>foto/1">Foto</a></li>
    <li><a href="<?php echo base_url() ?>album/1">Album</a></li>
  </ul>
</li>
 
<li ><a href="<?php echo base_url(); ?>article/1" >Article</a></li>

<?php 
foreach ($menu->result_array() AS $data_menu) {
$url_menu1="";
if ($data_menu['jenis']=='artikel') {
  $url=str_replace(' ', '-',$data_menu['nama_menu']);
 # $url_menu1='detail_artikel';
  $url_menu1='article-'.$url.'-'.$data_menu['id_tampil'].'.html';
}elseif ($data_menu['jenis']=='produk') {
  $url=str_replace(' ', '-',$data_menu['nama_menu']);
 # $url_menu1='detail_produk';
  $url_menu1='perumahan-'.$url.'-'.$data_menu['id_tampil'].'.html';
}elseif ($data_menu['jenis']=='model') {
  $url=str_replace(' ', '-',$data_menu['nama_menu']);
 # $url_menu1='detail_model';
  $url_menu1='detail-'.$url.'-'.$data_menu['id_tampil'].'.html';
}
?>

<li class="dropdown">

<?php
$jml_menu=0;
foreach ($menu2->result_array() AS $data_menu2) {
  if ($data_menu2['menu_utama']==$data_menu['id_menu']) {
      $jml_menu=$jml_menu+1;
  }
}
if ($jml_menu>0) {
  ?><a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <?php echo $data_menu['nama_menu']; ?><span class="caret"></span></a><?php
}else{
  ?><a href="<?php echo base_url() ?><?php echo $url_menu1; ?>">
                    <?php echo $data_menu['nama_menu']; ?></a><?php
}
?>
      <ul class="dropdown-menu">
          <?php 
              foreach ($menu2->result_array() AS $data_menu2) {
                if ($data_menu2['menu_utama']==$data_menu['id_menu']) {
                      $url_menu2="";
                      if ($data_menu2['jenis']=='artikel') {
                        #$url_menu2='detail_artikel';
                        $url2=str_replace(' ', '-',$data_menu2['nama_menu']);
                        $url_menu2='article-'.$url2.'-'.$data_menu2['id_tampil'].'.html';
                      }elseif ($data_menu2['jenis']=='produk') {
                        #$url_menu2='detail_produk';
                        $url2=str_replace(' ', '-',$data_menu2['nama_menu']);
                        $url_menu2='perumahan-'.$url2.'-'.$data_menu2['id_tampil'].'.html';
                      }elseif ($data_menu2['jenis']=='model') {
                        #$url_menu2='detail_model';
                        $url2=str_replace(' ', '-',$data_menu2['nama_menu']);
                        $url_menu2='detail-'.$url2.'-'.$data_menu2['id_tampil'].'.html';
                      }
            ?><li>
                  <a href="<?php echo base_url() ?><?php echo $url_menu2; ?>"><?php echo $data_menu2['nama_menu']; ?></a>
              </li>
                 <?php
                }
              }

           ?>
      </ul>


  </li>
<?php
}
?>
       <li ><a href="<?php echo base_url(); ?>article-About-PT-Solid-Citra-Konstruksi-1.html" >About Us</a></li>
       <li ><a href="<?php echo base_url(); ?>article-Contact-PT-Solid-Citra-Konstruksi-2.html" >Contact</a></li>
        </ul>
      </div>
    </div>

</nav>  