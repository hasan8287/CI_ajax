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