<div id="container">

<div id="body">
	<p>Silahkan login untuk mengakses informasi akademik.</p>
	<?php echo form_open('web/login'); ?>
	
	Username : 
	<?php echo form_input($username); ?><br>
	Password : 
	<?php echo form_input($password); ?><br>
	<?php echo form_submit('submit', 'Log In', ' class="btn-kirim-login"');?> 
	<?php echo form_reset('submit', 'Hapus',' class="btn-kirim-login"');?>

	<?php echo form_close(); ?>
</div>
