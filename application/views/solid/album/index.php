<script type="text/javascript">
/*
	 jq(document).ready(function () {
        jq(document).ajaxStart(function () {
            jq("#loading").show();
            jq("#contentku").hide();
        }).ajaxStop(function () {
            jq("#loading").hide();
            jq("#contentku").show();
        });
    });
*/
	function tampil_album(id_album) {

		jq.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>solid/tampil_album",
            data: {"id_album":id_album},
            success: function(resp){
                    jq('#tampil_album').html(resp);

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

<div id="tampil_album">
	
</div>

<?php 
foreach ($album->result_array() AS $data_album) {
	$url=str_replace(' ', '-',$data_album['judul']);
	$url='album-'.$url.'-'.$data_album['id_album'].'.html';
?>
<div class="col-md-6" style="height: 300px;margin-bottom: 10px;">
<a href="<?php echo base_url() ?><?php echo $url; ?>">
<div class="panel panel-info">
 	<div class="panel-heading">
			<b><?php echo $data_album['judul']; ?></b>
	</div>
<div class="panel-body">
<!--
onclick="tampil_album('<?php echo $data_album['id_album']; ?>')"-->

		<div  class="thumbnail">
			<img src="<?php echo base_url() ?>cdn/uploads/<?php echo $data_album['foto']; ?>"  class="img-rounded" style="height: 170px;">
		</div>
</div>
</div>
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
			<li class="<?php echo $clas; ?>"><a href="<?php echo base_url() ?>album/<?php echo $i; ?>">
				<?php echo $i; ?>
			</a></li>
		<?php		
	}

 ?>
</ul>
</div>

</article>
