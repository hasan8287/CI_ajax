<h3>Pilih Foto</h3>
<div class="row">
<?php foreach ($foto -> result_array() AS $data): ?>
			<div class="col-md-3" style="height: 200px;">
				<button class="btn btn-info btn-xs" onclick="pilih_gambar('<?php echo $data['id_foto']; ?>')">Tambahkan Gambar</button>	
				<div class="thumbnail">
						<?php 
							$ex_foto=explode(".", $data['foto']);
							$jml 	=count($ex_foto)-1;
							$nama="";
							for ($i=0; $i <=$jml ; $i++) { 
								if ($i==0) {
									$nama=$ex_foto[0];
								}elseif ($i<$jml) {
									$nama=$nama.".".$ex_foto[$i];
								}else{
									$nama=$nama."_thumb.".$ex_foto[$i];
								}
							}

						 ?>
						 <img src="<?php echo base_url() ?>cdn/uploads/thumb/<?php echo $nama; ?>">

				</div>
			</div>
		
	<?php endforeach 	?>
</div>
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
					<li class="<?php echo $clas; ?>"><a href="#"  onclick="tampil_pilih_gambar(<?php echo $i; ?>,'foto',8,'album','id_foto')">
						<?php echo $i; ?>
					</a></li>
				<?php		
			}

		 ?>
	</ul>
	<div id="tes">
		
	</div>