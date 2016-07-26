<script src="<?php echo base_url() ?>asset/tinymce.min.js"></script>
  <script>tinymce.init({
		selector:'textarea'

 });

  </script>
<h3>
	Edit Artikel
</h3>
<?php echo form_open('proses/proses_artikel'); 
	foreach($artikel->result_array() as $data)
	{
?>
<table width="100%">
	<tr>
		<td>Judul Artikel</td>
		<td>: <input type="text" name="judul" placeholder="Masukan Judul" style="width: 98%;" 
		value="<?php echo $data['judul']; ?>"></input></td>
	</tr>
	<tr>
		<td colspan="2">
			Isi Artikel<br>
			<textarea style="min-height: 300px;" name="isi"><?php echo $data['isi']; ?></textarea>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="hidden" name="aksi" value="edit"></input>
			<input type="hidden" name="id" value="<?php echo $data['id']; ?>"></input>
		
			<input type="submit" name="simpan" value="Simpan" class="btn btn-info"></input>
			<a href="<?php echo base_url() ?>admin/artikel" class="btn btn-warning">Batal</a>
		</td>
	</tr>	
</table>
<?php }echo form_close(); ?>