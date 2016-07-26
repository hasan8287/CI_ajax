<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Web_App_Model extends CI_Model
{
	public function getlogindata($user,$pass){
		$us=$user;
		$pas=md5($pass);
		$cek_login=$this->db->get_where('tbl_login',array('username'
			=>$us,'password'=>$pas));
		if (count($cek_login->result())>0) {
			# code...
			foreach ($cek_login->result() as $data) {
				# code...
				if ($data->stts=='mahasiswa') {
					# code...
					$data_ambil=$this->db->get_where('tbl_mahasiswa',array('nim'=>$us));
					foreach ($data_ambil->result() as $mhs) {
						# code...
						$sess_data['logged_in']='yes';
						$sess_data['nim']=$mhs->nim;
						$sess_data['nama']=$mhs->nama_mahasiswa;
						$sess_data['angkatan']=$mhs->angkatan;
						$sess_data['jurusan']=$mhs->jurusan;
						$sess_data['stts']='mahasiswa';
						$sess_data['program']=$mhs->kelas_program;
						$this->session->set_userdata($sess_data);
					}
				}elseif ($data->stts=='dosen') {
					# code...
					$data_ambil=$this->db->get_where('tbl_dosen',array('kd_dosen'=>$us));
					foreach ($$data_ambil->result() AS $dat) {
						# code...
						$sess_data['logged_in']='yes';
						$sess_data['kd_dosen']=$dat->kd_dosen;
						$sess_data['nidn']=$dat->nidn;
						$sess_data['stts']='dosen';
						$this->session->set_userdata($sess_data);
					}

				}elseif ($data->stts=='admin') {
					# code...
					$data_ambil=$this->db->get_where('tbl_admin', array('username'=>$us));
					foreach ($data_ambil->result() AS $dat) {
						# code...
						$sess_data['logged_in']='yes';
						$sess_data['username']=$dat->username;
						$sess_data['nama']=$dat->nama_lengkap;
						$sess_data['stts']='admin';
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'admin');
				}
			}
		}else{
			echo "salah";
		}
	}

	public function getsemuajadwal(){
		return $this->db->query('SELECT 
		a.kd_jadwal,b.nama_mk,b.kd_mk,b.semester,b.jum_sks,a.kapasitas,
		a.kelas,c.kd_dosen,a.jadwal,d.Peserta,d.CalonPeserta,c.nama_dosen FROM 
		tbl_jadwal a 
		left join tbl_mk b on a.kd_mk=b.kd_mk 
		left join tbl_dosen c on a.kd_dosen=c.kd_dosen 
		left join (
		SELECT kd_jadwal,detail.kelas_program,
		SUM(CASE status WHEN 1 THEN 1 ELSE 0 END ) AS Peserta, 
		SUM(CASE status WHEN 0 THEN 1 ELSE 0 END ) AS CalonPeserta
		FROM tbl_perwalian_header
		LEFT JOIN 
		(select k.kd_jadwal,l.kelas_program,l.kd_mk,k.nim from 
			tbl_perwalian_detail k left join tbl_jadwal l on k.kd_jadwal=l.kd_jadwal) 
			 as detail
		ON tbl_perwalian_header.nim = detail.nim group by kd_jadwal
		) as d
		on a.kd_jadwal=d.kd_jadwal');
	}
	
	public function getalldata($table){
		return $this->db->get($table);
	}

	public function getselecteddata($table,$key,$value){
		$this->db->where($key,$value);
		return $this->db->get($table);
	}

	function updateDataMultiField($table,$data,$fiel_key){
		$this->db->update($table,$data,$fiel_key);
	}
	function deleteData($table,$data){
		$this->db->delete($table,$data);
	}
}

?>