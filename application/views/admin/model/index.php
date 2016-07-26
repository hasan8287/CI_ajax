<script type="text/javascript">
	function tampil_lokasi() {
		var product=$('#product').val();
		
		$.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>solid_admin/tampil_lokasi",
            data: {"product":product},
            success: function(resp){
            	alert('asa');
            	 $('#lokasi').val('dsdsd');
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
	}
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
      tampil(1,'model',<?php echo $batas; ?>,'model','id_model');
    } 
</script>
<div id="conten">
<?php 

function rupiah($rp){
  $rupiah="";
  $p=strlen($rp);
  while($p>3){
  $rupiah=".".substr($rp,-3).$rupiah;
  $k=strlen($rp)-3;
  $rp=substr($rp,0,$k);
  $p=strlen($rp);
  }
  $rupiah= $rp.$rupiah."";
  return $rupiah;
}
?>
<button class="btn btn-primary" onclick="tambah_data('model')" id="tambah_button">Tambah Model</button>
<table  class="table table-hover table-bordered">
    <thead>
        <tr  class="success">
            <th width="20px">No</th>
            <th>Nama Model</th>
            <th>Product</th>
            <th>Harga</th>
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
							<td><?php echo $data['nama_model']; ?> </td>
							<td><?php echo $data['jud_prod']; ?></td>
							<td style="text-align: right;"><?php echo rupiah($data['harga']); ?></td>
							<td>
	<a href="#" onclick="deleted('model','id_model','<?php echo $data['id_model']; ?>','<?php echo $pg; ?>','<?php echo $batas; ?>','model','id_model')">	
									<button type="button" class="btn btn-danger btn-sm">
		          						<span class="glyphicon glyphicon-trash"></span>  
		        					</button>
		        				</a>


	<a href="#" onclick="edit_form('model','id_model','<?php echo $data['id_model']; ?>','<?php echo $pg; ?>','<?php echo $batas; ?>','model')"
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
			<li class="<?php echo $clas; ?>"><a href="#" onclick="tampil(<?php echo $i.",'model',".$batas,",'model','id_model'"; ?>)">
				<?php echo $i; ?>
			</a></li>
		<?php		
	}

 ?>
</ul>
</div>