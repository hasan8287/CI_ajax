
<div class="row">
	

<?php 
foreach ($artikel->result_array() AS $data_artikel) {
	$url=str_replace(' ', '-',$data_artikel['judul']);
	$url='article-'.$url.'-'.$data_artikel['id_artikel'].'.html';
?>
<div class="col-sm-12">
<article>
<div class="panel ">
<div class="panel-heading">
	<h3 class="title1"><a href="<?php echo base_url() ?><?php echo $url; ?>"><?php echo $data_artikel['judul']; ?></a></h3>
</div>
<div class="panel-body">
	
		<?php echo $data_artikel['detail']; ?><br>
		<a href="<?php echo base_url() ?><?php echo $url; ?>" class="btn btn-primary">Read More</a>
	
</div>
</div>
</article>
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
			<li class="<?php echo $clas; ?>"><a href="<?php echo base_url() ?>article/<?php echo $i; ?>">
				<?php echo $i; ?>
			</a></li>
		<?php		
	}

 ?>
</ul>
</div>

