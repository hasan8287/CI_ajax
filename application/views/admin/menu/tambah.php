<div class="alert alert-danger">
	<b>Tamabah Data Menu</b>
</div>
<form role="form" name="formajax" id="formajax">
    <div class="form-group">
      <label >Nama Menu</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama" maxlength="150">
    </div>
    <div class="form-group">
      <label >Menu Utama</label>
      <select id="id_menu" name="id_menu" class="form-control">
      		<option value="">Jadikan Menu Utama</option>
      		<?php 
      			foreach ($menu->result_array() AS $data_menu_utama) {
      				?><option value="<?php echo $data_menu_utama['id_menu']; ?>">
      					<?php echo $data_menu_utama['nama_menu']; ?> </option><?php
      			}
      		?>
      </select>
    </div>
    <div class="form-group">
      <label >Jenis</label>
      <select id="jenis" class="form-control" onchange="tampil_pilihan()">
      		<option value="">Pilih Jenis Tampilan</option>
      		<option value="artikel">Artikel</option>
      		<option value="produk">Product</option>
      		<option value="model">Model</option>
      </select>
    </div>

<!--
    <div class="form-group" id="pilih_tampilkan2">
    	<select name="id_tampil" id="id_tampil" class="form-control">
    		<option value="">Pemilihan Kosong</option>
    	</select>
    </div>
    -->
    <div class="form-group" id="pilih_tampilkan">

    </div>


     <div class="form-group">
      <label ></label>
      <button type="button" onclick="simpan_tambah_menu();" class="btn btn-primary">
                    <span class="glyphicon glyphicon-save"></span>&nbsp;Simpan
                </button>

                <button type="reset" onclick="batal_tambah()" class="btn btn-default">
                    Batal
                </button>
    </div>
</form>
