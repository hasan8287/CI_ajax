<?php
class Solid extends  CI_Controller
{
		

	public function _construct()
	{
		

	}


	public function admin()
	{
		# code...
		$frm['username'] = array('name' => 'username',
				'id' => 'username',
				'type' => 'text',
				'value' => '',
				'class' => 'form-control',
				'placeholder' => 'Masukkan username.....'
		);
		$frm['password'] = array('name' => 'password',
			'id' => 'password',
			'type' => 'password',
			'value' => '',
			'class' => 'form-control',
			'placeholder' => 'Masukkan password.....'
		);
		$this->load->view('admin/login',$frm);
	}

	public function proses_login()
	{
		$u = $this->input->post('username');
		$p = $this->input->post('password');
		$this->solid_model->getLoginData($u,$p);
	}

	public function index(){
		$data['album']=$this->db->query("SELECT id_album FROM album ORDER BY id_album ASC limit 1");
		foreach ($data['album']->result_array() AS $data_album) {
			$data['detail_album']=$this->db->query("SELECT detail_album.id_detail, foto.foto, foto.judul
				FROM detail_album INNER JOIN foto ON detail_album.id_foto=foto.id_foto
				WHERE id_album='$data_album[id_album]'");
		}
		#$this->load->view('solid/slide',$data);	
		
		$data['menu']=$this->db->get_where('menu',array('menu_utama'=>0));
		$data['menu2']=$this->db->query("SELECT * FROM menu WHERE menu_utama!=0");
		$data['profil']=$this->solid_model->getall('profil');
		$data['samping_produk']=$this->solid_model->pilih_samping('produk','id_produk','DESC','judul',1,'id_produk');
		$data['samping_model']=$this->solid_model->pilih_samping('model','id_model','DESC','nama_model',1,'id_model');
		$data['samping_artikel']=$this->solid_model->pilih_sampingku('artikel','tgl','ASC','judul',1,'id_artikel');

		$this->lib_template->display3('solid/solid',$data);

	}

	public function pencarian()
	{
		$kota 		= $this->input->post('kota');
		$harga_awal = $this->input->post('harga_awal');
		$harga_akhir= $this->input->post('harga_akhir');
		$kata_kunci = $this->input->post('kata_kunci');
		$jenis = $this->input->post('jenis');
		$batas=$this->input->post('batas');
		$pg=$this->input->post('hal');
		if ( empty( $pg ) ) {
			$posisi = 0;
			$pg = 1;
		} else {
			$posisi = ( $pg - 1 ) * $batas;
		}

		if (!empty($kota)) {
			$wer_kota="AND produk.kota LIKE '%$kota%'";
		}else{
			$wer_kota="";
		}
		if ($harga_awal>0) {
			$wer_har_awal="AND model.harga>='$harga_awal'";
		}else{
			$wer_har_awal="";
		}
		if ($harga_akhir>0) {
			$wer_har_akhir="AND model.harga<='$harga_akhir'";
		}else{
			$wer_har_akhir="";
		}
		if (!empty($kata_kunci)) {
			$wer_kunci="AND (produk.judul LIKE '%$kata_kunci%' OR produk.lokasi LIKE '%$kata_kunci%'
						OR model.nama_model LIKE '%$kata_kunci%' OR model.type LIKE '%$kata_kunci%' 
						OR produk.kota LIKE '%$kata_kunci%' OR model.deskripsi LIKE '%$kata_kunci%')";
		}else{
			$wer_kunci="";
		}

		$data['pg']	  =$pg;
		$data['batas']=$batas;
		#===============pagination=================
		

		if ($jenis=="produk") {
			$data['produk']=$this->db->query("SELECT produk.id_produk,produk.id_album,
			produk.judul,produk.kota,produk.lokasi,
			foto.foto 
			FROM produk 
			LEFT JOIN model ON produk.id_produk=model.id_produk
			LEFT JOIN detail_album ON produk.id_album=detail_album.id_album
			LEFT JOIN foto ON detail_album.id_foto=foto.id_foto
			WHERE produk.id_produk!='sadsad' $wer_kota $wer_har_awal $wer_har_akhir $wer_kunci
			GROUP BY produk.id_produk
			LIMIT $posisi, $batas
			");

			$data['jumlah']= $this->db->query("SELECT produk.id_produk,produk.id_album,
			produk.judul,produk.kota,produk.lokasi,
			foto.foto 
			FROM produk 
			LEFT JOIN model ON produk.id_produk=model.id_produk
			LEFT JOIN detail_album ON produk.id_album=detail_album.id_album
			LEFT JOIN foto ON detail_album.id_foto=foto.id_foto
			WHERE produk.id_produk!='sadsad' $wer_kota $wer_har_awal $wer_har_akhir $wer_kunci
			GROUP BY produk.id_produk")->num_rows();
			$data['jml_hal']=ceil($data['jumlah']/$batas);
			$this->load->view('solid/home/hasil_pencarian',$data);

		}else{
			$data['model']=$this->db->query("SELECT model.id_model,model.nama_model,model.type,model.harga,model.luas_tanah,model.tersedia,
			produk.lokasi, produk.kota,produk.judul,foto.foto FROM model 
			LEFT JOIN produk ON model.id_produk=produk.id_produk
			LEFT JOIN detail_album ON model.id_album=detail_album.id_album
			LEFT JOIN foto ON detail_album.id_foto=foto.id_foto
			WHERE model.id_model!='sadsad' AND model.tersedia>0 $wer_kota $wer_har_awal $wer_har_akhir $wer_kunci
			GROUP BY model.id_model
			LIMIT $posisi, $batas
			");
			$data['jumlah']= $this->db->query("SELECT model.nama_model,model.type,model.harga,
			produk.lokasi, produk.kota,produk.judul FROM model 
			LEFT JOIN produk ON model.id_produk=produk.id_produk
			LEFT JOIN detail_album ON model.id_album=detail_album.id_album
			LEFT JOIN foto ON detail_album.id_foto=foto.id_foto
			WHERE model.id_model!='sadsad' AND model.tersedia>0 $wer_kota $wer_har_awal $wer_har_akhir $wer_kunci
			GROUP BY model.id_model
			")->num_rows();
			$data['jml_hal']=ceil($data['jumlah']/$batas);
			$this->load->view('solid/home/hasil_pencarian2',$data);
		}
		
	}

#=========================================untuk produk=====================
	public function detail_produk()
	{
		$data['menu']=$this->db->get_where('menu',array('menu_utama'=>0));
		$data['menu2']=$this->db->query("SELECT * FROM menu WHERE menu_utama!=0");
		$data['samping_produk']=$this->solid_model->pilih_samping('produk','id_produk','DESC','judul',1,'id_produk');
		$data['samping_model']=$this->solid_model->pilih_samping('model','id_model','DESC','nama_model',1,'id_model');
		$data['samping_artikel']=$this->solid_model->pilih_sampingku('artikel','tgl','ASC','judul',1,'id_artikel');
		$data['profil']=$this->solid_model->getall('profil');

	
		$text=$this->uri->segment(1);
		$id=$this->get_id($text);	
		$data['produk']=$this->solid_model->getpilih('produk','id_produk',$id);

		$data['foto']=$this->solid_model->get_foto('produk','id_produk',$id);
		$data['jml_slide']=$this->solid_model->get_foto('produk','id_produk',$id)->num_rows();

		$data['model']=$this->solid_model->get_model_produk($id);
		$data['produk_lain']=$this->solid_model->get_produk_lain($id);
		#======================================id sebelumnya=======================================
		$data['id_sebelumnya']=$this->solid_model->sebelum('produk',$id,'id_produk','id_produk,judul');
		//db->query("SELECT id_produk,judul FROM produk WHERE id_produk<'$id' ORDER BY id_produk DESC limit 1");

		#==============================id selanutnya======================================
		$data['id_selanjutnya']=$this->solid_model->sesudah('produk',$id,'id_produk','id_produk,judul');
		//db->query("SELECT id_produk,judul FROM produk WHERE id_produk>'$id' ORDER BY id_produk ASC  limit 1");
		$this->lib_template->display('solid/produk/index',$data);
	}




	public function product()
	{
		$data['menu']=$this->db->get_where('menu',array('menu_utama'=>0));
		$data['menu2']=$this->db->query("SELECT * FROM menu WHERE menu_utama!=0");
		$data['profil']=$this->solid_model->getall('profil');
		$data['samping_produk']=$this->solid_model->pilih_samping('produk','id_produk','DESC','judul',1,'id_produk');
		$data['samping_model']=$this->solid_model->pilih_samping('model','id_model','DESC','nama_model',1,'id_model');
		$data['samping_artikel']=$this->solid_model->pilih_sampingku('artikel','tgl','ASC','judul',1,'id_artikel');


		$batas=5;
		$pg=$this->uri->segment(2);

		if ( empty( $pg ) ) {
			$posisi = 0;
			$pg = 1;
		} else {
			$posisi = ( $pg - 1 ) * $batas;
		}
		$data['produk']=$this->solid_model->getpagin_produk($posisi,$batas);
		$data['jumlah']=$this->solid_model->jumlah('produk');
		$data['jml_hal']=ceil($data['jumlah']/$batas);
		$data['batas']=$batas;
		$data['pg']=$pg;
		$this->lib_template->display('solid/produk/produk',$data);
	}


#============================untul artikel===================
public function article()
{
		$data['menu']=$this->db->get_where('menu',array('menu_utama'=>0));
		$data['menu2']=$this->db->query("SELECT * FROM menu WHERE menu_utama!=0");
		$data['profil']=$this->solid_model->getall('profil');
		$data['samping_produk']=$this->solid_model->pilih_samping('produk','id_produk','DESC','judul',1,'id_produk');
		$data['samping_model']=$this->solid_model->pilih_samping('model','id_model','DESC','nama_model',1,'id_model');
		$data['samping_artikel']=$this->solid_model->pilih_sampingku('artikel','tgl','ASC','judul',1,'id_artikel');

		$batas=5;
		$pg=$this->uri->segment(2);
		if ( empty( $pg ) ) {
			$posisi = 0;
			$pg = 1;
		} else {
			$posisi = ( $pg - 1 ) * $batas;
		}

	$data['artikel']=$this->solid_model->getpagin_artikel($posisi,$batas);
	$data['jumlah']=$this->solid_model->jumlah('artikel');
	$data['jml_hal']=ceil($data['jumlah']/$batas);
	$data['batas']=$batas;
	$data['pg']=$pg;
	$this->lib_template->display('solid/artikel/index',$data);
}

public function detail_artikel()
{
	$data['menu']=$this->db->get_where('menu',array('menu_utama'=>0));
	$data['menu2']=$this->db->query("SELECT * FROM menu WHERE menu_utama!=0");
	$data['profil']=$this->solid_model->getall('profil');
	$data['samping_produk']=$this->solid_model->pilih_samping('produk','id_produk','DESC','judul',1,'id_produk');
	$data['samping_model']=$this->solid_model->pilih_samping('model','id_model','DESC','nama_model',1,'id_model');
	$data['samping_artikel']=$this->solid_model->pilih_sampingku('artikel','tgl','ASC','judul',1,'id_artikel');


	#$id=$this->uri->segment(3);
	$text=$this->uri->segment(1);
	$id=$this->get_id($text);
	$data['slide']=$this->solid_model->get_album('artikel','id_artikel',$id);

	$data['jml_slide']=$this->solid_model->get_album('artikel','id_artikel',$id)->num_rows();

	$data['artikel']=$this->solid_model->getpilih('artikel','id_artikel',$id);
	
		$data['id_sebelumnya']=$this->solid_model->sebelum_ar('artikel',$id,'id_artikel','id_artikel,judul');
		$data['id_selanjutnya']=$this->solid_model->sesudah_ar('artikel',$id,'id_artikel','id_artikel,judul');
	
	


	$this->lib_template->display('solid/artikel/detail',$data);
}


#=============================model rumah==============
public function model()
{
	$data['menu']=$this->db->get_where('menu',array('menu_utama'=>0));
	$data['menu2']=$this->db->query("SELECT * FROM menu WHERE menu_utama!=0");
	$data['profil']=$this->solid_model->getall('profil');
	$data['samping_produk']=$this->solid_model->pilih_samping('produk','id_produk','DESC','judul',1,'id_produk');
	$data['samping_model']=$this->solid_model->pilih_samping('model','id_model','DESC','nama_model',1,'id_model');
	$data['samping_artikel']=$this->solid_model->pilih_sampingku('artikel','tgl','ASC','judul',1,'id_artikel');

		$batas=5;
		$pg=$this->uri->segment(2);
		if ( empty( $pg ) ) {
			$posisi = 0;
			$pg = 1;
		} else {
			$posisi = ( $pg - 1 ) * $batas;
		}

	$data['batas']=$batas;
	$data['pg']=$pg;
	$data['model']=$this->db->query("SELECT model.nama_model,model.type,model.harga,model.id_model,
		model.tersedia,model.luas_tanah,
	produk.lokasi, produk.kota,produk.judul,foto.foto FROM model 
	LEFT JOIN produk ON model.id_produk=produk.id_produk
	LEFT JOIN detail_album ON model.id_album=detail_album.id_album
	LEFT JOIN foto ON detail_album.id_foto=foto.id_foto
	WHERE model.tersedia>0
	GROUP BY model.id_model
	ORDER BY model.id_produk DESC,model.id_model DESC
	LIMIT $posisi, $batas
	");
	$data['jumlah']= $this->db->query("SELECT model.nama_model,model.type,model.harga,
	produk.lokasi, produk.kota,produk.judul FROM model 
	LEFT JOIN produk ON model.id_produk=produk.id_produk
	LEFT JOIN detail_album ON model.id_album=detail_album.id_album
	LEFT JOIN foto ON detail_album.id_foto=foto.id_foto
	WHERE model.tersedia>0
	GROUP BY model.id_model
	ORDER BY model.id_produk DESC,model.id_model DESC
	")->num_rows();
	$data['jenis']='daftar_model';
	$data['jml_hal']=ceil($data['jumlah']/$batas);
	$this->lib_template->display('solid/model/index',$data);
}


public function model2()
{
	$data['menu']=$this->db->get_where('menu',array('menu_utama'=>0));
	$data['menu2']=$this->db->query("SELECT * FROM menu WHERE menu_utama!=0");
	$data['profil']=$this->solid_model->getall('profil');
	$data['samping_produk']=$this->solid_model->pilih_samping('produk','id_produk','DESC','judul',1,'id_produk');
	$data['samping_model']=$this->solid_model->pilih_samping('model','id_model','DESC','nama_model',1,'id_model');
	$data['samping_artikel']=$this->solid_model->pilih_sampingku('artikel','tgl','ASC','judul',1,'id_artikel');

		$batas=5;
		$pg=$this->uri->segment(2);
		if ( empty( $pg ) ) {
			$posisi = 0;
			$pg = 1;
		} else {
			$posisi = ( $pg - 1 ) * $batas;
		}

	$data['batas']=$batas;
	$data['pg']=$pg;
	$data['model']=$this->db->query("SELECT model.nama_model,model.type,model.harga,model.id_model,
		model.tersedia,model.luas_tanah,
	produk.lokasi, produk.kota,produk.judul,foto.foto FROM model 
	LEFT JOIN produk ON model.id_produk=produk.id_produk
	LEFT JOIN detail_album ON model.id_album=detail_album.id_album
	LEFT JOIN foto ON detail_album.id_foto=foto.id_foto
	WHERE model.tersedia<=0
	GROUP BY model.id_model
	ORDER BY model.id_produk DESC,model.id_model DESC
	LIMIT $posisi, $batas
	");
	$data['jumlah']= $this->db->query("SELECT model.nama_model,model.type,model.harga,
	produk.lokasi, produk.kota,produk.judul FROM model 
	LEFT JOIN produk ON model.id_produk=produk.id_produk
	LEFT JOIN detail_album ON model.id_album=detail_album.id_album
	LEFT JOIN foto ON detail_album.id_foto=foto.id_foto
	WHERE model.tersedia<=0
	GROUP BY model.id_model
	ORDER BY model.id_produk DESC,model.id_model DESC
	")->num_rows();
	$data['jenis']='daftar_model_lainya';
	$data['jml_hal']=ceil($data['jumlah']/$batas);
	$this->lib_template->display('solid/model/index',$data);
}


public function detail_model()
{
	$data['menu']=$this->db->get_where('menu',array('menu_utama'=>0));
	$data['menu2']=$this->db->query("SELECT * FROM menu WHERE menu_utama!=0");
	$data['profil']=$this->solid_model->getall('profil');
	$data['samping_produk']=$this->solid_model->pilih_samping('produk','id_produk','DESC','judul',1,'id_produk');
		$data['samping_model']=$this->solid_model->pilih_samping('model','id_model','DESC','nama_model',1,'id_model');
		$data['samping_artikel']=$this->solid_model->pilih_sampingku('artikel','tgl','ASC','judul',1,'id_artikel');

	#$id=$this->uri->segment(2);
	$text=$this->uri->segment(1);
	$id=$this->get_id($text);
	$data['model']=$this->db->query("SELECT model.*, produk.judul,produk.kota,produk.lokasi
		FROM model 
		LEFT JOIN produk ON model.id_produk=produk.id_produk
		WHERE id_model='$id'");
	$data['slide']=$this->solid_model->get_album('model','id_model',$id);
	$data['jml_slide']=$this->solid_model->get_album('model','id_model',$id)->num_rows();

	$data['model_lain']=$this->db->query("SELECT model.id_model,model.nama_model,model.harga,foto.foto,model.tersedia
		FROM model 
		LEFT JOIN detail_album ON model.id_album=detail_album.id_album
		LEFT JOIN foto ON detail_album.id_foto=foto.id_foto
		WHERE id_model!='$id' 
		GROUP BY model.id_model
		LIMIT 3");

	$data['id_sebelumnya']=$this->solid_model->sebelum('model',$id,'id_model','id_model,nama_model');
	$data['id_selanjutnya']=$this->solid_model->sesudah('model',$id,'id_model','id_model,nama_model');

	$this->lib_template->display('solid/model/detail',$data);
}

#==============================Foto==================================
public function foto()
{
		$batas=9;
		$pg=$this->uri->segment(2);
		if ( empty( $pg ) ) {
			$posisi = 0;
			$pg = 1;
		} else {
			$posisi = ( $pg - 1 ) * $batas;
		}
	$data['menu']=$this->db->get_where('menu',array('menu_utama'=>0));
	$data['menu2']=$this->db->query("SELECT * FROM menu WHERE menu_utama!=0");
	$data['profil']=$this->solid_model->getall('profil');
	$data['samping_produk']=$this->solid_model->pilih_samping('produk','id_produk','DESC','judul',1,'id_produk');
		$data['samping_model']=$this->solid_model->pilih_samping('model','id_model','DESC','nama_model',1,'id_model');
		$data['samping_artikel']=$this->solid_model->pilih_sampingku('artikel','tgl','ASC','judul',1,'id_artikel');
	
	$data['foto']=$this->db->query("SELECT * FROM foto ORDER BY id_foto DESC LIMIT $posisi, $batas");
	$data['jumlah']=$this->solid_model->jumlah('foto');
	$data['jml_hal']=ceil($data['jumlah']/$batas);
	$data['pg']=$pg;
	$data['batas']=$batas;
	$this->lib_template->display('solid/foto/index',$data);
}


public function tampil_gambar()
{
	$foto=$this->input->post('foto');
	$judul=$this->input->post('judul');
	?>
	
	<div class="thumbnail">
		<h3 align="center"><?php echo $judul; ?></h3>
		<img src="<?php echo base_url() ?>cdn/uploads/<?php echo $foto; ?>">
	</div>
	<?php
}

#===================album=====================
public function album()
{
	$batas=6;
	$pg=$this->uri->segment(2);
	if ( empty( $pg ) ) {
		$posisi = 0;
		$pg = 1;
	} else {
		$posisi = ( $pg - 1 ) * $batas;
	}
	$data['menu']=$this->db->get_where('menu',array('menu_utama'=>0));
	$data['menu2']=$this->db->query("SELECT * FROM menu WHERE menu_utama!=0");
	$data['profil']=$this->solid_model->getall('profil');
	$data['samping_produk']=$this->solid_model->pilih_samping('produk','id_produk','DESC','judul',1,'id_produk');
		$data['samping_model']=$this->solid_model->pilih_samping('model','id_model','DESC','nama_model',1,'id_model');
		$data['samping_artikel']=$this->solid_model->pilih_sampingku('artikel','tgl','ASC','judul',1,'id_artikel');


	$data['album']=$this->db->query("SELECT album.*,foto.foto FROM album 
					INNER JOIN detail_album ON album.id_album=detail_album.id_album
					INNER JOIN foto ON detail_album.id_foto=foto.id_foto
					GROUP BY album.id_album
					ORDER BY album.id_album DESC 
					LIMIT $posisi, $batas");

	$data['jumlah']=$this->solid_model->jumlah('album');
	$data['jml_hal']=ceil($data['jumlah']/$batas);
	$data['pg']=$pg;
	$data['batas']=$batas;
	$this->lib_template->display('solid/album/index',$data);
}

public function tampil_album()
{

	$data['menu']=$this->db->get_where('menu',array('menu_utama'=>0));
	$data['menu2']=$this->db->query("SELECT * FROM menu WHERE menu_utama!=0");
	$data['profil']=$this->solid_model->getall('profil');
	$data['samping_produk']=$this->solid_model->pilih_samping('produk','id_produk','DESC','judul',1,'id_produk');
		$data['samping_model']=$this->solid_model->pilih_samping('model','id_model','DESC','nama_model',1,'id_model');
		$data['samping_artikel']=$this->solid_model->pilih_sampingku('artikel','tgl','ASC','judul',1,'id_artikel');
	#$id=$this->input->post('id_album');
	#$id=$this->uri->segment(3);
	$text=$this->uri->segment(1);
	$id=$this->get_id($text);
	$data['album']=$this->db->query("SELECT album.*,foto.foto,foto.judul AS judul_foto FROM
			album
			LEFT JOIN detail_album ON album.id_album=detail_album.id_album
			LEFT JOIN foto ON detail_album.id_foto=foto.id_foto
			WHERE album.id_album='$id'");

	$data['id_sebelumnya']=$this->solid_model->sebelum('album',$id,'id_album','id_album,judul');
	$data['id_selanjutnya']=$this->solid_model->sesudah('album',$id,'id_album','id_album,judul');

	#$this->load->view('solid/album/tampil_album',$data);
	$this->lib_template->display('solid/album/tampil_album',$data);
}




public function tampil_model()
{

	$id=$this->input->post('id_model');
	$data['model']=$this->db->query("SELECT model.*, produk.judul,produk.kota,produk.lokasi
		FROM model 
		LEFT JOIN produk ON model.id_produk=produk.id_produk
		WHERE id_model='$id'");
	$data['slide']=$this->solid_model->get_album('model','id_model',$id);
	$data['jml_slide']=$this->solid_model->get_album('model','id_model',$id)->num_rows();

	$this->load->view('solid/produk/tampil_model',$data);
	#$this->load->view('solid/produk/tampil_model');
}


public function get_id($text)
{
	$text_ex=explode('-', $text);
	$jml_text=count($text_ex)-1;
	$id=$text_ex[$jml_text];
	return $id;
}

public function tampil_peta()
{
	$data['peta']=$this->input->post('gambar');
	$this->load->view('solid/produk/tampil_peta',$data);
}
	public function pagin($jml,$url)
	{
		# code...
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
}