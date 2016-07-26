
<script type="text/javascript">
    //=================gambar=================
    function cek() {
      var imgpath=document.getElementById('userfile');
      var img=imgpath.files[0].size;
      var imgsize=img/1024; 
      if (imgsize>3000) {
          alert('kebanyakan tong');
          return false;
      }else{
          simpan_gambar();
          return false;

      }
    }

    function simpan_gambar() {
      var imgpath=document.getElementById('userfile');
      var img=imgpath.files[0].size;
      var imgsize=img/1024; 
      if (imgsize>3000) {
          alert('kebanyakan tong');
          return false;
      }else{

      
          $('#fileUploadForm').ajaxForm({                 
            success: SubmitSuccesful,
            error: AjaxError                               
          });
         // alert('aaa');
      }

    }

    function simpan_gambar_lanjut() {
       $('#fileUploadForm').ajaxForm({  
            beforeSubmit: ShowRequest,               
            success: SubmitSuccesful,
            error: AjaxError                               
          });
    }

    function ShowRequest() {
      var imgpath=document.getElementById('userfile');
      var img=imgpath.files[0].size;
      var imgsize=img/1024; 
      if (imgsize>3000) {
          alert('ma af maximal size gambar adalah 3 MB');
          return false;
      }
    }

    function AjaxError() {
      alert("An AJAX error occured.");
    }
    function SubmitSuccesful(responseText, statusText) {        
      alert("berhasil upload gambar");
      batal_tambah();
      tampil(1,'foto',8,'gambar','id_foto');
    } 
</script>
<div class="alert alert-info">
    <strong><b>Tambah Data Foto</b></strong>  
</div>

   <form action="<?php echo base_url(); ?>proses_admin/tambah_foto" 
        enctype="multipart/form-data" method="post" id="fileUploadForm" >
     <div class="form-group">
      <label >Judul Foto</label>
      <input type="text"  class="form-control"  name="judul" required>
    </div>
    <div class="form-group">
      <label >Pilih Gambar</label>
      <input type="file"  class="btn btn-info" name="userfile" id="userfile" required>
    </div>
    
    <div class="form-group">
      <label ></label>
      <input type="submit"  class="btn btn-primary" value="upload"  onclick="simpan_gambar_lanjut()" >

                    <button type="reset" onclick="batal_tambah()"  class="btn btn-default">
                        Batal
                    </button>
    </div>

   
    </form>
<!--
  onsubmit="return simpan_gambar()" 
  -->