<?php
class Artikel extends  CI_Controller
{

	public function _construct()
	{
		session_start();
	}

	public function index()
	{
		# code...
		$cek=$this->session->userdata('logged_in');
		$cek_nama=$this->session->userdata('nama');
		if (!empty($cek) || !empty($nama)) {
			# code...
			$dari = $this->uri->segment('3');
			$jml=10;
			$data['artikel']=$this->solid_model->getartikelpagin2($jml,$dari,'artikel','id,judul,tgl');
			#$this->pagin($jml,'admin/artikel/');
			$this->lib_template->display_admin('admin/artikel/artikel',$data);
		}else{
			header('Location:'.base_url().'solid/admin');
		}
	}


	public function tampil_artikel()
	{
		$batas=5;
		$pg = $this->input->post('hal');
		if ($pg==0 || empty($pg)) {
			$pg=1;
			$posisi=0;
		}else{
			$posisi=($pg-1) * $batas;
		}
		$jml=10;
		$data=$this->solid_model->getartikelpagin2($posisi,$batas,'artikel','id,judul,tgl');
		$no=0;
		foreach ($data ->result_array() as $artikel) {
			$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $artikel['judul']; ?></td>
				<td><?php echo $artikel['tgl']; ?></td>
				<td>Aksi</td>

			</tr>
			<?php
		}
	}

	public function form_tambah()
	{
		$this->load->view('admin/artikel/tambah');
	}

}