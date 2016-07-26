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
	<b>Edit Data Model</b>
</div>

<form action="<?php echo base_url(); ?>proses_admin/edit_model" 
        enctype="multipart/form-data" method="post" id="fileUploadForm">

    
<?php 
foreach ($user->result_array() AS $data_user) {
?>
	<input type="hidden" name="id" id="id" value="<?php echo $data_user['id_model']; ?>"></input>


	 <div class="form-group">
		<label for="product">Nama Product</label>
		<select name="id_product" id="id_product" class="form-control">
			<?php 
				if (!empty($data_user['id_produk'])) {
					?><option value="<?php echo $data_user['id_produk']; ?>">
						<?php echo $data_user['judul_produk']; ?></option><?php
				}else{
					?><option value="">Pilih Product</option><?php
				}

				foreach ($produk->result_array() AS $data_produk) {
					if ($data_produk['id_produk']!=$data_user['id_produk']) {
						?><option value="<?php echo $data_produk['id_produk']; ?>"><?php echo $data_produk['judul']; ?></option><?php
					}
				}
			?>
		</select>
	</div>   


	<div class="form-group">
		<label for="judul">Nama Model</label>
		<input type="text" name="nama_model" maxlength="200" id="nama_model"
		 value="<?php echo $data_user['nama_model']; ?>"  class="form-control"></input>
	</div>
	<div class="form-group">
		<label for="judul">Type</label>
		<input type="text" name="type" maxlength="200" id="type"
		 value="<?php echo $data_user['type']; ?>"  class="form-control"></input>
	</div>

	<div class="form-group">
		<label for="harga">Harga</label>
		<input type="text" name="harga" id="harga" value="<?php echo $data_user['harga']; ?>" 
		class="form-control"></input>
	</div>

    <div class="form-group">
      <label for="isi">Album</label>
      <select name="id_album_edit" class="form-control">
          <?php
            if (!empty($data_user['id_album'])) {
                ?><option value="<?php echo $data_user['id_album']; ?>">
                <?php echo $data_user['judul_album']; ?></option><?php
            }else{
              ?><option value="">Pilih Album</option><?php
            }

            foreach ($album->result_array() AS $data_album) {
              if ($data_user['id_album']!=$data_album['id_album']) {
              ?><option value="<?php echo $data_album['id_album']; ?>"><?php echo $data_album['judul']; ?></option><?php
              }
            }
          ?>
      </select>
    </div>

    <div class="form-group">
		<label for="harga">Luas Tanah (Meter)</label>
		<input type="text" name="tanah" id="tanah" value="<?php echo $data_user['luas_tanah']; ?>" 
		class="form-control" required></input> 
	</div>

	<div class="form-group">
		<label for="harga">Tersedia</label>
		<input type="text" name="tersedia" id="tersedia" value="<?php echo $data_user['tersedia']; ?>" 
		class="form-control" required ></input>
	</div>

	<div class="form-group">
		<label for="deskripsi">Deskripsi</label>
		<textarea name="deskripsi" id="deskripsi"  class="form-control" style="min-height: 300px;">	
			<?php echo $data_user['deskripsi']; ?>
		</textarea>
	</div>
<?php 
} ?>
	<div class="form-group">
		<label for="aksi"></label>
		<input type="submit"  class="btn btn-primary" value="Simpan" onclick="simpan_gambar()">
		<a onclick="batal_edit()" class="btn btn-warning">Batal</a>
	</div>
</form>
