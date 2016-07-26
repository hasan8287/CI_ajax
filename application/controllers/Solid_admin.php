<?php
class Solid_admin extends  CI_Controller
{
		


	public function _construct()
	{
		session_start();
	}
	
	#==========================model===========================
	public function tampil_lokasi()
	{
		$id=$this->input->post('product');
		$data['product']=$this->solid_model->getpilih('product','id',$id);
		$this->load->view('admin/model/detail_product');
	}

	#===========================untukl album=======================

	public function terpilih()
	{
		$id=$this->input->post('id');
		$data['jenis']=$this->input->post('jenis');

		$data['album']=$this->solid_model->getpilih('album','id_album',$id);
		$data['foto']=$this->solid_model->get_detail_album_dan_foto($id);
	
		$this->load->view('admin/album/terpilih',$data);
	}
	public function pilih_gambar()
	{
		$pg=$this->input->post('hal');
		$tabel=$this->input->post('tabel');
		$batas=$this->input->post('batas');
		$view=$this->input->post('view');
		$urut=$this->input->post('urut');
		$id=$this->input->post('id');
		if ( empty( $pg ) ) {
			$posisi = 0;
			$pg = 1;
		} else {
			$posisi = ( $pg - 1 ) * $batas;
		}
		$data['foto'] =$this->solid_model->getartikelpagin3($posisi,$batas,$tabel,$urut);
		$data['pg']	  =$pg;
		$data['batas']=$batas;
		#===============pagination=================
		$data['jumlah']= $this->solid_model->jumlah($tabel);
		$data['jml_hal']=ceil($data['jumlah']/$batas);

		$data['album']=$this->db->get_where('album',array('id_album'=>$id));

		$this->load->view('admin/album/pilih',$data);
	}

	public function edit_album()
	{
		$id=$this->input->post('id');
		$data['album']=$this->solid_model->getpilih('album','id_album',$id);
		$data['id']=$id;
		$this->load->view('admin/album/edit',$data);
	}

	#==========================batas tampil pilih gambar====================


	public function tampil()
	{
		$pg=$this->input->post('hal');
		$tabel=$this->input->post('tabel');
		$batas=$this->input->post('batas');
		$view=$this->input->post('view');
		$urut=$this->input->post('urut');
		if ( empty( $pg ) ) {
			$posisi = 0;
			$pg = 1;
		} else {
			$posisi = ( $pg - 1 ) * $batas;
		}
		
		if ($view=='artikel' OR $view=='product') {
			$data['user']=$this->solid_model->getartikelpagin4($posisi,$batas,$tabel,$urut);
		}elseif ($view=="model") {
			$data['user']=$this->db->query("SELECT model.*,produk.judul AS jud_prod,
			album.judul AS judul_album, album.id_album 
			FROM model 
			LEFT JOIN produk ON model.id_produk=produk.id_produk
			LEFT JOIN album ON model.id_album=album.id_album
			ORDER BY model.$urut DESC LIMIT $posisi, $batas");
		}else{
			$data['user'] =$this->solid_model->getartikelpagin3($posisi,$batas,$tabel,$urut);
		}
		$data['pg']	  =$pg;
		$data['batas']=$batas;
		#===============pagination=================
		$data['jumlah']= $this->solid_model->jumlah($tabel);
		$data['jml_hal']=ceil($data['jumlah']/$batas);

		

		$this->load->view('admin/'.$view.'/index',$data);
	}


#===============================untuk menu=====================
	public function pilih_tampil()
	{
		$jenis=$this->input->post('jenis');
		if (!empty($jenis)) {
			if ($jenis=='artikel') {
				$data['tampil']=$this->db->query("SELECT id_artikel AS id_tampil,judul AS judul_tampil
					FROM artikel ORDER BY tgl DESC");
			}elseif ($jenis=='produk') {
				$data['tampil']=$this->db->query("SELECT id_produk AS id_tampil,judul AS judul_tampil FROM produk ORDER BY id_produk DESC");
			}else{
				$data['tampil']=$this->db->query("SELECT id_model AS id_tampil, nama_model AS judul_tampil
				 FROM model ORDER BY id_model DESC");
			}
			$data['jenis']=$jenis;
			$this->load->view('admin/menu/pilih',$data);
		}else{
			?><h3>Anda Belum Memilih Jenis Tampilan</h3><?php
		}
	}



	public function tambah_data()
	{
		$view=$this->input->post('view');
		if ($view=='album') {
			$data['foto']=$this->solid_model->getartikelpagin3(1,8,'foto','id_foto');
			$data['jumlah']= $this->solid_model->jumlah('foto');
			$this->load->view('admin/'.$view.'/tambah',$data);
		}elseif ($view=='model') {
			$data['produk']=$this->db->query("SELECT id_produk,judul,lokasi
				FROM produk ORDER BY id_produk DESC");
			$data['album']=$this->solid_model->getall('album');
			$this->load->view('admin/'.$view.'/tambah',$data);
		}
		elseif($view=='artikel' OR $view=='produk'){
			$data['album']=$this->solid_model->getall('album');
			$this->load->view('admin/'.$view.'/tambah',$data);
		}
		elseif ($view=='menu') {
			$data['menu']=$this->db->query("SELECT nama_menu,id_menu FROM menu
				WHERE menu_utama=0 OR menu_utama=''");
			$this->load->view('admin/'.$view.'/tambah',$data);
		}

		else{
			$this->load->view('admin/'.$view.'/tambah');
		}
	}

	public function edit_form()
	{
		
		$data['tabel']	=$this->input->post('tabel');
		$data['key'] 	=$this->input->post('key');
		$data['id']		=$this->input->post('id');
		$data['pg'] 	=$this->input->post('hal');
		$data['batas']	=$this->input->post('batas');
		$data['view']	=$this->input->post('view');
		$view=$data['view'];
		if ($view=='artikel' OR $view=='produk') {
			$table 	=$data['tabel'];
			$key 	=$data['key'];
			$id 	=$data['id'];
			$data['user']=$this->db->query("SELECT $table.*,album.judul AS judul_album
			FROM $table 
			LEFT JOIN album ON $table.id_album=album.id_album
			WHERE $key=$id");
			$data['album']=$this->db->query("SELECT judul,id_album FROM album");
		}elseif ($view=='model') {
			$table 	=$data['tabel'];
			$key 	=$data['key'];
			$id 	=$data['id'];
			$data['user']=$this->db->query("SELECT $table.*, produk.judul AS judul_produk,
				album.judul AS judul_album FROM model
				LEFT JOIN produk ON model.id_produk=produk.id_produk
				LEFT JOIN album ON model.id_album=album.id_album
				WHERE $key=$id");
			$data['album']=$this->db->query("SELECT judul,id_album FROM album");
			$data['produk']=$this->db->query("SELECT judul,id_produk FROM produk");
		}elseif ($view=='menu') {
			$key 	=$data['key'];
			$id 	=$data['id'];
			$data['user']=$this->db->query("SELECT * FROM menu WHERE $key=$id");
			foreach ($data['user']->result_array() AS $data_menu) {
				$jenis=$data_menu['jenis'];
				$id_tampil=$data_menu['id_tampil'];
				if ($jenis=='artikel') {
					$data['tampil']=$this->db->query("SELECT id_artikel AS id_tampil,judul AS judul_tampil
					FROM artikel ORDER BY tgl DESC");
				}elseif ($jenis=='produk') {
					$data['tampil']=$this->db->query("SELECT id_produk AS id_tampil,judul AS judul_tampil FROM produk ORDER BY id_produk DESC");
				}else{
					$data['tampil']=$this->db->query("SELECT id_model AS id_tampil, nama_model AS judul_tampil
					 FROM model ORDER BY id_model DESC");
				}
			}
			$data['menu']=$this->db->query("SELECT nama_menu,id_menu FROM menu
				WHERE menu_utama=0 OR menu_utama=''");	
		}else{
			$data['user']=$this->db->get_where($data['tabel'],array($data['key']=>$data['id']));
		}		
		$this->load->view('admin/'.$data['view'].'/edit',$data);

	}


	public function edit_form2()
	{
		
		$data['tabel']	=$this->input->post('tabel');
		$data['key'] 	=$this->input->post('key');
		$data['id']		=$this->input->post('id');
		$data['pg'] 	=$this->input->post('hal');
		$data['batas']	=$this->input->post('batas');
		$data['view']	=$this->input->post('view');
		$data['tabel2']	=$this->input->post('tabel2');
		$data['key2'] 	=$this->input->post('key2');
		$data['id2']	=$this->input->post('id2');

		if ($data['view']=="model") {
			$pilih='id,judul';
		}
		
		$data['user']=$this->db->get_where($data['tabel'],array($data['key']=>$data['id']));
		$data['product_terpilih']=$this->solid_model->get_dipilih_where($data['tabel2'],$data['key2'],$data['id2'],$pilih);
		$data['product']=$this->solid_model->get_dipilih_where_negasi($data['tabel2'],$data['key2'],$data['id2'],$pilih);

		#$data['semua']=$data['product']+$data['user'];
		$this->load->view('admin/'.$data['view'].'/edit',$data);

	}

	public function edit_form3()
	{
		
		$data['tabel']	=$this->input->post('tabel');
		$data['key'] 	=$this->input->post('key');
		$data['id']		=$this->input->post('id');
		$data['pg'] 	=$this->input->post('hal');
		$data['batas']	=$this->input->post('batas');
		$data['view']	=$this->input->post('view');


		$data['user']=$this->db->get_where($data['tabel'],array($data['key']=>$data['id']));
		
		
		$this->load->view('admin/'.$data['view'].'/edit',$data);

	}

	public function tampil_album()
	{
		$data['id']		=$this->input->post('id');
		$data['key']	="id_album";
		$data['tabel']	="album";
		$data['user']	=$this->db->get_where($data['tabel'],array($data['key']=>$data['id']));

		$data['foto']=$this->solid_model->get_detail_album_dan_foto($data['id']);
		$this->load->view('admin/album/detail',$data);
	}
/*
	public function simpan_tambah()
	{
		$field=$this->input->post('field');
		$tabel=$this->input->post('tabel');
		$view=$this->input->post('view');
		$id_filter=$this->input->post('id');
		$ex_field=explode(",", $field);
		$jml_field=count($ex_field);
		$nama="";
		for ($i=0; $i <$jml_field ; $i++) { 
			$nama=$ex_field[$i];
			$data[$nama]=$this->input->post
		}
	}
*/
}
?>