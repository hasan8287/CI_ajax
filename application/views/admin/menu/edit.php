<div class="alert alert-danger">
	<b>Edit Data Menu</b>
</div>
<form role="form" name="formajax" id="formajax">
<?php 
foreach ($user->result_array() AS $data_menu) {

?>
	<input type="hidden" name="id_menu" id="id_menu" value="<?php echo $data_menu['id_menu']; ?>">
    <div class="form-group">
      <label >Nama Menu</label>
      <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_menu['nama_menu']; ?>" placeholder="Masukan nama" maxlength="150">
    </div>
    <div class="form-group">
      <label >Menu Utama</label>
      <select id="menu_utama" class="form-control">
      		<?php 
      			foreach ($menu->result_array() AS $data_menu_utama) {
      				if ($data_menu['menu_utama']==$data_menu_utama['id_menu']) {
      				?><option value="<?php echo $data_menu_utama['id_menu']; ?>" selected>
      					<?php echo $data_menu_utama['nama_menu']; ?></option><?php
      				}else{
      				?><option value="<?php echo $data_menu_utama['id_menu']; ?>">
      					<?php echo $data_menu_utama['nama_menu']; ?></option><?php
      				}
      				
      			}

      			if ($data_menu['menu_utama']==0) {
      			?><option value="" selected>Menu Utama</option><?php
      			}else{
      				?><option value="">Jadikan Menu Utama</option><?php
      			}
      		?>
      		
      </select>
    </div>
    <div class="form-group">
      <label >Jenis</label>
      <select id="jenis" class="form-control" onchange="tampil_pilihan()">
      		<?php 
      			if ($data_menu['jenis']=='artikel') {
      			?>
					<option value="artikel" selected>Artikel</option>
		      		<option value="produk">Product</option>
		      		<option value="model">Model</option>
      			<?php
      			}elseif ($data_menu['jenis']=='produk') {
      			?>
					<option value="artikel" >Artikel</option>
		      		<option value="produk" selected>Product</option>
		      		<option value="model">Model</option>
      			<?php
      			}else{
      			?>
					<option value="artikel" >Artikel</option>
		      		<option value="produk" >Product</option>
		      		<option value="model" selected>Model</option>
      			<?php	
      			}
      		?>
      </select>
    </div>

    <div class="form-group" id="pilih_tampilkan">
    	<label >Pilih </label>
		<select name="id_tampil" id="id_tampil" class="form-control">
			
			<?php 
				foreach ($tampil->result_array() AS $data_tampil) {
					if ($data_tampil['id_tampil']==$data_menu['id_tampil']) {
					?><option value="<?php echo $data_tampil['id_tampil']; ?>" selected>
						<?php echo $data_tampil['judul_tampil']; ?></option><?php
					}else{
						?><option value="<?php echo $data_tampil['id_tampil']; ?>">
						<?php echo $data_tampil['judul_tampil']; ?></option><?php
					}
				}

				if ($data_menu['id_tampil']==0 OR empty($data_menu['id_tampil'])) {
				?><option value="" selected>Jenis Tampil kososng</option><?php
				}else{
				?><option value=""> Jenis Tampil Kosong</option><?php	
				}
			?>
		</select>
    </div>

     <div class="form-group">
      <label ></label>
      <button type="button" onclick="simpan_data_edit_menu('<?php echo $pg; ?>','<?php echo $tabel; ?>','<?php echo $batas ?>','<?php echo $view; ?>');" 
            class="btn btn-primary">
                        <span class="glyphicon glyphicon-save"></span>&nbsp;Simpan
                    </button>
                    <button type="reset" onclick="batal_edit()" class="btn btn-default">
                        Batal
                    </button>
    </div>
<?php 
} ?>
</form>
