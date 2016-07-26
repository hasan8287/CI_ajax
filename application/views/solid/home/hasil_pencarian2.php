<?php 
#$pesan= str_replace('saya', 'aku',"saya jagoan");

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
<?php 
if ($jml_hal>0) {
		foreach ($model->result_array() AS $data_model) {
			$url_seb=str_replace(' ', '-',$data_model['nama_model']);
  			$url_seb='detail-'.$url_seb.'-'.$data_model['id_model'].'.html';
		?>
		<div class="col-sm-12">
      	<div class="panel panel-info">
      	<div class="panel-heading">
      		<a href="<?php echo base_url() ?><?php echo $url_seb; ?>">
			<b class="title1"><?php echo $data_model['nama_model']; ?></b></a>
      	</div>
      	<div class="panel-body">
     	<div class="row">

    	<div class="col-md-4">
			<?php 
			if (!empty($data_model['foto'])) {

				$fotoku=$data_model['foto'];	
				$ex_foto2=explode(".", $fotoku);
				$jml 	=count($ex_foto2)-1;
				$nama="";
				for ($j=0; $j <=$jml ; $j++) { 
					if ($j==0) {
						$nama=$ex_foto2[0];
					}elseif ($j<$jml) {
						$nama=$nama.".".$ex_foto2[$j];
					}else{
						$nama=$nama."_thumb.".$ex_foto2[$j];
					}
				}
			?>
<!--
			<img src="<?php echo base_url() ?>cdn/uploads/thumb/<?php echo $nama; ?>">
-->
<a href="<?php echo base_url() ?>cdn/uploads/<?php echo $data_model['foto']; ?>" class="lsb-preview" data-lsb-group="header">
  <img src="<?php echo base_url() ?>cdn/uploads/thumb/<?php echo $nama; ?>" style="height: 150px;width: 100%;" >
</a>


			<?php
			}else{
				?><img src="<?php echo base_url() ?>cdn/uploads/error.jpg"><?php
			}
			?>

		
   		 </div>

		<div class="col-md-8">
				<table class="table">
					<tr><td>Type </td><td> : <?php echo $data_model['type']; ?></td></tr>
					<tr><td>Luas Tanah </td><td> : <?php echo $data_model['luas_tanah']; ?> </td></tr>
					<tr><td>Tersedia </td><td> : <?php echo $data_model['tersedia']; ?> Rumah</td></tr>
					<tr><td>Harga </td><td> : Rp <?php echo rupiah($data_model['harga']); ?></td></tr>
				
				</table>
			
			<a href="<?php echo base_url() ?><?php echo $url_seb; ?>" class="btn btn-info">Read More</a>
		</div>

		</div>
		</div>
			<div class="panel-footer"></div>
		</div>
		</div>
		<?php
		}
	?>
<div style="text-align: center;">
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
			<li class="<?php echo $clas; ?>"><a href="#" onclick="cari(<?php echo $batas; ?>,<?php echo $i; ?>)">
				<?php echo $i; ?>
			</a></li>
		<?php		
	}

 ?>
</ul>
</div>
<?php 
}else{
 	?>
 	<h2>Data Tersebut Tidak Ada</h2>
 	<?php
}
