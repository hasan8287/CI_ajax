<?php 

class Proses_admin extends  CI_Controller
{
		


	public function _construct()
	{
		session_start();
	}


	public function delete()
	{
		$id 	=$this->input->post('id');
		$key 	=$this->input->post('key');
		$tabel 	=$this->input->post('tabel');
		if ($tabel=="foto") {
			$data_foto=$this->solid_model->getpilih($tabel,$key,$id);
			foreach ($data_foto->result_array() AS $data) {
				$ex_foto=explode(".", $data['foto']);
				$jml 	=count($ex_foto)-1;
				$nama="";
				for ($i=0; $i <=$jml ; $i++) { 
					if ($i==0) {
						$nama=$ex_foto[0];
					}elseif ($i<$jml) {
						$nama=$nama.".".$ex_foto[$i];
					}else{
						$nama=$nama."_thumb.".$ex_foto[$i];
					}
				}
				$thumb=$nama;
				$link1='./cdn/uploads/thumb/'.$thumb;
				$link2='./cdn/uploads/'.$data['foto'];
				unlink($link2);
				unlink($link1);
				$this->solid_model->hapus($tabel,$key,$id);
				$this->solid_model->hapus('detail_album',$key,$id);
			}
		}elseif ($tabel=="album") {
			$this->solid_model->hapus($tabel,$key,$id);
			$this->solid_model->hapus('detail_album',$key,$id);
		}else{

			$this->solid_model->hapus($tabel,$key,$id);

		}
		?>
			<div class="alert alert-success">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Data Berhasil Di Hapus</strong>	    
			 </div>
		<?php
	}
#====================profil================


public function edit_user_profil()
{
	$nama=$this->input->post('nama');
	$alamat=$this->input->post('alamat');
	$telp=$this->input->post('telp');
	$email=$this->input->post('email');
	$this->db->query("UPDATE profil SET nama='$nama',alamat='$alamat',telp='$telp',email='$email'");
	?>
	<div class="alert alert-success">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    <strong>Data Sukses Di Simpan</strong>
	 </div>
	<?php
}
#==========================menu=======================
public function tambah_menu()
{
	$data['id_menu']="";
	$data['nama_menu']=$this->input->post('nama');
	$data['jenis']=$this->input->post('jenis');
	$data['id_tampil']=$this->input->post('id_tampil');
	if (empty($data['id_tampil'])) {
		$data['id_tampil']=0;
	}
	$data['menu_utama']=$this->input->post('id_menu');
	$this->solid_model->insertData('menu',$data);
	?>
	<div class="alert alert-success">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    <strong>Data Sukses Di Simpan</strong>
	 </div>
	<?php
}
public function edit_user_menu()
{
	$id=$this->input->post('id');
	$data['nama_menu']=$this->input->post('nama');
	$data['jenis']=$this->input->post('jenis');
	$data['id_tampil']=$this->input->post('id_tampil');
	$data['menu_utama']=$this->input->post('id_menu');
	$where = array('id_menu'=>$id);
	$this->solid_model->editdata("menu",$data,$where);
	?>
	<div class="alert alert-success">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    <strong>Data Sukses Di Simpan</strong>
	 </div>
	<?php
}

#==========================model===============

public function tambah_model()
{
	$data['id_model']	="";
	$data['id_produk']	=$this->input->post('id_product');
	$data['id_album']	=$this->input->post('id_album');
	$data['nama_model']	=$this->input->post('nama_model');
	$data['type']		=$this->input->post('type');
	$data['harga'] 		=$this->input->post('harga');
	$data['luas_tanah'] =$this->input->post('tanah');
	$data['tersedia'] =$this->input->post('tersedia');
	$data['deskripsi']	=$this->input->post('deskripsi');
	$this->solid_model->insertData('model',$data);
}

public function edit_model()
{
	$id=$this->input->post('id');
	$data['id_produk']	=$this->input->post('id_product');
	$data['id_album']	=$this->input->post('id_album_edit');
	$data['nama_model']	=$this->input->post('nama_model');
	$data['type'] 		=$this->input->post('type');
	$data['harga'] 		=$this->input->post('harga');
	$data['luas_tanah'] =$this->input->post('tanah');
	$data['tersedia'] =$this->input->post('tersedia');
	$data['deskripsi']	=$this->input->post('deskripsi');
	$where = array('id_model'=>$id);
	$this->solid_model->editdata("model",$data,$where);
}

#============================procut=======================
public function tambah_product()
{

	$data['id_produk']="";
	$data['id_album']=$this->input->post('id_album');
	$data['judul']=$this->input->post('judul');
	$data['kota']=$this->input->post('kota');
	$data['lokasi']=$this->input->post('lokasi');
	$data['deskripsi']=$this->input->post('deskripsi');
	$this->load->library('upload');
	$this->upload->data();

	$nama_file = $_FILES['gambar']['name'];
	if (!empty($nama_file)) {
		$ukuran_file = $_FILES['gambar']['size'];
		$tipe_file = $_FILES['gambar']['type'];
		$tmp_file = $_FILES['gambar']['tmp_name'];
		$nam_file_unil=time()."_".$nama_file;
		$path = "./cdn/uploads/peta/".$nam_file_unil;
		move_uploaded_file($tmp_file, $path);
	}else{
		$nam_file_unil="";
	}

	$nama_file_denah = $_FILES['denah']['name'];
	if (!empty($nama_file_denah)) {
		$ukuran_file2 = $_FILES['denah']['size'];
		$tipe_file2 = $_FILES['denah']['type'];
		$tmp_file2 = $_FILES['denah']['tmp_name'];
		$nam_file_unil2=time()."_".$nama_file_denah;
		$path2 = "./cdn/uploads/denah/".$nam_file_unil2;
		move_uploaded_file($tmp_file2, $path2);
	}else{
		$nam_file_unil2="";
	}
	$data['peta']=$nam_file_unil;
	$data['denah']=$nam_file_unil2;
	$this->solid_model->insertData('produk',$data);
}


public function upload_foto($fupload_name){
  //direktori banner
  $vdir_upload = "./cdn/uploads/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}



public function edit_product()
{
	$id=$this->input->post('id');
	$data['id_album']=$this->input->post('id_album_edit');
	$data['judul']=$this->input->post('judul_edit');
	$data['kota']=$this->input->post('kota_edit');
	$data['lokasi']=$this->input->post('lokasi_edit');
	$data['deskripsi']=$this->input->post('deskripsi_edit');
	$nama_file = $_FILES['gambar']['name'];
	$lama=$this->db->query("SELECT peta,denah FROM produk WHERE id_produk='$id'");
	if (!empty($nama_file)) {
		$ukuran_file = $_FILES['gambar']['size'];
		$tipe_file = $_FILES['gambar']['type'];
		$tmp_file = $_FILES['gambar']['tmp_name'];
		$nam_file_unil=time()."_".$nama_file;
		$path = "./cdn/uploads/peta/".$nam_file_unil;
		move_uploaded_file($tmp_file, $path);
		$data['peta']=$nam_file_unil;
		foreach ($lama->result_array() AS $data_peta) {
			$link1='./cdn/uploads/peta/'.$data_peta['peta'];
				unlink($link1);
		}
	}
	$nama_file_denah = $_FILES['denah']['name'];
	if (!empty($nama_file_denah)) {
		$ukuran_file2 = $_FILES['denah']['size'];
		$tipe_file2 = $_FILES['denah']['type'];
		$tmp_file2 = $_FILES['denah']['tmp_name'];
		$nam_file_unil2=time()."_".$nama_file_denah;
		$path2 = "./cdn/uploads/denah/".$nam_file_unil2;
		move_uploaded_file($tmp_file2, $path2);
		$data['denah']=$nam_file_unil2;
		foreach ($lama->result_array() AS $data_peta) {
			$link2='./cdn/uploads/denah/'.$data_peta['denah'];
				unlink($link2);
		}
	}
	$where = array('id_produk'=>$id);
	$this->solid_model->editdata("produk",$data,$where);
}
#===============================artiker===================
	public function tambah_artikel()
	{
		#id_album$judul=

		$data['id_artikel']="";
		$data['id_album']=$this->input->post('id_album');
		$data['judul']=$this->input->post('judul');
		$data['isi']=$this->input->post('isi');
		$data['tgl']=date('Y-m-d');
		$this->solid_model->insertData('artikel',$data);
	
		/*
		?>
		<div class="alert alert-success">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    <strong>Data Sukses Di Simpan
		    <?php echo "aaa=".$data['isi']; ?>
		    </strong>
		 </div>
		<?php
		*/
	}

	public function edit_artikel()
	{
		$data['judul']		=$this->input->post('judul_edit');
		$data['id_album']	=$this->input->post('id_album_edit');
		$data['isi']		=$this->input->post('isi_edit');
		$data['tgl']		=date('Y-m-d');
		$id 				=$this->input->post('id');
		$where = array('id_artikel'=>$id);
		$this->solid_model->editdata("artikel",$data,$where);

	}
#==========================album====================
	public function tambah_album()
	{
		$data['id_album']=$this->input->post('id');
		$data['judul']=$this->input->post('judul');
		$data['keterangan']=$this->input->post('deskrisi');
		$this->solid_model->insertData('album',$data);
		$album=$this->solid_model->akhir('album','id_album');
		foreach ($album->result_array() AS $data_album) {
			echo $data_album['id_album'];
		}
	}

	public function edit_album()
	{
		$id=$this->input->post('id');;
		$data['judul']=$this->input->post('judul');
		$data['keterangan']=$this->input->post('deskrisi');
		$where = array('id_album'=>$id);
		$this->solid_model->editdata("album",$data,$where);
		?>
			<div class="alert alert-success">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Data Berhasil Di Ubah</strong>
			 </div>
		<?php

	}

	public function hapus_gambar()
	{
		$id=$this->input->post('id');
		$id_detail=$this->input->post('urutan');
		$key='id_detail';
		$tabel='detail_album';
		$this->solid_model->hapus($tabel,$key,$id_detail);	
	}

	public function pilih_gambar()
	{
		$data['id_detail']="";
		$data['id_album']=$this->input->post('id');
		$data['id_foto']=$this->input->post('id_foto');

		$this->solid_model->insertData('detail_album',$data);

	}


	public function tambah_admin()
	{
		$data['username']=$this->input->post('username');
		$data['password']=md5($this->input->post('password'));
		$data['nama']=$this->input->post('nama');
		$cek=$this->solid_model->jumlah_cek('admin','username',$data['username']);
		if ($cek>0) {
			?>
			<div class="alert alert-danger">
			    <a href="#" class="close" dat2a-dismiss="alert" aria-label="close">&times;</a>
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



	public function tambah_foto()
	{


		$nama="gb_".time();
		$config = array(
		'upload_path' => "./cdn/uploads/",
		'allowed_types' => "gif|jpg|png|jpeg|pdf",
		'overwrite' => TRUE,
		//'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)24000
		//'max_height' => "768",
		//'max_width' => "1024",
		'file_name'=>$nama,
		);
		$this->load->library('upload',$config);
		$this->upload->do_upload();

		$upload_data = $this->upload->data();
		$file_name =   $upload_data['file_name'];


		$config['image_library'] = 'gd2';
	    $config['source_image'] = './cdn/uploads/'.$upload_data['file_name'];
	    $config['new_image'] ='./cdn/uploads/thumb';
	    $config['create_thumb'] = TRUE;
	    $config['maintain_ratio'] = TRUE;
	    $config['width']         = 200;
	    $config['height']       = 170;
	    
	    $this->load->library('image_lib', $config);
	    $this->image_lib->resize();

	    $data['id_foto']="";
		$data['foto']=$file_name;
		$data['judul']=$this->input->post('judul');
		$this->solid_model->insertData('foto',$data);
	}

	public function edit_foto()
	{

		$nama="gb_".time();
		$config = array(
		'upload_path' => "./cdn/uploads/",
		'allowed_types' => "gif|jpg|png|jpeg|PNG|JPG|JPEG",
		'overwrite' => TRUE,
	//	'max_size' => "3048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
	//	'max_height' => "1368",
	//	'max_width' => "1824",
		'file_name'=>$nama,
		);
		$this->load->library('upload',$config);
		$this->upload->do_upload();

		$upload1=$upload_data = $this->upload->data();
		$file_name =   $upload_data['file_name'];


		$config['image_library'] = 'gd2';
	    $config['source_image'] = './cdn/uploads/'.$upload_data['file_name'];
	    $config['new_image'] ='./cdn/uploads/thumb';
	    $config['create_thumb'] = TRUE;
	    $config['maintain_ratio'] = TRUE;
	    $config['width']         = 200;
	    $config['height']       = 170;

	    $this->load->library('image_lib', $config);
	   	$upload2=$this->image_lib->resize();


		$id 	=$this->input->post('id');
		$key 	='id_foto';
		$tabel 	='foto';
		if ($upload1 AND $upload2) {
			# code...
		
			$data_foto=$this->solid_model->getpilih($tabel,$key,$id);
			foreach ($data_foto->result_array() AS $data) {
				$ex_foto=explode(".", $data['foto']);
				$jml 	=count($ex_foto)-1;
				$nama_foto="";
				for ($i=0; $i <=$jml ; $i++) { 
					if ($i==0) {
						$nama_foto=$ex_foto[0];
					}elseif ($i<$jml) {
						$nama_foto=$nama_foto.".".$ex_foto[$i];
					}else{
						$nama_foto=$nama_foto."_thumb.".$ex_foto[$i];
					}
				}
				$thumb=$nama_foto;
				$link1='./cdn/uploads/thumb/'.$thumb;
				$link2='./cdn/uploads/'.$data['foto'];
				unlink($link2);
				unlink($link1);
			}
		}
		if ($upload1 AND $upload2) {
			$datar['foto']=$file_name;
		}
		$datar['judul']=$this->input->post('judul');
		$where = array('id_foto'=>$id);
		$this->solid_model->editdata("foto",$datar,$where);
	}



}
?>