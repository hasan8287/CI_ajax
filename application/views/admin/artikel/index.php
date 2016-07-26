<script type="text/javascript">
    function simpan_gambar() {
        $('#fileUploadForm').ajaxForm({                 
            success: SubmitSuccesful,
            error: AjaxError                               
          });
    }
    function AjaxError() {
      alert("An AJAX error occured.");
    }
    function SubmitSuccesful(responseText, statusText) {        
      alert("data berhasil disimpan");

      batal_tambah();
      batal_edit();
      tampil(1,'artikel',<?php echo $batas; ?>,'artikel','id_artikel');
    } 
</script>

<div id="bt-box">
		
</div>
<div id="conten">
<button class="btn btn-primary" onclick="tambah_data('artikel')" id="tambah_button">Tambah Artikel</button>
<table  class="table table-hover table-bordered">
    <thead>
        <tr  class="success">
            <th width="20px">No</th>
            <th>Judul Artikel</th>
            <th>Album</th>
            <th>Keterangan</th>
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
							<td><?php echo $data['judul_album']; ?></td>
							<td><?php echo $data['tgl']; ?></td>
							<td>
<?php 
if ($data['id_artikel']!='1' AND $data['id_artikel']!='2') {
?>
	<a href="#" onclick="deleted('artikel','id_artikel','<?php echo $data['id_artikel']; ?>','<?php echo $pg; ?>','<?php echo $batas; ?>','artikel','id_artikel')">	
									<button type="button" class="btn btn-danger btn-sm">
		          						<span class="glyphicon glyphicon-trash"></span>  
		        					</button>
		        				</a>
<?php 
}
?>
	<a href="#" onclick="edit_form('artikel','id_artikel','<?php echo $data['id_artikel']; ?>','<?php echo $pg; ?>','<?php echo $batas; ?>','artikel')"
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
			<li class="<?php echo $clas; ?>"><a href="#" onclick="tampil(<?php echo $i.",'artikel',".$batas,",'artikel','id_artikel'"; ?>)">
				<?php echo $i; ?>
			</a></li>
		<?php		
	}

 ?>
</ul>
</div>