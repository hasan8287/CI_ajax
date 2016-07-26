<script type="text/javascript">
    function tampil_model(id_model) {
     
    jq.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>solid/tampil_model",
            data: {"id_model":id_model},
            success: function(resp){
                    jq('#tampil_model').html(resp);

            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
  }

  function plusDivs() {
        var id_produk=jq('#id_produk').val();
        alert('hahaha');
        jq.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>solid/tampil_produk",
            data: {"id_produk":id_produk
            ,"status":tambah},
            success: function(resp){
                jq('#tampil_produk').html(resp);
            },
            error:function(event, textStatus, errorThrown) {
                alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
  }

</script>

<?php
function rupiah($rp){ 
  $rupiah="";
  $p=strlen($rp);
  while($p>3){
  $rupiah=".".substr($rp,-3).$rupiah;
  $k=strlen($rp)-3;
  $rp=substr($rp,0,$k);
  $p=strlen($rp);
  }
  $rupiah= $rp.$rupiah."";
  return $rupiah;
}



foreach ($produk->result_array() AS $data_produk) {
?>
<div id="tampil_produk">
  

<article>

<?php 
foreach ($id_sebelumnya->result_array() AS $id_seb) {
  $url_seb=str_replace(' ', '-',$id_seb['judul']);
  $url_seb='perumahan-'.$url_seb.'-'.$id_seb['id_produk'].'.html';

?>
  <a class="w3-btn-floating" style="position:absolute;top:5%;left:-25px;" 
  href="<?php echo base_url() ?><?php echo $url_seb; ?>">❮</a>

<?php
  
}

foreach ($id_selanjutnya->result_array() AS $id_sel) {
  $url_sel=str_replace(' ', '-',$id_sel['judul']);
  $url_sel='perumahan-'.$url_sel.'-'.$id_sel['id_produk'].'.html';

?>
  <a class="w3-btn-floating" style="position:absolute;top:5%;right:-25px;" 
  href="<?php echo base_url() ?><?php echo $url_sel; ?>">❯</a>
<?php
  
}


?>

<div class="panel panel-info">
    <div class="panel-heading">
        <b class="title1"><?php echo $data_produk['judul']; ?></b>
    </div>
</div>



<br>
 <ul class="nav nav-tabs">
    <li class="active">
        <a data-toggle="tab" href=
        "#tab1">Detail</a>
    </li>
    <li>
        <a data-toggle="tab" href=
        "#tab2">Peta</a>
    </li>
    <li>
        <a data-toggle="tab" href=
        "#tab3">Denah </a>
    </li>

     <li>
        <a data-toggle="tab" href=
        "#tab4">Model Ruamah</a>
    </li>
</ul>
<div class="tab-content">
  
<div class="tab-pane in active fadeInDown" id=
                                "tab1">



    <table class="table">
        <tr>
          <td>Kota </td><td> <?php echo $data_produk['kota']; ?></td>
        </tr>
        <tr>
          <td>Lokasi </td><td> Lokasi <?php echo $data_produk['lokasi']; ?></td>
        </tr>
    </table>

<?php 
  if ($jml_slide>=1) {
      $varibelnya="";
      foreach ($foto->result_array() AS $data_foto) {
          $varibelnya=$varibelnya."{src:'".base_url().'/cdn/uploads/'.$data_foto['foto']."'},";
      }

      ?>
<script type="text/javascript">
jq(document).ready(function(){
  //var slides = [{src: '../images/Koala.jpg'}, {src: '../images/Penguins.jpg'},
  // {src: '../images/Tulips.jpg'}]
  var slides=[
    <?php 
      echo $varibelnya;
    ?>
  ]
  var jR3DCarousel;
  var carouselProps =  {
                /* largest allowed height */
            slideLayout : 'fill',     /* "contain" (fit according to aspect ratio), "fill" (stretches object to fill) and "cover" (overflows box but maintains ratio) */
            animation: 'slide3D',     /* slide | scroll | fade | zoomInSlide | zoomInScroll */
            animationCurve: 'ease',
            animationDuration: 1000,
            animationInterval: 1200,
            //slideClass: 'jR3DCarouselCustomSlide',
            autoplay: true,
            onSlideShow: show,    /* callback when Slide show event occurs */
            navigation: 'circles',  /* circles | squares */
            slides: slides      /* array of images source or gets slides by 'slide' class */
              
        }
  function setUp(){
    jR3DCarousel = jq('.jR3DCarouselGallery').jR3DCarousel(carouselProps);

    jq('.settings').html('<pre>$(".jR3DCarouselGallery").jR3DCarousel('+JSON.stringify(carouselProps, null, 4)+')</pre>');   
    
  }
  function show(slide){
    console.log("Slide shown: ", slide.find('img').attr('src'))
  }
  jq('.carousel-props input').change(function(){
    if(isNaN(this.value))
      carouselProps[this.name] = this.value || null; 
    else
      carouselProps[this.name] = Number(this.value) || null; 
    
    for(var i = 0; i < 999; i++)
       clearInterval(i);
    $('.jR3DCarouselGallery').empty();
    setUp();
    jR3DCarousel.showNextSlide();
  })
  
  jq('[name=slides]').change(function(){
    carouselProps[this.name] = getSlides(this.value); 
    for (var i = 0; i < 999; i++)
       clearInterval(i);
    jq('.jR3DCarouselGallery').empty();
    setUp();
    jR3DCarousel.showNextSlide();   
  });
  
  function getSlides(no){
    slides = [];
    for ( var i = 0; i < no; i++) {
      slides.push({src: 'https://unsplash.it/'+Math.floor(1366-Math.random()*200)+'/'+Math.floor(768+Math.random()*200)})
    }
    return slides;
  }
  
  setUp()

  })
</script>
<div class="jR3DCarouselGallery"></div>
      <?php
  }
 echo $data_produk['deskripsi']; 

?>

</div>
<div class="tab-pane fadeInDown" id="tab2">
 <!-- <a href="<?php echo base_url() ?>cdn/uploads/peta/<?php echo $data_produk['peta']; ?>"
    >  
        <img src="<?php echo base_url() ?>cdn/uploads/peta/<?php echo $data_produk['peta']; ?>" id="imagelightbox" >
   </a>
-->
   <a href="<?php echo base_url() ?>cdn/uploads/peta/<?php echo $data_produk['peta']; ?>" class="lsb-preview single">
    <img src="<?php echo base_url() ?>cdn/uploads/peta/<?php echo $data_produk['peta']; ?>">
  </a>
</div>

<div class="tab-pane fadeInDown" id="tab3">

<a href="<?php echo base_url() ?>cdn/uploads/denah/<?php echo $data_produk['denah']; ?>" class="lsb-preview single">
  <img src="<?php echo base_url() ?>cdn/uploads/denah/<?php echo $data_produk['denah']; ?>">
</a>

</div>
<div class="tab-pane fadeInDown" id="tab4">



<div id="tampil_model">
  
</div>




<div class="row">
<?php
foreach ($model->result_array() AS $data_model) {
/*
onclick="tampil_model(<?php echo $data_model['id_model']; ?>)"
*/
      $url=str_replace(' ', '-',$data_model['nama_model']);
      $url='detail-'.$url.'-'.$data_model['id_model'].'.html';
?>
<a href="<?php echo base_url() ?><?php echo $url; ?>" target="_blank">
    <div class="col-sm-4">
        <div class="panel panel-info">
        <div class="panel-heading">
            <b><?php echo $data_model['nama_model']; ?></b>
        </div>
        <div class="panel-body">
            <div class="thumbnail">
              <?php 
              if (!empty($data_model['foto'])) {

                $fotoku=$data_model['foto'];  
                $ex_foto2=explode(".", $fotoku);
                $jml  =count($ex_foto2)-1;
                $nama="";
                for ($j=0; $j <=$jml ; $j++) { 
                  if ($j==0) {
                    $nama=$ex_foto2[0];
                  }elseif ($j<$jml) {
                    $nama=$nama.".".$ex_foto2[$j];
                  }else{
                    $nama=$nama."_thumb.".$ex_foto2[$j];
                  }
                }
              ?><img src="<?php echo base_url() ?>cdn/uploads/thumb/<?php echo $nama; ?>" style="height: 130px;"><?php
              }else{
                ?><img src="<?php echo base_url() ?>cdn/uploads/error.jpg" style="height: 130px;"><?php
              }
              ?>
            </div>  
            Type  <?php echo $data_model['type']; ?><br>
            Tersedia <?php echo $data_model['tersedia']; ?> Rumah
        </div>

        <div class="panel-footer">
            Rp. <?php echo rupiah($data_model['harga']); ?>
        </div>

        </div>
    </div>
</a>
    <?php
}
?>

</div>
<?php
}
?>

</div>
</div>
	</article>

  <article>
      <div class="row">
          <?php 
            foreach ($produk_lain->result_array() AS $lainya) {
              $url=str_replace(' ', '-',$lainya['judul']);
               $url='perumahan-'.$url.'-'.$lainya['id_produk'].'.html';
              ?>
              <a href="<?php echo base_url() ?><?php echo $url; ?>" target="_blank">
                <div class="col-sm-4">
                    <div class="panel panel-default">
                          <div class="panel-heading">
                              <?php echo $lainya['judul']; ?>
                          </div>
                          <div class="panel-body">
                            <?php 
                                  if (!empty($lainya['foto'])) {

                                    $fotoku=$lainya['foto'];  
                                    $ex_foto2=explode(".", $fotoku);
                                    $jml  =count($ex_foto2)-1;
                                    $nama="";
                                    for ($j=0; $j <=$jml ; $j++) { 
                                      if ($j==0) {
                                        $nama=$ex_foto2[0];
                                      }elseif ($j<$jml) {
                                        $nama=$nama.".".$ex_foto2[$j];
                                      }else{
                                        $nama=$nama."_thumb.".$ex_foto2[$j];
                                      }
                                    }
                                  }else{
                                      $nama='error.JPG';
                                    }
                              ?>
                              <div class="thumbnail">
                                  <img src="<?php echo base_url() ?>cdn/uploads/thumb/<?php echo $nama; ?>" 
                                  style="height: 130px;">
                              </div>

                          </div>
                         
                    </div>
                </div>
                </a>
              <?php
            }

          ?>
      </div>
  </article>

</div>