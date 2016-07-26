<script type="text/javascript">

    tinymce.init({
        selector: "textarea",theme: "modern",height: 300,
        relative_urls : false,
        remove_script_host : false,
        document_base_url : "<?php echo base_url(); ?>",
        plugins: [
             "advlist autolink link image lists charmap print preview hr anchor pagebreak",
             "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
             "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
       ],
       toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
       toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
       image_advtab: true ,
       
       external_filemanager_path:"cdn/filemanager/",
       filemanager_title:"Responsive Filemanager" ,
       external_plugins: { "filemanager" : "../filemanager/plugin.min.js"}
    });

</script>
<div class="alert alert-danger">
	<b>Edit Data Product</b>
</div>
<?php 
foreach ($user->result_array() AS $data){
 ?>
<form action="<?php echo base_url(); ?>proses_admin/edit_product" 
        enctype="multipart/form-data" method="post" id="fileUploadForm" name="frm">
       <input type="hidden" name="id" value="<?php echo $data['id_produk']; ?>" id="id"></input>
	<div class="form-group">
		<label for="judul">Nama Product</label>
		<input type="text" value="<?php echo $data['judul']; ?>" name="judul_edit" maxlength="200" id="judul_edit" placeholder="masukan nana product"  class="form-control" required></input>
	</div>

	<div class="form-group">
		<label for="lokasi">kota</label>
		<input type="text" value="<?php echo $data['kota']; ?>" name="kota_edit" id="kota_edit" placeholder="masukan lokasi" maxlength="300"  class="form-control" required></input>
	</div>

	<div class="form-group">
		<label for="lokasi">Lokasi/Alamat</label>
		<input type="text" value="<?php echo $data['lokasi']; ?>" name="lokasi_edit" id="lokasi_edit" placeholder="masukan lokasi" maxlength="300"  class="form-control" required></input>
	</div>

	<div class="form-group">
      <label for="isi">Album</label>
      <select name="id_album_edit" class="form-control">
          <?php
            if (!empty($data['id_album'])) {
                ?><option value="<?php echo $data['id_album']; ?>">
                <?php echo $data['judul_album']; ?></option><?php
            }else{
              ?><option value="">Pilih Album</option><?php
            }
            foreach ($album->result_array() AS $data_album) {
             if ($data['id_album']!=$data_album['id_album']) {
              ?><option value="<?php echo $data_album['id_album']; ?>"><?php echo $data_album['judul']; ?></option><?php
          	 }
            }
          ?>
      </select>
    </div>


    <div class="form-group">
    <label for="lokasi">Peta Lokasi</label>
    <input type="file" name="gambar" id="gambar"  class="btn btn-info"></input>
    *) Kosongkan Jika Tidak Diganti
  </div>

  <div class="form-group">
    <label for="lokasi">Denah</label>
    <input type="file" name="denah" id="denah"   class="btn btn-info"></input>
    *) Kosongkan Jika Tidak Diganti
  </div>

	<div class="form-group">
		<label for="deskripsi">Deskripsi</label>
		<textarea name="deskripsi_edit" id="deskripsi_edit"  class="form-control" style="min-height: 300px;">
			<?php echo $data['deskripsi']; ?>	
		</textarea>
	</div>
	<div class="form-group">
		<label for="aksi"></label>
		<input type="submit"  class="btn btn-primary" value="Simpan" onclick="simpan_gambar()">
		<a onclick="batal_edit()" class="btn btn-warning">Batal</a>
	</div>
</form>
<?php } ?>