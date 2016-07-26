<?php
 class Lib_template{
	 protected $_ci;
	 function __construct(){
	 	$this->_ci=&get_instance();
	 }
	 function display($template,$data=null){
		 $data['_content']=$this->_ci->load->view($template,$data,true);
		 $data['_samping']=$this->_ci->load->view('template_solid/samping',$data,true);
		 #$data['menu']=$this->db->query("SELECT * FROM menu");
		 $data['_top_menu']=$this->_ci->load->view('template_solid/menu',$data,true);
		 $this->_ci->load->view('template_solid/template_pengunjung.php',$data);
	}

	 function display3($template,$data=null){
		 $data['_content']=$this->_ci->load->view($template,$data,true);
		 $data['_samping']=$this->_ci->load->view('template_solid/samping',$data,true);
		 #$data['menu']=$this->db->query("SELECT * FROM menu");
		 $data['_top_menu']=$this->_ci->load->view('template_solid/menu',$data,true);
		 $this->_ci->load->view('template_solid/template_pengunjung.php',$data);
	}


	function display_admin($template,$data=null){
		 $data['_content']=$this->_ci->load->view($template,$data,true);
		 #$data['_samping']=$this->_ci->load->view('template_solid/samping',$data,true);
		 #$data['_top_menu']=$this->_ci->load->view('template_solid/menu',$data,true);
		 $this->_ci->load->view('template_solid/template2.php',$data);
	}

	function display2($template,$data=null){
		 $data['_content']=$this->_ci->load->view($template,$data,true);
		 #$data['_samping']=$this->_ci->load->view('template_solid/samping',$data,true);
		 #$data['_top_menu']=$this->_ci->load->view('template_solid/menu',$data,true);
		 $this->_ci->load->view('template_solid/template3.php');
	}
 }
?>