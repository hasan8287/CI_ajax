<!DOCTYPE html>
<html lang="en">
<head>
  <title>Solid Citra Konstruksi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="<?php echo base_url() ?>asset/jquery.js"></script>
    <script src="<?php echo base_url() ?>asset/admin/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>asset/jR3DCarousel.min.js"></script>


<link href="<?php echo base_url() ?>asset/style.css" media="screen" rel="stylesheet"
    type="text/css">

 <link href="<?php echo base_url() ?>asset/admin/css/bootstrap.min.css" rel="stylesheet">

<style type="text/css">
	
</style>

  <script type="text/javascript">
    function load() {
      $("#loading").hide();
    }
  </script>
</head>
<body onload="load()"  data-spy="scroll" data-target=".navbar" data-offset="50">

   <?php echo $_top_menu;?> 

<?php 
    $i=0;
    $varibelnya="";
    foreach ($detail_album->result_array()  AS $data_slide) {
      $varibelnya=$varibelnya."{src:'".base_url().'/cdn/uploads/'.$data_slide['foto']."'},";

    }
    
    ?>

<script type="text/javascript">
$(document).ready(function(){
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
					  animation: 'slide3D', 		/* slide | scroll | fade | zoomInSlide | zoomInScroll */
					  animationCurve: 'ease',
					  animationDuration: 1000,
					  animationInterval: 1200,
					  //slideClass: 'jR3DCarouselCustomSlide',
					  autoplay: true,
					  onSlideShow: show,		/* callback when Slide show event occurs */
					  navigation: 'circles',	/* circles | squares */
					  slides: slides 			/* array of images source or gets slides by 'slide' class */
						  
				}
	function setUp(){
 		jR3DCarousel = $('.jR3DCarouselGallery').jR3DCarousel(carouselProps);

		$('.settings').html('<pre>$(".jR3DCarouselGallery").jR3DCarousel('+JSON.stringify(carouselProps, null, 4)+')</pre>');		
		
	}
	function show(slide){
		console.log("Slide shown: ", slide.find('img').attr('src'))
	}
	$('.carousel-props input').change(function(){
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
	
	$('[name=slides]').change(function(){
		carouselProps[this.name] = getSlides(this.value); 
		for (var i = 0; i < 999; i++)
	     clearInterval(i);
		$('.jR3DCarouselGallery').empty();
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




<br>
<div class="container-fluid">
  <div class="row content">

   

      <div class="col-sm-9" style="min-height: 500px;">
      
<div class="article">
	<div class="jR3DCarouselGallery"></div>
</div>
 
<div class="article">
sfsadfsdfds<br>
sadsad
	<div class="blog-item-wrap">
		saaaaaaaaa

	</div>
</div>


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
