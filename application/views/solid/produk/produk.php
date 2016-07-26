
	<?php 
	foreach ($produk->result_array() AS $data_produk) {
		$url=str_replace(' ', '-',$data_produk['judul']);
		$url='perumahan-'.$url.'-'.$data_produk['id_produk'].'.html';
	?>

                    <article>

      	<div class="panel panel-info">
      	<div class="panel-heading">
      	
      	</div>

      	<div class="panel-body">
		<div class="row">
		<div class="col-md-6">
	      	<div class="thumbnail">
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
						      			?>
			      			<a href="<?php echo base_url() ?>cdn/uploads/<?php echo $data_produk['foto']; ?>" 
			      			class="lsb-preview" data-lsb-group="header">

			      			<img src="<?php echo base_url() ?>cdn/uploads/thumb/<?php echo $nama; ?>" alt="<?php echo $data_produk['judul_foto']; ?>" class="img-responsive">

			      			</a>
			      			<!--
			      			<a href="<?php echo base_url() ?>cdn/uploads/<?php echo $data_model['foto']; ?>" 
			      			class="lsb-preview" data-lsb-group="header">
  <img src="<?php echo base_url() ?>cdn/uploads/thumb/<?php echo $nama; ?>" style="height: 150px;width: 100%;" >
</a>-->
			      			<?php
			      		}else{
			      			?>
			      			<img src="<?php echo base_url() ?>cdn/uploads/error.jpg" class="img-responsive">
			      			<?php
			      		}
			      	?>
	      		
	      	</div>
	     </div>
	     <div class="col-md-6">
	     <a href="<?php echo base_url() ?><?php echo $url; ?>">
	     		<h3><b><?php echo $data_produk['judul']; ?></b></h3></a>
				   <table class="table">
				   		<tr><td>Kota</td><td>: <?php echo $data_produk['kota']; ?></td></tr>
				   		<tr><td>Lokasi</td><td>: <?php echo $data_produk['lokasi']; ?></td></tr>
				   </table>

		

				   <a href="<?php echo base_url() ?><?php echo $url; ?>" class="btn btn-primary">Detail</a>
	     </div>
      	</div>
      	<?php #echo $data_produk['detail']; ?>
      	</div>
    </div>
    </article>
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
			<li class="<?php echo $clas; ?>"><a href="<?php echo base_url() ?>daftar_perumahan/<?php echo $i; ?>">
				<?php echo $i; ?>
			</a></li>
		<?php		
	}

 ?>
</ul>
</div>

