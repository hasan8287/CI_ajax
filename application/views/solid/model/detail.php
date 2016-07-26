<style type="text/css">

</style>
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
?>
<article>

<?php 
foreach ($id_sebelumnya->result_array() AS $id_seb) {
  $url_seb=str_replace(' ', '-',$id_seb['nama_model']);
  $url_seb='detail-'.$url_seb.'-'.$id_seb['id_model'].'.html';

?>
  <a class="w3-btn-floating" style="position:absolute;top:5%;left:-25px;" 
  href="<?php echo base_url() ?><?php echo $url_seb; ?>">❮</a>

<?php
  
}

foreach ($id_selanjutnya->result_array() AS $id_sel) {
  $url_sel=str_replace(' ', '-',$id_sel['nama_model']);
  $url_sel='detail-'.$url_sel.'-'.$id_sel['id_model'].'.html';

?>
  <a class="w3-btn-floating" style="position:absolute;top:5%;right:-25px;" 
  href="<?php echo base_url() ?><?php echo $url_sel; ?>">❯</a>
<?php
  
}
?>


<?php 
foreach ($model->result_array() AS $data_model) {
?>
<div class="panel panel-info">
        <div class="panel-heading">
          <b><?php echo $data_model['nama_model']; ?></b>
        </div>
</div>
	


	<table class="table">
		<tr>
			<td>Harga </td><td> Rp. <?php echo rupiah($data_model['harga']); ?></td>
		</tr>
		<tr>
			<td>Type </td><td><?php echo $data_model['type']; ?></td>
		</tr>
    <tr>
      <td>Luas Tanah </td><td><?php echo $data_model['luas_tanah']; ?></td>
    </tr>
    <tr>
      <td>Tersedia </td><td><?php echo $data_model['tersedia']; ?> Rumah</td>
    </tr>
		<?php 
    if (!empty($data_model['judul']) OR !empty($data_model['kota']) OR !empty($data_model['lokasi'])) {
    ?>
    <tr>
      <td>Product Terkait </td><td><?php echo $data_model['judul']; ?></td>
    </tr>
		<tr>
			<td>Kota </td><td> <?php echo $data_model['kota']; ?></td>
		</tr>
		<tr>
			<td>Lokasi </td><td><?php echo $data_model['lokasi']; ?></td>
		</tr>
    <?php
      }
    ?>
	</table>
<?php 
}

if ($jml_slide>=1) {
  $varibelnya="";
   foreach ($slide->result_array()  AS $data_slide) {
      $varibelnya=$varibelnya."{src:'".base_url().'/cdn/uploads/'.$data_slide['foto']."'},";
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
    jq('.jR3DCarouselGallery').empty();
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
  
  //carouselProps.slides = getSlides(7);
  setUp()

  })
</script>
<div class="jR3DCarouselGallery"></div>

<?php
}
foreach ($model->result_array() AS $data_model) {
 echo $data_model['deskripsi']; 
?>


<?php

}
 ?>
</article>

<article>
<div class="row">
<?php 
foreach ($model_lain->result_array() AS $mod_lain) {
  $url_seb=str_replace(' ', '-',$mod_lain['nama_model']);
  $url_seb='detail-'.$url_seb.'-'.$mod_lain['id_model'].'.html';
?>
<a href="<?php echo base_url() ?><?php echo $url_seb; ?>" target="_blank">
  <div class="col-sm-4">
    <div class="panel panel-danger">
        <div class="panel-heading">
              <?php echo $mod_lain['nama_model']; ?>
        </div>
        <div class="panel-body">
              <?php 
                  if (!empty($mod_lain['foto'])) {

                    $fotoku=$mod_lain['foto'];  
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
                  <img src="<?php echo base_url() ?>cdn/uploads/thumb/<?php echo $nama; ?>" style="height: 100px;">
              </div>
              Tersedia <?php echo $mod_lain['tersedia']; ?>
              
        </div>
        <div class="panel-footer">
               Rp. <?php echo rupiah($mod_lain['harga']); ?>
        </div>
    </div>
  </div>
</a>
<?php
}
?>
</div>
</article>

