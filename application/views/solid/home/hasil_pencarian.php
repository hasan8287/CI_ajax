<div>
	
	<?php 
		foreach ($produk->result_array() AS $data_produk) {
		?>
		<div class="col-sm-12">
      	<div class="panel panel-primary">
      	<div class="panel-heading">Product</div>
      	<div class="panel-body">
     	<div class="row">

    	<div class="col-md-4">
			<?php 
			if (!empty($data_produk['foto'])) {

				$fotoku=$data_produk['foto'];	
				$ex_foto2=explode(".", $fotoku);
				$jml 	=count($ex_foto2)-1;
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
			?><img src="<?php echo base_url() ?>cdn/uploads/thumb/<?php echo $nama; ?>"><?php
			}else{
				?><img src="<?php echo base_url() ?>cdn/uploads/error.jpg"><?php
			}
			?>

		
   		 </div>

		<div class="col-md-8">
			<h3><?php echo $data_produk['judul']; ?></h3>
			<?php echo $data_produk['kota']; ?><br>
			<?php echo $data_produk['lokasi']; ?><br>
			<a href="<?php echo base_url() ?>solid/detail_produk/<?php echo $data_produk['id_produk']; ?>" class="btn btn-info">Read More</a>
		</div>

		</div>
		</div>
			<div class="panel-footer"></div>
		</div>
		</div>
		<?php
		}
	?>
<div style="text-align: center;">
<ul class="pagination">
<?php 
	for ($i=1; $i <=$jml_hal ; $i++) { 
		$tam=$i+1;
		if ($i==$pg) {
			$clas="active";
		}else{
			$clas="";
		}
		?>
			<li class="<?php echo $clas; ?>"><a href="#" onclick="cari(<?php echo $batas; ?>,<?php echo $i; ?>)">
				<?php echo $i; ?>
			</a></li>
		<?php		
	}

 ?>
</ul>
</div>
</div>