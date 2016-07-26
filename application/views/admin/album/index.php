<script type="text/javascript">
	$(document).ready(function(){
   		 $('#batal-tambah').click(function(){
    	    $('#tampil_form_tes-box').slideUp('fast');
	    });

	    $('#bt').click(function(){
	        $('#bt-box').slideDown('fast');
	    });
    });

	 function detail_album(id) {
	 	 $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>solid_admin/tampil_album",
            data: {"id":id},
            success: function(resp){
            	 
                  $("#bt-box").html(resp);
                  $("notivikasi").html('');
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
	 }
	 function close_detail() {
		$("#bt-box").html('');
	 }

	function tampil_pilih_gambar(hal,tabel,batas,view,urut) {
        var id=$('#id_album').val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>solid_admin/pilih_gambar",
            data: {"hal":hal,"tabel":tabel,"batas":batas,"view":view,"urut":urut,"id_album":id},
            success: function(resp){
                  $("#pilih-foto").html(resp);
                  terpilih();

            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
    }
    
    function simpan_tambah_album() {
        var judul=$('#judul').val();
        var deskrisi=$('#deskrisi').val();
        if (judul=="") {
            alert('maaf judul album masih kosong');
        }else if(deskrisi==""){
            alert('maaf deskripsi album masih kosong');
        }else{

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>proses_admin/tambah_album",
                data: {"judul":judul
                        ,"deskrisi":deskrisi},
                success: function(resp){
                		$('#id_album').val(resp);
                        $('#frm1').html('');

                        tampil_pilih_gambar(0,'foto',8,'album','id_foto');
                },
                error:function(event, textStatus, errorThrown) {
                   alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
                }
            });
        }
    }

    function edit_album(id_album) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>solid_admin/edit_album",
            data: {"id":id_album},
            success: function(resp){
                    $('#edit_data_form').html(resp);
                    tampil_pilih_gambar(0,'foto',8,'album','id_foto');

            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
    }

    function pilih_gambar(id_foto) {
        var id=$('#id_album').val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>proses_admin/pilih_gambar",
            data: {"id":id,"id_foto":id_foto},
            success: function(resp){
                   //alert('aaa');
                   $('#tes').html(resp);
                   terpilih();
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
    }

    function terpilih() {
       var id=$('#id_album').val();
       var jenis=$('#jenis').val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>solid_admin/terpilih",
            data: {"id":id,"jenis":jenis},
            success: function(resp){
                   $('#terpilih').html(resp);
                   $("#isi").hide();
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
    }
    function batal_tambah2() {
        batal_tambah();
        tampil(1,'album',8,'album','id_album');
    }


	function hapus_gambar(urutan) {
		var id=$('#id_album').val();
		$.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>proses_admin/hapus_gambar",
            data: {"id":id,"urutan":urutan},
            success: function(resp){
                 terpilih();
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
	}
	function simpan_edit_album() {
		var id=$('#id_album').val();
		var judul_edit=$('#judul_edit').val();
		var deskrisi_edit=$('#deskrisi_edit').val();
        if (judul_edit=="") {
            alert('maaf judul tidak boleh kosong');
        }else if (deskrisi_edit=="") {
            alert('maaf deskrisi tidak boleh kosong');
        }else{
    		$.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>proses_admin/edit_album",
                data: {"id":id,"judul":judul_edit,"deskrisi":deskrisi_edit},
                success: function(resp){
                     batal_edit();
                     $("#notivikasi").html(resp);
                     tampil(<?php echo $pg; ?>,'album',<?php echo $batas; ?>,'album','id_album');

                },
                error:function(event, textStatus, errorThrown) {
                   alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
                }
            });
        }
	}
</script>
    
</script>

<div id="bt-box">
		
</div>
<div id="conten">
<button class="btn btn-primary" onclick="tambah_data('album')" id="tambah_button">Tambah Album</button>
<table  class="table table-hover table-bordered">
    <thead>
        <tr  class="success">
            <th width="20px">No</th>
            <th>Nama Album</th>
            <th>Keterangan</th>
            <th width="130px">Aksi</th>
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
							<td><?php echo $data['judul']; ?> </td>
							<td><?php echo $data['keterangan']; ?></td>
							<td>
<?php 
if ($data['id_album']!='1') {

?>
	<a href="#" onclick="deleted('album','id_album','<?php echo $data['id_album']; ?>','<?php echo $pg; ?>','<?php echo $batas; ?>','album','id_album')">	
									<button type="button" class="btn btn-danger btn-sm">
		          						<span class="glyphicon glyphicon-trash"></span>  
		        					</button>
		        				</a>
<?php 
}
?>

	<a href="#" onclick="edit_album(<?php echo $data['id_album']; ?>)"
		        					class="btn btn-info btn-sm">
						          <span class="glyphicon glyphicon-cog"></span> 
						        </a>


	

	
		<button type="button" class="btn btn-default btn-sm"   onclick="detail_album('<?php echo $data['id_album']; ?>')">
		 <span class="glyphicon glyphicon-search"></span>
		 </button>
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
			<li class="<?php echo $clas; ?>"><a href="#" onclick="tampil(<?php echo $i.",'album',".$batas,",'album','id_album'"; ?>)">
				<?php echo $i; ?>
			</a></li>
		<?php		
	}

 ?>
</ul>
</div>