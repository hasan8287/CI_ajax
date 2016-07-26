<script type="text/javascript">
	function tampil_pilihan() {
		var jenis=$('#jenis').val();
		$.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>solid_admin/pilih_tampil",
            data: {"jenis":jenis},
            success: function(resp){
                  $("#pilih_tampilkan").html(resp);
                   $("#pilih_tampilkan2").removeClass();  
                     
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        })
	}


    function simpan_tambah_menu() {
        var nama=$('#nama').val();
        var id_menu=$('#id_menu').val();
        var jenis=$('#jenis').val();
        var id_tampil=$('#id_tampil').val();
       // alert('aaa='+id_tampil);
        if (nama=="") {
            alert('maaf nama menu tidak boleh kosong');
        }else{

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>proses_admin/tambah_menu",
                data: {"nama":nama
                        ,"id_menu":id_menu,"jenis":jenis,"id_tampil":id_tampil},
                success: function(resp){
                        $('#tambah_data_form').html('');
                        $("#notivikasi").html(resp);
                        tampil(1,'menu',<?php echo $batas; ?>,'menu','id_menu');
                },
                error:function(event, textStatus, errorThrown) {
                   alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
                }
            });
        }
    }

    function simpan_data_edit_menu(pg,tabel,batas,view) {
    	var id=$('#id_menu').val();
        var nama=$('#nama').val();
        var id_menu=$('#menu_utama').val();
        var jenis=$('#jenis').val();
        var id_tampil=$('#id_tampil').val();
        if (nama=="") {
            alert('maaf nama menu ridak boleh kosong');
        }else{
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>proses_admin/edit_user_menu",
                data: {"nama":nama
                        ,"id_menu":id_menu,"jenis":jenis,"id_tampil":id_tampil,"id":id},
                success: function(resp){                  
                       $("#notivikasi").html(resp);
                       tampil(pg,tabel,batas,view,'id_menu');
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
<button class="btn btn-primary" onclick="tambah_data('menu')" id="tambah_button">Tambah Menu</button>
<table  class="table table-hover table-bordered">
    <thead>
        <tr  class="success">
            <th width="20px">No</th>
            <th>Nama Menu</th>
            <th>Jenis</th>
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
							<td><?php echo $data['nama_menu']; ?> </td>
							<td><?php echo $data['jenis']; ?></td>
							<td>
	<a href="#" onclick="deleted('menu','id_menu','<?php echo $data['id_menu']; ?>','<?php echo $pg; ?>','<?php echo $batas; ?>','menu','id_menu')">	
									<button type="button" class="btn btn-danger btn-sm">
		          						<span class="glyphicon glyphicon-trash"></span>  
		        					</button>
		        				</a>

	<a href="#" onclick="edit_form('menu','id_menu','<?php echo $data['id_menu']; ?>','<?php echo $pg; ?>','<?php echo $batas; ?>','menu')"
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