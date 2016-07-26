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
<form action="<?php echo base_url(); ?>proses_admin/tambah_artikel" 
        enctype="multipart/form-data" method="post" id="fileUploadForm">
    <div class="form-group">
      <label for="judul">Judul Artikel</label>
      <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul" maxlength="200" required>
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
      <label for="isi">Isi Artikel</label>
      <textarea style="min-height: 300px;" name="isi"></textarea>
    </div>
    <div class="form-group">
    	<input type="submit"  class="btn btn-primary" value="Sipan" onclick="simpan_gambar()">
		<a onclick="batal_tambah()" class="btn btn-warning">Batal</a>
    </div>
</form>
