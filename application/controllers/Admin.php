<?php
class Admin extends  CI_Controller
{
		
	public function _construct()
	{
		session_start();
	}
	public function home()
	{
		$cek 		= $this->session->userdata('logged_in');
		$cek_nama 	= $this->session->userdata('nama');
		if(!empty($cek) || !empty($cek_nama)){
			$data['nama']=$cek_nama;
			$this->load->view('admin/home',$data);
		}else{
			header('Location:'.base_url().'solid/admin');
		}

	}
	public function index()
	{
		# code...
		$cek 		= $this->session->userdata('logged_in');
		$cek_nama 	= $this->session->userdata('nama');
		if(!empty($cek) || !empty($cek_nama)){
			$data['nama']=$cek_nama;
			#$this->lib_template->display_admin('admin/index',$data);
			$this->load->view('admin/home',$data);
		}else{
			header('Location:'.base_url().'solid/admin');
		}
	}
	public function data_user()
	{	
		$cek 		= $this->session->userdata('logged_in');
		$cek_nama 	= $this->session->userdata('nama');
		if(!empty($cek) || !empty($cek_nama)){
			$this->lib_template->display_admin('tes/tes');
			#$this->load->view('tes/tes');
			#echo "silitmania";
		}else{
			header('Location:'.base_url().'solid/admin');
		}
	}
#========================================album==================================
	public function data_album()
	{
		$cek 		= $this->session->userdata('logged_in');
		$cek_nama 	= $this->session->userdata('nama');
		if(!empty($cek) || !empty($cek_nama)){
			$this->lib_template->display_admin('admin/album/index');
		}else{
			header('Location:'.base_url().'solid/admin');
		}
	}

	public function tambah_gambarnya()
	{
		$jml=$this->input->post('jml_foto');
		for ($i=2; $i <=$jml ; $i++) { 
			$nama="foto".$i;
			?>
			<input type="file" name="<?php echo $nama; ?>"></input>
			<?php
		}
	}

#================================album di atas=================================

	public function edit_userku()
	{
		
		$id=$this->input->post('username');
		$data['admin']=$this->db->get_where('admin',array('username'=>$id));
		$this->load->view('tes/tes2',$data);
	}

	public function edit_userku2()
	{
		
		$id=$this->input->post('username');
		$datar=$this->db->get_where('admin',array('username'=>$id));
		foreach ($datar->result_array() As $dat) {
			$data = array('user' => $dat['username'], 'nama' => $dat['nama']);
		}
		
		echo json_encode($data);

	}


	public function paging_tes()
	{
		
		$perhalaman=5;
		$dari=$this->input->post('hal');
		$jumlah= $this->solid_model->jumlah('admin');
		$jml_hal=ceil($jumlah/$perhalaman);
		if ($dari<=0) {
			$dari=1;
		}

		?>
			<ul class="pagination">
		<?php
			for ($i=1; $i <=$jml_hal ; $i++) { 
				$tam=$i+1;

				if ($i==$dari) {
					$clas="active";
				}else{
					$clas="";
				}
		?>
			<li class="<?php echo $clas; ?>"><a href="#" onclick="tampil(<?php echo $i; ?>)">
				<?php echo $i; ?>
			</a></li>
		<?php		
			}
		?>
			</ul>
		<?php
		
	}

	public function foto()
	{
		$cek=$this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->lib_template->display_admin('admin/foto/index');
		}else{
			header('Location:'.base_url().'solid/admin');
		}

	}



	public function tampil_tes()
	{
		
		
		$batas=5;

		$pg = $this->input->post('hal');


		if ( empty( $pg ) ) {
			$posisi = 0;
			$pg = 1;
		} else {
			$posisi = ( $pg - 1 ) * $batas;
		}

		$data['user']=$this->solid_model->getartikelpagin3($posisi,$batas,'admin','id');
		$no=0;

		foreach ($data['user']->result_array() AS $data){
			$no++;
			?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $data['nama']; ?> </td>
					<td><?php echo $data['username']; ?></td>
					<td>
						<a href="#" onclick="deleted('<?php echo $data['username']; ?>')">	
							<button type="button" class="btn btn-danger btn-sm">
          						<span class="glyphicon glyphicon-trash"></span>  
        					</button>
        				</a>
        				<a href="#" onclick="edit_user2('<?php echo $data['username']; ?>')"
        					class="btn btn-info btn-sm">
				          <span class="glyphicon glyphicon-cog"></span> 
				        </a>
					</td>
				</tr>
			<?php
		}

	}



	public function tampil_foto()
	{
		$batas=5;

		$pg = $this->input->post('hal');


		if ( empty( $pg ) ) {
			$posisi = 0;
			$pg = 1;
		} else {
			$posisi = ( $pg - 1 ) * $batas;
		}

		$data['user']=$this->solid_model->getartikelpagin3($posisi,$batas,'foto','id');
		$no=0;
		?>
		<table><tr>
		<?php
		foreach ($data['user']->result_array() AS $data){
			$no++;
			?>
				<td>
				<div class="thumbnail" style="max-width: 100px;">
					<?php echo $data['judul']; ?>
					<?php 
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
					 ?>
					<img src="<?php echo base_url() ?>cdn/uploads/thumb/<?php echo $nama; ?>">
				</div>
				</td>
			<?php
		}
		?></tr>
		</table>
		<?php
	}

#===============================untuk user======================================
	public function user()
	{
		$cek=$this->session->userdata('logged_in');
		if (!empty($cek)) {
			#$data['user']=$this->solid_model->getall('admin');
			
			$dari = $this->uri->segment('3');
			$data['user']=$this->solid_model->getartikelpagin2(10,$dari,'admin','username,nama');
			$this->lib_template->display_admin('admin/user/user',$data);
			
			#$this->load->view('admin/user/user');
			#echo "hahah";
		}else{
			header('Location:'.base_url().'solid/admin');
		}
	}

	public function tambah_user()
	{
		$cek=$this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->lib_template->display_admin('admin/user/tambah');
		}else{
			header('Location:'.base_url().'solid/admin');
		}
	}

	public function edit_user()
	{
		$cek=$this->session->userdata('logged_in');
		if (!empty($cek)) {
			$id= $this->uri->segment('3');
			$data['admin']=$this->db->get_where('admin',array('username'=>$id));
			$this->lib_template->display_admin('admin/user/edit',$data);
		}else{
			header('Location:'.base_url().'solid/admin');
		}
	}	
#=========================batas user=======================================

#==========================================untuk artikel=============================
	public function artikel()
	{
		# code...
		$cek=$this->session->userdata('logged_in');
		$cek_nama=$this->session->userdata('nama');
		if (!empty($cek) || !empty($nama)) {
			# code...
			$dari = $this->uri->segment('3');
			$jml=10;
			$data['artikel']=$this->solid_model->getartikelpagin2($jml,$dari,'artikel','id,judul,tgl');
			$data['album']=$this->solid_model->akhir('album','id');
			$this->pagin($jml,'admin/artikel/');
			$this->lib_template->display_admin('admin/artikel/artikel',$data);
		}else{
			header('Location:'.base_url().'solid/admin');
		}
	}

	public function tambah_artikel()
	{
		# code...
		$cek=$this->session->userdata('logged_in');
		if (!empty($cek)) {
			# code...
			$this->lib_template->display_admin('admin/artikel/tambah');
		}else{
			header('Location:'.base_url().'solid/admin');
		}
	}


	public function edit_artikel(){
		$cek=$this->session->userdata('logged_in');
		if (!empty($cek)) {
			# code...
			$id= $this->uri->segment('3');
			$data['artikel']=$this->db->get_where('artikel',array('id'=>$id));
			$this->lib_template->display_admin('admin/artikel/edit',$data);
		}else{
			header('Location:'.base_url().'solid/admin');
		}
	}

#========================batas artikel==========================================

	public function tes()
	{
		# code...
		$this->lib_template->display_admin('tes/tes');
	}


	public function pagin2($jml,$dari)
	{
		# code...
		$jumlah= $this->solid_model->jumlah('admin');

		$config['base_url'] ="#";
		$config['total_rows'] = $jumlah;
		$config['per_page'] = $jml; 

		
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);	
	}

	public function pagin($jml,$url)
	{
		$jumlah= $this->solid_model->jumlah('artikel');

		$config['base_url'] = base_url().$url;
		$config['total_rows'] = $jumlah;
		$config['per_page'] = $jml; 

		
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);	
	}


	public function keluar()
	{
		session_destroy();
		header('Location:'.base_url());
	}


}