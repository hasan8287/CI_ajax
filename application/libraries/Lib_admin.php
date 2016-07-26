<?php
 class Lib_admin{
	 protected $_ci;
	 function __construct(){
	 	$this->_ci=&get_instance();
	 }
	 function display($template,$data=null){
		 $data['_content']=$this->_ci->load->view($template,$data,true);
		 #$data['_samping']=$this->_ci->load->view('template_solid/samping',$data,true);
		 #$data['_top_menu']=$this->_ci->load->view('template_solid/menu',$data,true);
		 $this->_ci->load->view('template_admin/template');
		 }
 }
?>