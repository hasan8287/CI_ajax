<div id="conten">
<button class="btn btn-primary" onclick="tambah_data('gambar')" id="tambah_button">Tambah Foto</button>
<div class="alert alert-info">
    <strong><b>Daftar Foto</b></strong>  
</div>

<div class="row">
<div class="btn-info">
<?php 
foreach ($user->result_array() AS $data){
	?>

	<div class="col-md-3" style="height: 300px;">
	<div class="thumbnail">
		<p><b><?php echo $data['judul']; ?></b></p>
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
		 <p style="text-align: center;margin-top: 5px;" class="btn-warning">
		 		<a href="#" onclick="deleted('foto','id_foto','<?php echo $data['id_foto']; ?>','<?php echo $pg; ?>','<?php echo $batas; ?>','gambar','id_foto')">	
									<button type="button" class="btn btn-danger btn-sm">
		          						<span class="glyphicon glyphicon-trash"></span>  
		        					</button>
		        				</a>
	<a href="#" onclick="edit_form('foto','id_foto','<?php echo $data['id_foto']; ?>','<?php echo $pg; ?>','<?php echo $batas; ?>','gambar')"
		        					class="btn btn-info btn-sm">
						          <span class="glyphicon glyphicon-cog"></span> 
						        </a>



		 </p>
	</div>
	</div>
	
	<?php
}

 ?>

</div>
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
			<li class="<?php echo $clas; ?>"><a href="#" onclick="tampil(<?php echo $i.",'foto',".$batas,",'gambar','id_foto'"; ?>)">
				<?php echo $i; ?>
			</a></li>
		<?php		
	}

 ?>
</ul>
</div>