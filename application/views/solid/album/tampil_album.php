<article>
<?php 
foreach ($id_sebelumnya->result_array() AS $id_seb) {
  $url_seb=str_replace(' ', '-',$id_seb['judul']);
  $url_seb='album-'.$url_seb.'-'.$id_seb['id_album'].'.html';

?>
  <a class="w3-btn-floating" style="position:absolute;top:5%;left:-25px;" 
  href="<?php echo base_url() ?><?php echo $url_seb; ?>">❮</a>

<?php
  
}

foreach ($id_selanjutnya->result_array() AS $id_sel) {
  $url_sel=str_replace(' ', '-',$id_sel['judul']);
  $url_sel='album-'.$url_sel.'-'.$id_sel['id_album'].'.html';

?>
  <a class="w3-btn-floating" style="position:absolute;top:5%;right:-25px;" 
  href="<?php echo base_url() ?><?php echo $url_sel; ?>">❯</a>
<?php
  
}
?>
<?php 
$a=0;
foreach ($album->result_array() AS $data_album) {
$a++;
?>
<b><h2 align="center"><?php echo $data_album['judul']; ?></h2></b>
<p align="center"><?php echo $data_album['keterangan']; ?></p>
<?php
if ($a>=1) {
  break;
}
}
$varibelnya="";
foreach ($album->result_array() AS $data_album) {

        $varibelnya=$varibelnya."{src:'".base_url().'/cdn/uploads/'.$data_album['foto']."'},";

}?>
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
<div class="row">
<?php 
foreach ($album->result_array() AS $data_model) {
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
        ?>
<div class="col-md-4" style="margin: 0px;padding: 0px;height: 150px;">
<a href="<?php echo base_url() ?>cdn/uploads/<?php echo $data_model['foto']; ?>" alt="<?php echo $data_model['judul']; ?>" class="lsb-preview" data-lsb-group="header">
  <img src="<?php echo base_url() ?>cdn/uploads/thumb/<?php echo $nama; ?>" alt="<?php echo $data_model['judul']; ?>" 
  alt="<?php echo $data_model['judul']; ?>" style="height: 150px;width: 100%;" >
</a>
</div>
        <?php
}
?>
</div>
</article>