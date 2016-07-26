<script type="text/javascript">
	    function tampil_formku() {
	        $.ajax({
	            type: "POST",
	            url: "<?php echo base_url(); ?>admin/tampil_form_tes2",
	            success: function(resp){
	                   $("#tampil_formku_box").html(resp);
	            },
	            error:function(event, textStatus, errorThrown) {
	               alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
	            }
	        });
	    }
</script>
<button onclick="tampil_formku()">ddddd</button>
<div id="tampil_formku_box">
	
</div>
<div id="contemku">
	sdfdsf	
</div>