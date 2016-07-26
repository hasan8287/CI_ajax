<div class="alert alert-info">
    <strong><b>Edit Data Admin</b></strong>  
</div>
<table  class="table table-bordered">

	<tr><?php 
foreach ($user->result_array() AS $data){
 ?>

    <div class="form-group">
      <label >Nama</label>
      <input type="text" class="form-control" id="nama_edit" name="nama" placeholder="Masukan nama" value="<?php echo $data['nama']; ?>" maxlength="150">
    </div>

    <div class="form-group">
      <label >Username</label>
      <input type="text" class="form-control" id="username_edit" name="username" placeholder="Masukan username" value="<?php echo $data['username']; ?>" maxlength="150">
    </div>
     <div class="form-group">
      <label >Password</label>
      <input type="text" class="form-control" id="password_edit" name="password" placeholder="Masukan password" maxlength="150">
    </div>

  <?php 
}
?>   
    <div class="form-group">
      <label ></label>
     <button type="button" onclick="simpan_data_edit_admin('<?php echo $pg; ?>','<?php echo $tabel; ?>','<?php echo $batas ?>','<?php echo $view; ?>');" 
            class="btn btn-primary">
                        <span class="glyphicon glyphicon-save"></span>&nbsp;Simpan
                    </button>
                    <button type="reset" onclick="batal_edit()" class="btn btn-default">
                        Batal
                    </button>
      
    </div>    