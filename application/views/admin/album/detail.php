<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

 	function close_detail() {
		$("#bt-box").html('');
	 }
</script>
	<?php foreach ($user->result_array() AS $data){ ?>
		<div  style="max-width:800px;position:relative" align="center">
		<div class="thumbnail">
		<div class="alert alert-info">
		    <a href="#" class="close" onclick="close_detail()">close</a>
		    <strong><b><?php echo $data['judul']; ?>
		    </b></strong><br>

		    <?php echo $data['keterangan']; ?>
		</div>
			
	<?php } ?>			
				<?php 

			foreach ($foto->result_array() AS $data_foto) {?>

						<img class="mySlides" src="<?php echo base_url() ?>cdn/uploads/<?php echo $data_foto['foto']; ?>" >
	<?php   } ?>

				<a class="w3-btn-floating" style="position:absolute;top:45%;left:0" onclick="plusDivs(-1)">❮</a>
				<a class="w3-btn-floating" style="position:absolute;top:45%;right:0" onclick="plusDivs(1)">❯</a>
			
		</div>
		</div>


	
