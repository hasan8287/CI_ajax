<div class="thumbnail">
<div id="frm1">
<form  role="form" name="formajax" id="formajax">
	<div class="form-group">
	  <label for="judul">Judul Album</label>
	  <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul" maxlength="200">
	</div>

	<div class="form-group">
	  <label  for="deskrisi">Deskrisi</label>
	  <textarea placeholder="Masukan Deskripsi" name="deskrisi" id="deskrisi" class="form-control" maxlength="200"></textarea>
	</div>

	<div class="form-group">
	<input type="button"  class="btn btn-primary" value="Lanjutkan" onclick="simpan_tambah_album()">

    <button type="reset" onclick="batal_tambah()" class="btn btn-default">
        Batal
    </button>
    </div>	
</form>    
</div>

		<input type="hidden" name="id" id="id_album"></input>
        <input type="hidden" name="jenis" id="jenis" value="tambah">
        <div id="terpilih">
            
        </div>
		<div id="pilih-foto">	
		

		</div>
	
<!--=============================bats dari prmilihan foto================================-->

</div>

