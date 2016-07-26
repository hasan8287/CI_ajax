<label >Pilih <?php echo $jenis; ?></label>
<select name="id_tampil" id="id_tampil" class="form-control">
	<option value="">Pilih Jenis Tampil</option>
	<?php 
		foreach ($tampil->result_array() AS $data_tampil) {
		?><option value="<?php echo $data_tampil['id_tampil']; ?>">
			<?php echo $data_tampil['judul_tampil']; ?> </option><?php
		}
	?>
</select>
     	