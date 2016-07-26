<?php
class Arif extends  CI_Controller
{
		
	public function _construct()
	{
		session_start();
	}

	public function index()
	{
		$this->load->view('arif/index');
	}


	public function hitung()
	{
		$a=$this->input->post('a');
		$b=$this->input->post('b');
		$data['c']=$a * $b;
		$this->load->view('arif/hasil',$data);
	}

	public function edit()
	{
		$this->load->view('arif/edit');
	}

	public function proses_edit()
	{
		echo "proses edit=".$this->input->post('tes1');
	}
}
