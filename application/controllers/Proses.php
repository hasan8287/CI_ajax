<?php
class Proses extends  CI_Controller
{
		


	public function _construct()
	{
		session_start();
	}





public function upload_file() {
        $config = array(
            'upload_path' => './uploads/',
            'allowed_types' => 'gif|jpg|png|JPG|JPEG',
            'file_name' => 'file_'.date('dmYHis'),
            'file_ext_tolower' => TRUE,
            'overwrite' => TRUE,
            'max_size' => 100,
            'max_width' => 1024,
            'max_height' => 768,           
            'min_width' => 10,
            'min_height' => 7,     
            'max_filename' => 0,
            'remove_spaces' => TRUE
        );
 
        $this->load->library('upload', $config);
 
        if ( ! $this->upload->do_upload())
        {
            $hasil = $this->upload->display_errors();
            ?>
                <h3><label class="label label-danger msg">Upload file gagal, Detail informasi</label></h3>
                <table class="table table-hover table-bordered">
                    <?php echo "<tr><td><strong>".$hasil."</strong></td></tr>"; ?>
                </table>
            <?php
        }
        else
        {
                $hasil = $this->upload->data();
                ?>
                <h2><label class="label label-success msg">Upload file berhasil, Detail informasi</label></h2>
                <table class="table table-hover table-bordered table-striped">
                    <tr>
                        <td colspan="2">
                            <img src="<?php echo base_url('uploadfiles/'.$hasil['orig_name']);?>" />
                        </td>
                    </tr>
                    <?php
                        foreach($hasil as $res => $value){
                            echo "<tr><td>".$res."</td>";
                            echo "<td>".$value."</td></tr>";
                        }
                    ?>
                </table>
                <?php
        }
    }














function add() {

 $config['upload_path'] = './uploads';
 $config['allowed_types'] = 'gif|jpg|png|doc|pdf|ppt';
 $config['max_size']    = '500';
 $config['max_width']  = '1024';
 $config['max_height']  = '768';
 $this->load->library('upload', $config);
 
 if (!$this->upload->do_upload()) {
 echo 'gagal upload';
  $this->load->library('image_lib');
 $this->image_lib->display_errors();

 }else {
	 /* apabila file yang diupload terlalu besar, kita resize ke ukuran yang diinginkan */
	 $config['image_library'] = 'gd2';
	 $config['source_image'] = $_SERVER['DOCUMENT_ROOT'].'uploads'.$_FILES['userfile']['name'];
	 $config['maintain_ratio'] = FALSE;
	 $config['width'] = 320;
	 $config['height'] = 288;
	 
	 $this->load->library('image_lib', $config);
	 $this->image_lib->resize();
	 
	 /* setelah diresize kita buat thumbnailnya */
	 $conf['image_library'] = 'gd2';
	 $conf['source_image'] = $_SERVER['DOCUMENT_ROOT'].'uploads'.$_FILES['userfile']['name'];
	 $conf['new_image'] = $_SERVER['DOCUMENT_ROOT'].'uploads/thumb/'.$_FILES['userfile']['name'];
	 $conf['create_thumb'] = TRUE;
	 $conf['maintain_ratio'] = FALSE;
	 $conf['width'] = 120;
	 $conf['height'] = 108;
	 
	 $this->load->library('image_lib', $conf);
	 $this->image_lib->initialize($conf);
	 $this->image_lib->resize();
 }
 
}

public function assss()
{
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}

	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}

	if ($_FILES["fileToUpload"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	       # echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}


}



public function proses_user_tes()
{	
	
	$nama="gb_".time();
	$config = array(
	'upload_path' => "./uploads/",
	'allowed_types' => "gif|jpg|png|jpeg|pdf",
	'overwrite' => TRUE,
	//'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
	//'max_height' => "768",
	//'max_width' => "1024",
	'file_name'=>$nama,
	);
	$this->load->library('upload',$config);
	$this->upload->do_upload();

	$upload_data = $this->upload->data();
	$file_name =   $upload_data['file_name'];


	$config['image_library'] = 'gd2';
    $config['source_image'] = './uploads/'.$upload_data['file_name'];
    $config['new_image'] ='./uploads/thumb';
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 200;
    $config['height']       = 170;
    
    $this->load->library('image_lib', $config);
    $this->image_lib->resize();

    $data['id']="";
	$data['foto']=$file_name;
	$data['judul']=$this->input->post('judul');
	$this->solid_model->insertData('foto',$data);


}





















#===============================================album===========================================
public function simpan_album()
{
	$data['id'] 	="";
	$data['judul']	=$this->input->post('judul');
	$data['ket'] 	=$this->input->post('ket');
		#echo "aa=".$data['judul'];
	$this->solid_model->insertData('album',$data);
			?>
			<div class="alert alert-success">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Data Sukses Di Simpan</strong>
			 </div>
			<?php
	
}

#==============================akhir album======================================================

	public function edit_user_proses()
	{
		$id = $this->input->post('username');
		if ($this->input->post('password')!="") {
			$data['password']=md5($this->input->post('password'));
		}


		//$data['password']=$this->input->post('password');
		$data['nama']=$this->input->post('nama');
		$where = array('username'=>$id);
		$this->solid_model->editdata("admin",$data,$where);
		?>
			<div class="alert alert-success">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Data Berhasil Di Ubah</strong>
			 </div>
		<?php		
	}

	public function delete_user()
	{
		# code...
		$id=$this->input->post('username');
		$this->solid_model->hapus('admin','username',$id);
		?>
			<div class="alert alert-success">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Data Berhasil Di Hapus</strong>
			 </div>
		<?php
	}



	public function tes()
	{

		$data['username']=$this->input->post('username');
		$data['password']=md5($this->input->post('password'));
		$data['nama']=$this->input->post('nama');
		$cek=$this->solid_model->jumlah_cek('admin','username',$data['username']);
		if ($cek>0) {
			?>
			<div class="alert alert-danger">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>ma af data tersebut sudah ada</strong>
			 </div>
			<?php
		}else{
			$this->solid_model->insertData('admin',$data);
			?>
			<div class="alert alert-success">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Data Sukses Di Simpan</strong>
			 </div>
			<?php
		}
		
        
	}


#==========================hapus========================
	public function delete()
	{

		$table=$this->uri->segment('3');
		$id=$this->uri->segment('4');
		$key=$this->uri->segment('5');
		$halaman=$this->uri->segment('6');
		$this->solid_model->hapus($table,$key,$id);
		header('Location:'.base_url().'admin/'.$halaman);
	}
#=======================batas hapus=====================

#=================untuk artikel==============================
	public function proses_artikel(){
		$cek=$this->session->userdata('logged_in');
		if (!empty($cek)) {
			$judul=$this->input->post('judul');
			$judul_ex=explode(" ", $judul);
			$jml_ex=count($judul_ex);
			$url="";
			for ($i=0; $i <$jml_ex; $i++) { 
				# code...
				if ($i==0) {
					# code...
					$url=$judul_ex[$i];
				}else{
					$url=$url."-".$judul_ex[$i];	
				}
				
			}
				$data['judul']=$judul;
				$data['isi']=$this->input->post('isi');
				$data['url']=$url;
				$data['tgl']=date('Y-m-d');
			
			
			$aksi=$this->input->post('aksi');
			if ($aksi=="tambah") {
				$data['id']="";
				
				$this->solid_model->insertData('artikel',$data);
				header('Location:'.base_url().'admin/artikel');
			}elseif ($aksi=="edit") {

				$id = $this->input->post('id');
				$where = array('id'=>$id);
				$this->solid_model->editdata("artikel",$data,$where);
				header('Location:'.base_url().'admin/artikel');
			}else{
				header('Location:'.base_url().'admin/artikel');
			}

		}else{
			header('Location:'.base_url().'solid/admin');
		}

	}
#==============================batas artikel============================
	#==================untuk user================================
	public function proses_user()
	{
		$cek=$this->session->userdata('logged_in');
		if (!empty($cek)) {
			$user=$this->input->post('user');
			$cek_row=$this->solid_model->jumlah_cek('admin','username',$user);
			$aksi=$this->input->post('aksi');
			if ($cek_row>0 && $aksi=="tambah") {
				?>
					<script type="text/javascript">
						alert('ma af, username yang anda masukan sudah ada!');
						self.history.back();
					</script>
				<?php
			}else{
				$data['username']=$this->input->post('user');
				if ($this->input->post('pass')!="") {
					$data['password']=md5($this->input->post('pass'));
				}
				$data['nama']=$this->input->post('nama');
				if ($aksi=="tambah") {
					$this->solid_model->insertData('admin',$data);
					header('Location:'.base_url().'admin/user');
				}elseif ($aksi=="edit") {
					$id = $this->input->post('user');
					$where = array('username'=>$id);
					$this->solid_model->editdata("admin",$data,$where);
					header('Location:'.base_url().'admin/user');
				}else{
					header('Location:'.base_url().'admin/user');
				}
			}	
		}else{
			header('Location:'.base_url().'solid/admin');
		}
	}

	#====================batas user==============================

}