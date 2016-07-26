<script type="text/javascript">
    function simpan_tambah_admin() {
        var username=$('#username').val();
        var password=$('#password').val();
        var nama=$('#nama').val();
        if (nama=="") {
            alert('nama tidak boleh kosong');
        }else if(username==""){
            alert('username tidak boleh kosong');
        }else if (password=="") {
            alert('password tidak boleh kosong');
        }else{

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>proses_admin/tambah_admin",
                data: {"username":username
                        ,"password":password,"nama":nama},
                success: function(resp){
                        $('#tambah_data_form').html('');
                        $("#notivikasi").html(resp);
                        tampil(1,'admin',<?php echo $batas; ?>,'admin','id_admin');
                },
                error:function(event, textStatus, errorThrown) {
                   alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
                }
            });
        }
    }

    function simpan_data_edit_admin(pg,tabel,batas,view) {
        var username=$('#username_edit').val();
        var password=$('#password_edit').val();
        var nama=$('#nama_edit').val();
        if (nama=="") {
            alert('nama tidak boleh kosong');
        }else if(username==""){
            alert('username tidak boleh kosong');
        }else{

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>proses_admin/edit_user_proses",
                data: {"username":username
                        ,"password":password,"nama":nama},
                success: function(resp){                  
                       $("#notivikasi").html(resp);
                       tampil(pg,tabel,batas,view,'id_admin');
                       $("#edit_data_form").html('');
                  
                },
                error:function(event, textStatus, errorThrown) {
                   alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
                }
            });
        }
    }
</script>
<div id="conten">
<button class="btn btn-primary" onclick="tambah_data('admin')" id="tambah_button">Tambah Admin</button>
<table  class="table table-hover table-bordered">
    <thead>
        <tr  class="success">
            <th width="20px">No</th>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th width="100px">Aksi</th>
        </tr>
    </thead>
    <tbody>
		<?php 
				$no=0;
				foreach ($user->result_array() AS $data){
					$no++;
					?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['nama']; ?> </td>
							<td><?php echo $data['username']; ?></td>
							<td>
	<a href="#" onclick="deleted('admin','username','<?php echo $data['username']; ?>','<?php echo $pg; ?>','<?php echo $batas; ?>','admin','id_admin')">	
									<button type="button" class="btn btn-danger btn-sm">
		          						<span class="glyphicon glyphicon-trash"></span>  
		        					</button>
		        				</a>

	<a href="#" onclick="edit_form('admin','username','<?php echo $data['username']; ?>','<?php echo $pg; ?>','<?php echo $batas; ?>','admin')"
		        					class="btn btn-info btn-sm">
						          <span class="glyphicon glyphicon-cog"></span> 
						        </a>
						    
							</td>
						</tr>
					<?php
				}

		?>
</tbody>
</table>
<ul class="pagination">
<?php 
	for ($i=1; $i <=$jml_hal ; $i++) { 
		$tam=$i+1;
		if ($i==$pg) {
			$clas="active";
		}else{
			$clas="";
		}
		?>
			<li class="<?php echo $clas; ?>"><a href="#" onclick="tampil(<?php echo $i.",'admin',".$batas,",'admin','id_admin'"; ?>)">
				<?php echo $i; ?>
			</a></li>
		<?php		
	}

 ?>
</ul>

</div>