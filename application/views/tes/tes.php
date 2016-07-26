<script type="text/javascript">

    $(document).ready(function () {

        $(document).ajaxStart(function () {
            $("#loading").show();
            $("#content").hide();
        }).ajaxStop(function () {
            $("#loading").hide();
            $("#content").show();
        });
    });

    function simpan_data(){
        
        var username=$('#username').val();
        var password=$('#password').val();
        var nama=$('#nama').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>proses/tes",
            data: {"username":username
                    ,"password":password,"nama":nama},
            success: function(resp){
                    $('#tampil_form_tes-box').slideUp('fast');
                    $("#notivikasi").html(resp);
                   tampil(0);
              
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
    }

    function validasi_tambah() {
        var username=$('#username').val();
        var password=$('#password').val();
        var nama=$('#nama').val();
        if (nama=="") {
            alert('ma af nama tidak boleh kosong');
        }else if (username=="") {
             alert('ma af username tidak boleh kosong');
        }else if(password==""){
            alert('ma af password tidak boleh kosong');
        }else{
            simpan_data();
        }
    }

    function tampil(a) {
        var hal=a;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/tampil_tes",
            data: {"hal":hal},
            success: function(resp){
                   $("#tabelku").html(resp);
                  paging(a);
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
    }

    function paging(a) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/paging_tes",
            data: {"hal":a},
            success: function(resp){
                   $("#paginku").html(resp);
                  
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
    }
    
    function tampil_form() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/tampil_form_tes",
            success: function(resp){
                   $("#tampil_form_tes").html(resp);
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
    }
    


    function deleted(a) {
        cek=confirm('anda yakin menghapus data ini');
         var username=a;
        if (cek==true) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>proses/delete_user",
                data: {"username":username},
                success: function(resp){
                       $("#notivikasi").html(resp);
                       tampil();
                  
                },
                error:function(event, textStatus, errorThrown) {
                   alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
                }
            });
        }
    }


    function edit_user(a) {
        var username=a;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/edit_userku",
            data: {"username":username},
            success: function(resp){
                   $("#div-ubah").html(resp);   
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
    }


    function edit_user2(a) {
        var username=a;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/edit_userku2",
            data: {"username":username},
           // dataType : "json",
            success: function(result){
                $('#edit2-box').slideDown('slow');
                var data = jQuery.parseJSON(result);
                $('#username_edit').val(data.user);
                $('#nama_edit').val(data.nama);
                $('#password_edit').val('');
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
    }

    function simpan_data_edit() {
        var username=$('#username_edit').val();
        var password=$('#password').val();
        var nama=$('#nama_edit').val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>proses/edit_user_proses",
            data: {"username":username
                    ,"password":password,"nama":nama},
            success: function(resp){                  
                   $("#notivikasi").html(resp);
                   $("#edit2-box").slideUp('fast');
                   tampil();
              
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
    }
      
    $(document).ready(function(){
    $('#tampil_form_tes').click(function(){
        $('#tampil_form_tes-box').slideDown('slow');
        $('#username').val('');
        $('#password').val('');
        $('#nama').val('');

    });

    $('#batal-tambah').click(function(){
        $('#tampil_form_tes-box').slideUp('fast');
    });


    $('#batal-edit').click(function(){
        $('#edit2-box').slideUp('fast');
    });
    
    });

    function aaaa() {
        alert('tao');
         $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>proses/proses_user_tes",
            data:  new FormData(this),
           contentType: false,
                 cache: false,
           processData:false,

                success: function(data){
                       alert('haha');
              
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
    }
</script>

<body onload="tampil(0,)">



<!--
<div id="loading" style="text-align: center;margin: 10px;padding: 10px;">
    <img src="<?php echo base_url() ?>/asset/img/loading.gif">
</div>
-->
<div id="content">
<div class="alert alert-info">
    <strong><b>Data User / Adminag</b></strong>  
</div>

<div id="notivikasi">
    
</div>

<div id="edit2-box" style="display: none;">
    <form role="form" name="formajax" id="formajax">
        <table  class="table table-bordered">
            <tr>
                <td colspan="2">Edit Data Admin</td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" id="username_edit"  readonly></input></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" id="nama_edit"  ></input></td>
            </tr>
            
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id="password_edit"></input><br>
                *) Kosongkan Password Jika tidak diganti
                </td>
            </tr>
             
            <tr>
                <td></td>
                <td>
                    <button type="button" onclick="simpan_data_edit();" class="btn btn-primary">
                                <span class="glyphicon glyphicon-save"></span>&nbsp;Simpan
                            </button>
                            <button type="reset" id="batal-edit" class="btn btn-default">
                                Batal
                            </button>
                </td>
            </tr>
        </table>
    </form>
</div>

<button id="tampil_form_tes" class="btn btn-info">Tambah Data</button>
<div id="tampil_form_tes-box" style="display: none;max-width: 400px;">
    <form role="form" name="formajax" id="formajax">
    <table  class="table table-bordered">
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" id="nama"></input></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" id="username"></input></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password" id="password"></input></td>
        </tr>
        
        <tr>
            <td></td>
            <td>
                        <button type="button" onclick="validasi_tambah();" class="btn btn-primary">
                            <span class="glyphicon glyphicon-save"></span>&nbsp;Simpan
                        </button>
                        <button type="reset" id="batal-tambah" class="btn btn-default">
                            Batal
                        </button>
            </td>
        </tr>
    </table>
    </form>
</div>
<table  class="table table-hover table-bordered">
    <thead>
        <tr  class="success">
            <th width="20px">No</th>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th width="100px">Aksi</th>
        </tr>
    </thead>
    <tbody id="tabelku">

    </tbody>
</table>
    
<div id="paginku">
    
</div>

<!--
<ul class="pagination">
    <li><a href="#" onclick="tampil(1)">1</a></li>
    <li class="active" onclick="tampil(2)"><a href="#">2</a></li>
</ul>

-->
  
</div>
 </body>