<script type="text/javascript">
	com(function() {            
          $('#fileUploadForm').ajaxForm({                 
            beforeSubmit: ShowRequest,
            success: SubmitSuccesful,
            error: AjaxError                               
          });                                    
        });            

        function ShowRequest(formData, jqForm, options) {
          var queryString = $.param(formData);
          alert('BeforeSend method: \n\nAbout to submit: \n\n' + queryString);
          return true;
        }

        function AjaxError() {
          alert("An AJAX error occured.");
        }

        function SubmitSuccesful(responseText, statusText) {        
          alert("SuccesMethod:\n\n" + responseText);
        } 
</script>			
<form action="<?php echo base_url(); ?>proses/proses_user_tes" enctype="multipart/form-data" method="post" id="fileUploadForm">
File : <input type="file" name="userfile" /><br/>
<input type="submit" name="submit" value="upload" />
</form>


<div id="tampil_form_tes2">
	
</div>
<div id="tabel">
<h3>Data User</h3>
<table border="1px">
	<thead>
		<tr>
			<th style="max-width: 30px;">No</th>
			<th>Nama Lengkap</th>
			<th>Username</th>
			<th style="max-width: 100px;"><a href="<?php echo base_url() ?>admin/tambah_user" class="btn btn-info">Tambah</a> </th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=0;
		foreach ($user->result_array() AS $data){
			$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['username'] ?></td>
				<td>
					<a href="<?php echo base_url() ?>admin/edit_user/<?php echo $data['username']; ?>">
						<img src="<?php echo base_url() ?>asset/admin/img/edit.png">
					</a>
					<a href="<?php echo base_url() ?>proses/delete/admin/<?php echo $data['username']; ?>/username/user"
						onclick="return confirm('apakah anda yakin akan menghapus ini');">
						<img src="<?php echo base_url() ?>asset/admin/img/delete.png">
					</a>
				</td>
			</tr>
			<?php
		} ?>
	</tbody>
</table>
</div>