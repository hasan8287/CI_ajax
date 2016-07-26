<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Solid Admin</title>
<link href="<?php echo base_url() ?>asset/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>asset/admin/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url() ?>asset/admin/css/styles.css" rel="stylesheet">
<script src="<?php echo base_url() ?>asset/admin/js/lumino.glyphs.js"></script>
	 <script type="text/javascript">
        function aa() {
            // body...
            alert('aaa');
        }
    </script>
</head>
<body onload="aa()">

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" onload="aa()">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	
		<ul class="nav menu">
			<li class="active"><a href="<?php echo base_url() ?>admin">
			<svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="<?php echo base_url() ?>admin/artikel">
			<svg class="glyph stroked calendar"></svg> Artikel</a></li>
			

			<li><a href="<?php echo base_url() ?>admin/user">
			<svg class="glyph stroked calendar"></svg> User</a></li>
			
			<li><a href="javascript:void(0);" id="userku" onclick="aa()">
			<svg class="glyph stroked calendar"></svg> Uerku</a></li>

			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Dropdown 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 1
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 2
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 3
						</a>
					</li>
				</ul>
			</li>
			
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
	
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default" id="contentku" 
					style="padding-top: 5px;padding-bottom: 10px;padding-left: 5px;padding-right: 5px;">

					<?php echo $_content;?> 

				
				</div>
			</div>
		</div><!--/.row-->

	</div>	<!--/.main-->
	<script src="<?php echo base_url() ?>asset/admin/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url() ?>asset/admin/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>asset/admin/js/chart.min.js"></script>
	<script src="<?php echo base_url() ?>asset/admin/js/chart-data.js"></script>
	<script src="<?php echo base_url() ?>asset/admin/js/easypiechart.js"></script>
	<script src="<?php echo base_url() ?>asset/admin/js/easypiechart-data.js"></script>
	<script src="<?php echo base_url() ?>asset/admin/js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
