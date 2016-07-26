<script type="text/javascript">
	$(document).ready(function () {

        $(document).ajaxStart(function () {
            $("#loading").show();
            $("#content").hide();
        }).ajaxStop(function () {
            $("#loading").hide();
            $("#content").show();
        });

         $('#batal-tambah').click(function(){
	        $('#tampil_form_tes-box').slideUp('fast');
	    });

	    $('#batal-edit').click(function(){
	        $('#edit2-box').slideUp('fast');
	    });
    });
	function tampil(a) {
        var hal=a;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>artikel/tampil_artikel",
            data: {"hal":hal},
            success: function(resp){
                   $("#isi-tabel").html(resp);
                 // paging(a);
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
    }

    function tambah_artikel() {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>artikel/form_tambah",

            success: function(resp){
                   $("#tambah").html(resp);
                   $('#tampil').slideUp('fast');
            },
            error:function(event, textStatus, errorThrown) {
               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
            }
        });
    }
</script>
<body onload="tampil(1)">
<div id="loading" style="text-align: center;margin: 10px;padding: 10px;">
    <img src="<?php echo base_url() ?>/asset/img/loading.gif">
</div>
<div id="content">
  <div id="tambah">
  	
  </div>
  <div id="edit">
  	
  </div>
  <div id="tampil">
		<div class="alert alert-info">
		    <strong><b>Data Artikel</b></strong>  
		</div>
    <?php 
      foreach ($album->result_array() AS $data) {
        echo "aaaa=".$data['id'];
      }
    ?>
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th width="25px">No</th>
					<th>Judul</th>
					<th>tgl Insert</th>
					<th width="70px">
					<button onclick="tambah_artikel()" class="btn btn-info">Tambah</button>
					</th>
				</tr>
			</thead>
			<tbody id="isi-tabel">

			</tbody>
      
		</table>

		 <ul class="pager">         

		 </ul>		
   </div>
</div>
</body>