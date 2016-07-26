<script type="text/javascript">
	function simpan_data_edit_foto(pg,tabel,batas,view) {
		$('#fileUploadForm').ajaxForm({  
            beforeSubmit: ShowRequest, 
            success: SubmitSuccesful,
            error: AjaxError                               
          });
	}

  function ShowRequest() {
      var imgpath=document.getElementById('userfile');
      var img=imgpath.files[0].size;
      var imgsize=img/1024; 
      if (imgsize>3000) {
          alert('ma af maximal size gambar adalah 3 MB');
          return false;
      }
    }
	function AjaxError() {
      alert("An AJAX error occured.");
    }
    function SubmitSuccesful(responseText, statusText) {        
      alert("berhasil update gambar");
      batal_tambah();
      tampil(1,'foto',8,'gambar','id_foto');
    } 
</script>

<div class="thumbnail" style="max-width: 500px" >
<div class="alert alert-info">
    <strong><b>Edit Data Foto</b></strong>  
</div>

<form action="<?php echo base_url(); ?>proses_admin/edit_foto" 
        enctype="multipart/form-data" method="post" id="fileUploadForm" name="fileUploadForm">
<?php 
foreach ($user->result_array() AS $data){
 ?>

<input type="hidden" name="id" id="id" value="<?php echo $data['id_foto']; ?>">
<div class="form-group">
  <label for="judul">Judul:</label>
  <input type="text" class="form-control" id="judul" name="judul"  maxlength="200" value="<?php echo $data['judul']; ?>" required>
</div>
<div class="form-group">
  <label for="userfile">Ganti Gambar:</label>
  <input type="file" class="btn btn-info"   id="userfile" name="userfile" 
   maxlength="200" value="<?php echo $data['judul']; ?>">
</div>
<div class="form-group">
  <label for="lama"> Gambar Lama:</label>
  <div class="thumbnail" style="max-width: 200px">
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
<div class="form-group">
<input type="submit" onclick="simpan_data_edit_foto('<?php echo $pg; ?>','<?php echo $tabel; ?>','<?php echo $batas ?>','<?php echo $view; ?>');" class="btn btn-primary" value="Update">

                    <button type="reset" onclick="batal_edit()" class="btn btn-default">
                        Batal
                    </button>
</div>
<?php } ?>
</form>
</div>