<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Solid_model extends CI_Model
{


	/*public function left_join_where($tabel1,$tabel2,$lainya,$key,$id,$foreign,$primary2)
	{	
		return $this->db->query("SELECT $tabel1.*, $tabel2.$lainya FROM 
			$tabel1 LEFT JOIN $tabel2 ON $tabel1.$foreign=$tabel2.$primary2
			WHERE $key='$id'");
	}
	public function get_model_edit($id)
	{
		return $this->db->query("SELECT model.*,product.lokasi,product.judul FROM model LEFT JOIN product
			ON model.id_product=product.id WHERE model.id='$id'");
	}

	*/

	public function sebelum($tabel,$id,$key,$terpilih)
	{
		return $this->db->query("SELECT $terpilih FROM $tabel WHERE $key<'$id' 
			ORDER BY $key DESC limit 1");
	}

	public function sesudah($tabel,$id,$key,$terpilih)
	{
		return $this->db->query("SELECT $terpilih FROM $tabel WHERE $key>'$id' 
			ORDER BY $key ASC limit 1");
	}


	public function sebelum_ar($tabel,$id,$key,$terpilih)
	{
		return $this->db->query("SELECT $terpilih FROM $tabel WHERE $key<'$id' 
			AND $key!='1' AND $key!='2'
			ORDER BY $key DESC limit 1");
	}

	public function sesudah_ar($tabel,$id,$key,$terpilih)
	{
		return $this->db->query("SELECT $terpilih FROM $tabel WHERE $key>'$id' 
			AND $key!='1' AND $key!='2'
			ORDER BY $key ASC limit 1");
	}


	public function get_album($tabel,$key,$id)
	{
		return $this->db->query("SELECT $tabel.id_album,foto.foto,foto.judul FROM
			$tabel 
			INNER JOIN detail_album ON $tabel.id_album=detail_album.id_album
			INNER JOIN foto ON detail_album.id_foto=foto.id_foto
			WHERE $tabel.$key='$id'");
	}

	public function get_foto($tabel,$key,$id)
	{
		return $this->db->query("SELECT produk.id_produk, foto.foto,foto.judul FROM produk 
			INNER JOIN album ON produk.id_album=album.id_album
			INNER JOIN detail_album ON album.id_album=detail_album.id_album
			INNER JOIN foto ON detail_album.id_foto=foto.id_foto
			WHERE $tabel.$key='$id'
			GROUP BY detail_album.id_detail 

			");
	}

	public function get_detail_album_dan_foto($id)
	{
		return $this->db->query("SELECT detail_album.*, foto.* FROM detail_album LEFT JOIN foto
			ON detail_album.id_foto=foto.id_foto WHERE id_album='$id'");
	}

	public function get_dipilih_where($tabel,$key,$id,$dipilih)
	{
	
		return $this->db->query("SELECT $dipilih FROM $tabel WHERE $key='$id'");
	}
	public function get_dipilih_where_negasi($tabel,$key,$id,$dipilih)
	{
	
		return $this->db->query("SELECT $dipilih FROM $tabel WHERE $key!='$id'");
	}

	public function akhir($tabel,$key)
	{
		return $this->db->query("SELECT * FROM $tabel ORDER BY $key DESC limit 1");
	}

	public function pilih_samping($tabel,$key,$urut,$dipilih,$limit,$id)
	{
		if ($tabel=='model') {
			$wer='WHERE model.tersedia>0';
		}else{
			$wer='';
		}
		return $this->db->query("SELECT  $tabel.$dipilih, $tabel.$id,foto.foto,foto.judul AS judul_foto
			FROM $tabel
			LEFT JOIN detail_album ON $tabel.id_album=detail_album.id_album
			LEFT JOIN foto ON detail_album.id_foto=foto.id_foto
			$wer
			GROUP BY $tabel.$key
			ORDER BY $key $urut LIMIT 2
			");
		
	}

	/*public function d()
	{
		# code...
		return $this->db->query("SELECT * FROM ");
	}*/

/*
	public function wow()
	{
		# code...
		return $this->db->query("SELECT * FROM model 
			INNER JOIN album ON model.id_album=album.id_album
			INNER JOIN detail_album ON album.id_album=detail_album.id_album
			INNER JOIN foto ON detail_album.id_foto=foto.id_foto");
	}*/

	public function pilih_sampingku($tabel,$key,$urut,$dipilih,$limit,$id)
	{
		return $this->db->query("SELECT  $tabel.$dipilih, $tabel.$id,foto.foto,foto.judul AS judul_foto
			FROM $tabel
			LEFT JOIN detail_album ON $tabel.id_album=detail_album.id_album
			LEFT JOIN foto ON detail_album.id_foto=foto.id_foto
			WHERE artikel.id_artikel!='1' AND artikel.id_artikel!='2'
			GROUP BY $tabel.$key
			ORDER BY $key $urut LIMIT $limit
			");
		
	}

	public function hapus($table,$key,$id)
	{
		$this->db->where($key,$id);
		$this->db->delete($table);
	}

	public function editdata($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}
	

	public function insertData($table,$data)
	{
		$this->db->insert($table,$data);
	}

	public function getall($table)
	{
		return $this->db->get($table);
	}

	public function getartikelpagin2($sampai,$dari,$table,$isi)
	{
		$this->db->limit($sampai,$dari);
		$this->db->select($isi);
		return $this->db->get($table);
	}

	public function getartikelpagin($sampai,$dari,$table){
		$this->db->limit($sampai,$dari);
		return $this->db->get($table);
			
	}

	public function getartikelpagin3($posisi,$batas,$table,$urut){
		return $this->db->query("SELECT * FROM $table ORDER BY $urut DESC  LIMIT $posisi, $batas");	
	}


#============================untuk bagian produk====================================================
	public function getpagin_produk($posisi,$batas)
	{
		#SUBSTR(produk.deskripsi,1,300) AS detail,
		return $this->db->query("SELECT produk.id_produk, produk.judul, 
			produk.kota,produk.lokasi, foto.foto,foto.judul AS judul_foto
			FROM produk 
			LEFT JOIN detail_album ON produk.id_album=detail_album.id_album
			LEFT JOIN foto ON detail_album.id_foto=foto.id_foto
			GROUP BY id_produk
			ORDER BY id_produk DESC
			LIMIT $posisi, $batas ");
	}
#==========================untuk prodik selainterpilih==============================
	public function get_produk_lain($id)
	{
		return $this->db->query("SELECT produk.id_produk, produk.judul, 
			produk.kota,produk.lokasi, foto.foto,foto.judul AS judul_foto
			FROM produk 
			LEFT JOIN detail_album ON produk.id_album=detail_album.id_album
			LEFT JOIN foto ON detail_album.id_foto=foto.id_foto
			WHERE produk.id_produk!='$id'
			GROUP BY id_produk
			ORDER BY id_produk DESC
			LIMIT  3");
	}





#====================untuk moodel=======================
	public function get_model_produk($id)
	{
		return $this->db->query("SELECT model.nama_model,model.type,model.harga,model.id_model,model.luas_tanah,model.tersedia,
		produk.lokasi, produk.kota,produk.judul,foto.foto FROM model 
		INNER JOIN produk ON model.id_produk=produk.id_produk
		LEFT JOIN detail_album ON model.id_album=detail_album.id_album
		LEFT JOIN foto ON detail_album.id_foto=foto.id_foto
		WHERE model.id_produk='$id'
		GROUP BY model.id_model
		ORDER BY model.id_produk DESC,model.id_model DESC");
	}





	public function getpagin_artikel($posisi,$batas)
	{
		return $this->db->query("SELECT artikel.id_artikel, artikel.judul, 
			SUBSTR(artikel.isi,1,300) AS detail
			FROM artikel 
			WHERE id_artikel!='1' AND id_artikel!='2'
			GROUP BY id_artikel
			ORDER BY tgl DESC
			LIMIT $posisi, $batas ");
	}

	public function getartikelpagin4($posisi,$batas,$table,$urut){
		return $this->db->query("SELECT $table.*,album.judul AS judul_album, album.id_album 
			FROM $table 
			LEFT JOIN album ON $table.id_album=album.id_album
			ORDER BY $urut DESC  LIMIT $posisi, $batas");	
	}


	public function aaa()
	{
		return $this->db->query("UPDATE foto SET foto='$data[foto]',judul='$data[judul]' WHERE id='$data[id]'");
	}

	public function getpilih($table,$key,$value){
		$this->db->where($key,$value);
		return $this->db->get($table);
	}



	public function jumlah($tabel){
		return $this->db->get($tabel)->num_rows();
	}
	/*
	function jumlah_cek($tabel,$key,$value){
		$this->db->where($key,$value);
		return $this->db->get($tabel)->num_rows();
	}
	*/

	function jumlah_cek($tabel,$key,$value){
		$this->db->where($key,$value);
		return $this->db->get($tabel)->num_rows();
	}

	public function jml_album($tabel,$key,$value)
	{
		$this->db->query("SELECT $tabel.id_album FROM $tabel
			INNER JOIN album ON $tabel.id_album=album.id_album
			INNER JOIN detail_album ON detail_album.id_album=album.id_album
			WHERE $key='$value'")->num_rows();
	}

	public function getlogindata($user,$pass){
		$us=$user;
		$pas=md5($pass);
		$cek_login=$this->db->get_where('admin',array('username'=>$us,'password'=>$pas));
		if (count($cek_login->result())>0) {
			# code...
			foreach ($cek_login->result() as $data) {
				# code...
					$data_ambil=$this->db->get_where('admin', array('username'=>$us));
					foreach ($data_ambil->result() AS $dat) {
						# code...
						$sess_data['logged_in']='yes';
						$sess_data['username']=$dat->username;
						$sess_data['nama']=$dat->nama;
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'admin');
				
			}
		}else{
			#header('location:'.base_url().'solid/admin/error');
			?>
			<script type="text/javascript">
				alert('maaf username/ password anda salah');
				self.history.back();
			</script>
			<?php
		}
	}


}