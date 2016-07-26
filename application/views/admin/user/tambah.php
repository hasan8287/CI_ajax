<script type="text/javascript">
	function validasi() {
		pas1=document.frm.pass.value;
		pas2=document.frm.pass2.value;
		if (pas1 != pas2) {
			alert('ma af Konfirmasi password anda salah');
			return false;
		}
		
	}
</script>
<form action="<?php echo base_url() ?>proses/proses_user" onsubmit="return validasi()" name="frm" method="POST">
	<input type="hidden" name="aksi" value="tambah"></input>
	<fieldset>
		<legend>Tambah User</legend>
		<table>
			<tr>
				<td>Nama Lengkap</td>
				<td><input type="text" name="nama" required></input></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="user" required></input></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="pass" required></input></td>
			</tr>
			<tr>
				<td>Konfirmasi Password</td>
				<td><input type="password" name="pass2" required></input></td>
			</tr>
			<tr>
				<td></td><td><input type="submit" name="simpan" value="Simpan" class="btn btn-info"></input>
							<a href="<?php echo base_url() ?>admin/user" class="btn btn-warning">Batal</a>
				</td>
			</tr>
		</table>
	</fieldset>

</form>