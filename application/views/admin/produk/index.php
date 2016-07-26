<script type="text/javascript">
    function simpan_gambar() {
        $('#fileUploadForm').ajaxForm({   
        	beforeSubmit: ShowRequest,              
            success: SubmitSuccesful,
            error: AjaxError                               
          });
    }

		//pas2=document.frm.pass2.value;
    function ShowRequest() {
      var img_name=document.frm.gambar.value;
      var img_name2=document.frm.denah.value;
      if (img_name!='') {
      		var imgpath=document.getElementById('gambar');
      		var img=imgpath.files[0].size;
     		var imgsize=img/1024; 
     		if (imgsize>3000) {
     			alert('ma af maximal size gambar peta 3 MB');
          		return false;
     		}
      	  
      }
      if (img_name2!='') {
      		var imgpath2=document.getElementById('denah');
      		var img2=imgpath2.files[0].size;
      		var imgsize2=img2/1024;
      		if (imgsize2>3000) {
      			alert('ma af maximal size gambar denah 3 MB');
          		return false;
      		}
      	  	
      }
    }
    function AjaxError() {
      alert("An AJAX error occured.");
    }
    function SubmitSuccesful(responseText, statusText) {        
      alert("data berhasil disimpan");
      batal_tambah();
      batal_edit();
      tampil(1,'produk',<?php echo $batas; ?>,'produk','id_produk');
    } 
</script>
<div id="conten">
<button class="btn btn-primary" onclick="tambah_data('produk')" id="tambah_button">Tambah Product</button>
<table  class="table table-hover table-bordered">
    <thead>
        <tr  class="success">
            <th width="20px">No</th>
            <th>Nama Product</th>
            <th>Lokasi</th>
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
							<td><?php echo $data['judul']; ?> </td>
							<td><?php echo $data['lokasi']; ?></td>
							<td>
	<a href="#" onclick="deleted('produk','id_produk','<?php echo $data['id_produk']; ?>','<?php echo $pg; ?>','<?php echo $batas; ?>','produk','id_produk')">	
									<button type="button" class="btn btn-danger btn-sm">
		          						<span class="glyphicon glyphicon-trash"></span>  
		        					</button>
		        				</a>

	<a href="#" onclick="edit_form('produk','id_produk','<?php echo $data['id_produk']; ?>','<?php echo $pg; ?>','<?php echo $batas; ?>','produk')"
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
			<li class="<?php echo $clas; ?>"><a href="#" onclick="tampil(<?php echo $i.",'produk',".$batas,",'produk','id_produk'"; ?>)">
				<?php echo $i; ?>
			</a></li>
		<?php		
	}

 ?>
</ul>
</div>