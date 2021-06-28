<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_tb_usuarios($cpf)
	{
		$DB1 = $this->load->database('default', TRUE);
		$DB1->select('*');
		$DB1->from('tb_usuarios');		
		$DB1->where('tb_usuarios.cpf', $cpf);
		$query = $DB1->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
}