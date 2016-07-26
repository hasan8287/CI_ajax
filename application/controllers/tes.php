<?php
class tes extends  CI_Controller
{
		


	public function _construct()
	{
		session_start();
	}

	public function index()
	{
		$this->lib_template->display2('tes/tes');
	}

}
