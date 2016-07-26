<article>
  <?php 
    foreach ($artikel->result_array() AS $data_artikel) {
    ?>
<?php 
if ($data_artikel['id_artikel']!=1 AND $data_artikel['id_artikel']!=2) {

foreach ($id_sebelumnya->result_array() AS $id_seb) {
  $url_seb=str_replace(' ', '-',$id_seb['judul']);
  $url_seb='article-'.$url_seb.'-'.$id_seb['id_artikel'].'.html';

?>
  <a class="w3-btn-floating" style="position:absolute;top:5%;left:-25px;" 
  href="<?php echo base_url() ?><?php echo $url_seb; ?>">❮</a>

<?php
  
}

foreach ($id_selanjutnya->result_array() AS $id_sel) {
  $url_sel=str_replace(' ', '-',$id_sel['judul']);
  $url_sel='article-'.$url_sel.'-'.$id_sel['id_artikel'].'.html';

?>
  <a class="w3-btn-floating" style="position:absolute;top:5%;right:-25px;" 
  href="<?php echo base_url() ?><?php echo $url_sel; ?>">❯</a>
<?php
  
}
  # code...
}
?>



		<div class="panel  panel-info">
      <div class="panel-heading">
          <b><?php echo $data_artikel['judul']; ?></b>
      </div>
    </div>

	<?php
			echo $data_artikel['isi'];
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
?>


</article>