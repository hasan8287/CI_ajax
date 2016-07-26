<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Admin Solid</title>

<link href="<?php echo base_url() ?>asset/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>asset/admin/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url() ?>asset/admin/css/styles.css" rel="stylesheet">
</head>

<body>
	
	<div class="row">
	
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 align="center"><b style="color: ;">Login Admin</b></h3>
			
				</div>
				<div class="panel-body">
					<?php echo form_open('solid/proses_login'); ?>
						<fieldset>
							<div class="form-group">
							username: admin
								<?php echo form_input($username); ?>
							</div>
							<div class="form-group">
							password: admin
								<?php echo form_input($password); ?>
								
							</div>
							<input type="submit" name="login" value="Login" class="btn btn-primary"></input>
							<a href="<?php echo base_url('solid') ?>" class="btn btn-info">Halaman Utama</a>
						</fieldset>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

</body>

</html>
<?php
/*
<input class="form-control" placeholder="username" name="user"  autofocus="">
<input class="form-control" placeholder="Password" name="password"  value="">
*/