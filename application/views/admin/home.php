<?php 
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Solid Admin</title>

<link href="<?php echo base_url() ?>asset/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>asset/admin/css/styles.css" rel="stylesheet">
<link href="<?php echo base_url() ?>asset/w3.css"  rel="stylesheet">

<script src="<?php echo base_url() ?>cdn/tinymce/tinymce.min.js"></script>

<script src="<?php echo base_url() ?>asset/js/jquery.min.js"></script>

<script src="<?php echo base_url() ?>asset/jquery.form.js"></script>

<script src="<?php echo base_url() ?>asset/jquery.js"></script>
<script type="text/javascript">
  var com=jQuery.noConflict();
</script>


<script type="text/javascript">
   $(document).ready(function () {
        $(document).ajaxStart(function () {
            $("#loading").show();
            $("#isi").hide();
        }).ajaxStop(function () {
            $("#loading").hide();
            $("#isi").show();
        });
    });
  function tampil(hal,tabel,batas,view,urut) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>solid_admin/tampil",
            data: {"hal":hal
                    ,"tabel":tabel,"batas":batas,"view":view,"urut":urut},
            success: function(resp){

                  $("#contentku").html(resp);
                  //$("#notivikasi").html('');
                  
                  batal_tambah();
                  batal_edit();
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
    }



    function deleted(tabel,key,id,hal,batas,view,urut) {
        cek=confirm('anda yakin menghapus data ini');
        if (cek==true) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>proses_admin/delete",
                data: {"tabel":tabel,"key":key,"id":id},
                success: function(resp){
                       $("#notivikasi").html(resp);
                       tampil(hal,tabel,batas,view,urut);
                  
                },
                error:function(event, textStatus, errorThrown) {
                   alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
                }
            });
        }
    }
    function tambah_data(view) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>solid_admin/tambah_data",
            data: {"view":view},
            success: function(resp){
                  $("#tambah_data_form").html(resp);  
                  batal_edit();
                  not_ksosong();      
                  $("#conten").hide();

            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        })
    }
    function edit_form(tabel,key,id,hal,batas,view) {
      $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>solid_admin/edit_form",
                data: {"tabel":tabel,"key":key,"id":id,"hal":hal,"batas":batas,"view":view},
                success: function(resp){
                       $("#edit_data_form").html(resp);
                       batal_tambah();
                       not_ksosong();
                       $("#conten").hide();
                  
                },
                error:function(event, textStatus, errorThrown) {
                   alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
                }
            });
    }


    function edit_form(tabel,key,id,hal,batas,view,id_album) {
      $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>solid_admin/edit_form",
                data: {"tabel":tabel,"key":key,"id":id,"hal":hal,"batas":batas,"view":view,"id_album":id_album},
                success: function(resp){
                       $("#edit_data_form").html(resp);
                       batal_tambah();
                       not_ksosong();
                       $("#conten").hide();
                  
                },
                error:function(event, textStatus, errorThrown) {
                   alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
                }
            });
    }

    function edit_form2(tabel,key,id,hal,batas,view,tabel2,key2,id2) {
      $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>solid_admin/edit_form2",
                data: {"tabel":tabel,"key":key,"id":id,"hal":hal,"batas":batas,"view":view,"tabel2":tabel2,"key2":key2,"id2":id2},
                success: function(resp){
                       $("#edit_data_form").html(resp);
                       batal_tambah();
                       not_ksosong();
                       $("#conten").hide();
                  
                },
                error:function(event, textStatus, errorThrown) {
                   alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
                }
            });
    }

    function batal_tambah() {
        $("#tambah_data_form").html('');
        $("#conten").show();
    }
    function batal_edit() {
        $("#edit_data_form").html('');
        $("#conten").show();
    }

    function not_ksosong() {
        $("#notivikasi").html('');
    }

  $(document).ready(function(){
       $('#batal-tambah').click(function(){
      });
  });
</script>

</head>
<body onload="tampil(1,'profil',5,'profil','nama')">
  <div id="loading" style="text-align: center;margin: 10px;padding: 10px;">
            <img src="<?php echo base_url() ?>/asset/img/loading.gif">
        </div>


  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        

          <div class="col-sm-10">
              <a class="navbar-brand" href=""></a>
          </div>
          <div class="col-sm-2" style="text-align: right;">
              <a class="navbar-brand" href="<?php echo base_url(); ?>/admin/keluar">Log Out</a>
          </div>
      </div>
              
    </div>
  </nav>



  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
  
    <ul class="nav menu">
      <li class="active"><a href="<?php echo base_url() ?>admin">
       Home</a></li>
<!--

  <li class="dropdown">
    <a class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Tutorials
    <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">HTML</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">CSS</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">JavaScript</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>
    </ul>
  </li>
-->


            <li><a href="javascript:void(0)" onclick="tampil(1,'profil',5,'profil','nama')">
             Profile</a></li>

            <li><a href="javascript:void(0)" onclick="tampil(1,'admin',5,'admin','id_admin')">
             Admin</a></li>

             <li><a href="javascript:void(0)" onclick="tampil(1,'foto',8,'gambar','id_foto')">
             Foto</a></li>

             <li><a href="javascript:void(0)" onclick="tampil(1,'album',8,'album','id_album')">
             Album</a></li>

             <li><a href="javascript:void(0)" onclick="tampil(1,'artikel',10,'artikel','id_artikel')">
             Artikel</a></li>
       
             <li><a href="javascript:void(0)" onclick="tampil(1,'produk',10,'produk','id_produk')">
             Product</a></li>
       
              <li><a href="javascript:void(0)" onclick="tampil(1,'model',10,'model','id_model')">
             Model Rumah</a></li>

              <li><a href="javascript:void(0)" onclick="tampil(1,'menu',10,'menu','id_menu')">
             Menu</a></li>
    </ul>
  </div>
    
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">     
    <div class="row">
      <ol class="breadcrumb">
        
      </ol>
    </div><!--/.row-->
    <div class="row">
      <div class="col-lg-12">


      
        
        <div class="panel panel-default"  
        style="padding-top: 10px;padding-bottom: 10px;padding-left: 10px;padding-right: 10px;" id="isi">
          <div id="notivikasi">
    
          </div>

          <div id="edit_data_form">
            
          </div>
          <div id="tambah_data_form">
            
          </div>
          <div id="contentku">
            
          </div>
  
          
        
        </div>
      </div>

    </div>
  </div>

  


  <script src="<?php echo base_url() ?>asset/admin/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>asset/admin/js/easypiechart.js"></script>
  <script src="<?php echo base_url() ?>asset/admin/js/easypiechart-data.js"></script>
  <script>
  

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
