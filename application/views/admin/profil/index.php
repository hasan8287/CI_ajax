<script type="text/javascript">
    function simpan_edit_profil(pg,tabel,batas,view) {
      var nama=$('#nama').val();
        var alamat=$('#alamat').val();
        var telp=$('#telp').val();
        var email=$('#email').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>proses_admin/edit_user_profil",
            data: {"nama":nama
                    ,"alamat":alamat,"telp":telp,"email":email},
            success: function(resp){                  
                   $("#notivikasi").html(resp);
                   tampil(pg,tabel,batas,view,'nama');
              
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
    }
</script>

<div class="alert alert-danger">
	<b>Umbah Data Profil</b>
</div>
<form role="form" name="formajax" id="formajax">
<?php 
foreach ($user->result_array() AS $data_proifil) {

?>
    <div class="form-group">
      <label >Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama" maxlength="200" value="<?php echo $data_proifil['nama']; ?>">
    </div>
    <div class="form-group">
      <label >Alamat</label>
       <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan nama" maxlength="300" value="<?php echo $data_proifil['alamat']; ?>">
    </div>

    <div class="form-group">
      <label >Telp</label>
      <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukan nama" maxlength="30" value="<?php echo $data_proifil['telp']; ?>">
    </div>
    <div class="form-group">
      <label >Email</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Masukan nama" maxlength="150" value="<?php echo $data_proifil['email']; ?>">
    </div>

     <div class="form-group">
      <label ></label>
      <button type="button" onclick="simpan_edit_profil(1,'profil',1,'profil');" class="btn btn-primary">
                    <span class="glyphicon glyphicon-save"></span>&nbsp;Simpan
                </button>

            
    </div>
<?php   # code...
}
?>
</form>
