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
	<b>Tamabah Data Product</b>
</div>

<form action="<?php echo base_url(); ?>proses_admin/tambah_model" 
        enctype="multipart/form-data" method="post" id="fileUploadForm">
     <div class="form-group">
		<label for="product">Product</label>
		<select name="id_product" id="id_product" class="form-control">
			<option value="">Pilih Product</option>
			<?php 
			foreach ($produk->result_array() AS $data_prduct) {?>
				<option value="<?php echo $data_prduct['id_produk']; ?>"><?php echo $data_prduct['judul']; ?></option>
			<?php } ?>
		</select>
	</div> 
	<div class="form-group">
		<label for="judul">Nama Model</label>
		<input type="text" name="nama_model" maxlength="200" id="nama_model" placeholder="masukan nana product"  class="form-control" required></input>
	</div>
	<div class="form-group">
		<label for="type">Type</label>
		<input type="text" name="type" maxlength="200" id="type" placeholder="masukan type rumah"  class="form-control" required></input>
	</div>

	<div class="form-group">
		<label for="harga">Harga</label>
		<input type="text" name="harga" id="harga" placeholder="masukan harga" 
		class="form-control" required></input>
	</div>

	<div class="form-group">
		<label for="harga">Luas Tanah (Meter)</label>
		<input type="text" name="tanah" id="tanah" placeholder="masukan harga" 
		class="form-control" required></input> 
	</div>

	<div class="form-group">
		<label for="harga">Tersedia</label>
		<input type="text" name="tersedia" id="tersedia" placeholder="0" 
		class="form-control" required ></input>
	</div>



	<div class="form-group">
      <label for="judul">Pilih Album</label>
      <select name="id_album" id="id_album" class="form-control">
          <option>Pilih Album</option>
          <?php 
            foreach ($album->result_array() AS $data_album) {
             ?><option value="<?php echo $data_album['id_album']; ?>"><?php echo $data_album['judul']; ?></option><?php
            }
          ?>
      </select>
    </div>
	
	<div class="form-group">
		<label for="deskripsi">Deskripsi</label>
		<textarea name="deskripsi" id="deskripsi"  class="form-control" style="min-height: 300px;">	
		</textarea>
	</div>
	<div class="form-group">
		<label for="aksi"></label>
		<input type="submit"  class="btn btn-primary" value="Simpan" onclick="simpan_gambar()">
		<a onclick="batal_tambah()" class="btn btn-warning">Batal</a>
	</div>
</form>