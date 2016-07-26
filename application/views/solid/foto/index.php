<script type="text/javascript">
	 $(document).ready(function () {
        $(document).ajaxStart(function () {
            $("#loading").show();
            $("#contentku").hide();
        }).ajaxStop(function () {
            $("#loading").hide();
            $("#contentku").show();
        });
    });
	function tampil_gambar(foto,judul) {
		$.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>solid/tampil_gambar",
            data: {"foto":foto
                    ,"judul":judul},
            success: function(resp){
                    $('#tampil_gambar').html(resp);

            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
	}
</script>


<!--
<div id="loading" style="text-align: center;margin: 10px;padding: 10px;">
    <img src="<?php echo base_url() ?>/asset/img/loading.gif">
</div>
-->
<article id="contentku">	

<div class="row">
<div id="tampil_gambar"  class="col-md-12">

</div>
<?php 
$bari=0;
foreach ($foto->result_array() AS $data_foto) {
	$bari++;
$ex_foto=explode(".", $data_foto['foto']);
$jml 	=count($ex_foto)-1;
$nama="";
for ($i=0; $i <=$jml ; $i++) { 
	if ($i==0) {
		$nama=$ex_foto[0];
	}elseif ($i<$jml) {
		$nama=$nama.".".$ex_foto[$i];
	}else{
		$nama=$nama."_thumb.".$ex_foto[$i];
	}
}

?>

<div class="col-md-4" style="margin: 0px;padding: 0px;height: 150px;">

<a href="<?php echo base_url() ?>cdn/uploads/<?php echo $data_foto['foto']; ?>" alt="<?php echo $data_foto['judul']; ?>" class="lsb-preview" data-lsb-group="header">
  <img src="<?php echo base_url() ?>cdn/uploads/thumb/<?php echo $nama; ?>" alt="<?php echo $data_foto['judul']; ?>" 
  alt="<?php echo $data_foto['judul']; ?>" style="height: 150px;width: 100%;" >
</a>

</div>



<?php		


}	
?>

</div>

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
			<li class="<?php echo $clas; ?>">
			<a href="<?php echo base_url() ?>foto/<?php echo $i; ?>">
				<?php echo $i; ?>
			</a></li>
		<?php		
	}

 ?>
</ul>
</div>

</article>