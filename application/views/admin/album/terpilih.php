
<div class="jumbotron">
<?php foreach ($album -> result_array() AS $data_album){ ?>
			<?php 
				if ($jenis=="edit") {
					?>
						<div class="form-group">
						  <label for="judul">Judul Album</label>
						  <input type="text" class="form-control" id="judul_edit" name="judul_edit" value="<?php echo $data_album['judul']; ?>" maxlength="200">
						</div>

						<div class="form-group">
						  <label  for="deskrisi">Deskrisi</label>
						  <input type="text" name="deskrisi_edit" id="deskrisi_edit" class="form-control" maxlength="200" value="<?php echo $data_album['keterangan']; ?>">
						  	
						</div>
					<?php
				}else{
					?>
					<h3><?php echo $data_album['judul']; ?></h3>
					<?php echo $data_album['keterangan']; ?><br>
					<?php
				}
				
			 ?>
			
			Foto Terpilih
			<div class="row">

			<?php
} 
			foreach ($foto->result_array() AS $data_foto_terpilih) {
				$fotoku=$data_foto_terpilih['foto'];	
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
			
					<div  class="col-md-3"> 
						<div class="thumbnail">
						<a class="w3-btn-floating" style="position:absolute;top:0%;left:0" 
						onclick="hapus_gambar('<?php echo $data_foto_terpilih['id_detail']; ?>')">
							<span class="glyphicon glyphicon-trash"></span>  
						</a>
						<img src="<?php echo base_url() ?>/cdn/uploads/thumb/<?php echo $nama; ?>">
						</div>
					</div>
				
			
			<?php	
			}
			?>
			</div>
				

<?php 

if ($jenis=="tambah") {
	?>
	<button type="reset" onclick="batal_tambah2()" class="btn btn-primary">
                        Selesai
	</button>
	<?php
}else{
?>
	<button type="button" onclick="simpan_edit_album()" class="btn btn-primary">
                        Simpan Edit
	</button>
	 <button type="reset" onclick="batal_edit()" class="btn btn-default">
          Kembali
     </button>
<?php

}

?>

</div><br>