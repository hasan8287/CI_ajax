<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Proses extends CI_Model
{
	function insertData($table,$data)
	{
		$this->db->insert($table,$data);
	}
}