<div class="alert alert-danger">
  <b>Tamabah Data Admin</b>
</div>
<form role="form" name="formajax" id="formajax">
    <div class="form-group">
      <label >Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama" maxlength="150">
    </div>

    <div class="form-group">
      <label >Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username" maxlength="150">
    </div>

     <div class="form-group">
      <label >Password</label>
      <input type="text" class="form-control" id="password" name="password" placeholder="Masukan password" maxlength="150">
    </div>

     <div class="form-group">
      <label ></label>
      <button type="button" onclick="simpan_tambah_admin();" class="btn btn-primary">
                    <span class="glyphicon glyphicon-save"></span>&nbsp;Simpan
                </button>

                <button type="reset" onclick="batal_tambah()" class="btn btn-default">
                    Batal
                </button>
    </div>
    </form>