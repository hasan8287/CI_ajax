<?php
		foreach ($admin->result_array() As $data ) {
			?>
			<form role="form" name="formajax" id="formajax">
			    <table  class="table table-bordered">
			    	<tr>
			    		<td colspan="2">Edit Data Admin</td>
			    	</tr>
			    	<tr>
			            <td>Username</td>
			            <td><input type="text" name="username" id="username" value="<?php echo $data['username']; ?>" readonly></input></td>
			        </tr>
			    	<tr>
			            <td>Nama</td>
			            <td><input type="text" name="nama" id="nama" value="<?php echo $data['nama'];?>" ></input></td>
			        </tr>
			        
			        <tr>
			            <td>Password</td>
			            <td><input type="password" name="password" id="password"></input><br>
			            *) Kosongkan Password Jika tidak diganti
			            </td>
			        </tr>
			       	 
			        <tr>
			            <td></td>
			            <td>
			                <button type="button" onclick="simpan_data_edit();" class="btn btn-primary">
			                            <span class="glyphicon glyphicon-save"></span>&nbsp;Simpan
			                        </button>
			                        <button type="reset" id="batal-tambah" class="btn btn-default">
			                            Batal
			                        </button>
			            </td>
			        </tr>
			    </table>
			    </form>
			<?php
		}