
                   <article>

<?php 
$i=0;
$varibelnya="";
foreach ($detail_album->result_array()  AS $data_slide) {
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
            animation: 'slide3D',     /* slide |slide3D| scroll | fade | zoomInSlide | zoomInScroll */
            animationCurve: 'ease',
            animationDuration: 1000,
            animationInterval: 1200,
            //slideClass: 'jR3DCarouselCustomSlide',
            autoplay: true,
            onSlideShow: show,    /* callback when Slide show event occurs */
            navigation: 'squares',  /* circles | squares */
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

                    </article>
<article>
                        <!-- Blog item Start -->
                        <div class="blog-item-wrap">
                            <!-- Post Format icon Start -->
                            
                            <h2 class="blog-title">Pencarian Model Rumah</h2>
                            
                            <div class="post-content">




<!--
<form>Nominal Rupiah : Rp <input id="nominal" onkeyup="rup()" type="text" name="nominal" /></form>
-->

<div id="loading" style="text-align: center;margin: 10px;padding: 10px;">
    <img src="<?php echo base_url() ?>/asset/img/loading.gif">
</div>


<div  id="container">
  
        <div style="background-color: white;padding: 5px;">
        <!--
        <b>Cari</b> &nbsp;&nbsp;&nbsp;
         <select id="jenis">
            <option value="model">Model Rumah</option>
            <option value="produk">Product Solid</option>
            
         </select>
         -->

            <input type="hidden" id="jenis" value="model"></input>
                <div class="row">
                <!--
                 <div class="col-sm-3">
                        <input type="text" class="form-control" id="kota" placeholder="Pilih Kota">
                  </div>
                -->
                  <div class="col-sm-3">
                        <input type="text" class="form-control" id="harga_awal" placeholder="Harga Awal"
                         onkeyup="rup1()"> 
                  </div>
                  <div class="col-sm-3">
                        <input type="text" class="form-control" id="harga_akhir" 
                        placeholder="Harga Akhir"  onkeyup="rup2()" onchange="rup2()"> 
                  </div>


                  <div class="col-sm-4">
                        <input type="text" class="form-control" id="kata_kunci" 
                        placeholder="Kata Kunci">
                  </div>
                  <div class="col-sm-2">
                      <button class="btn btn-info" onclick="cari(5,1)">Cari</button>
                  </div>
                </div>
                
          

        
   </div>
  
   <div class="row"  id="hasil_cari">
       
   </div>
</div>

            
 </div>
                    </article>
                


        
   
