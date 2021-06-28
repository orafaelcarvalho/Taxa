 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_tb_solicitacoes($cdcsol, $colunas)
	{
		$DB1 = $this->load->database('default', TRUE);
		if($colunas <> null)
		{
			$DB1->select($colunas);
		}
		else
		{
			$DB1->select('*');
		}
		
		$DB1->from('tb_solicitacoes');

		if($cdcsol <> null)
		{
			$DB1->where('tb_solicitacoes.cdcsol', $cdcsol);
		}
		
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

	public function insert_tb_solicitacoes($dados)
	{
		$DB1 = $this->load->database('default', TRUE);
		$DB1->insert('tb_solicitacoes', $dados);
		if($DB1->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function update_tb_solicitacoes($cdcsol, $dados)
	{
		$DB1 = $this->load->database('default', TRUE);
		$DB1->where('cdcsol', $cdcsol);
		$DB1->update('tb_solicitacoes', $dados);
		if($DB1->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_tb_usuarios($cpfcan)
	{
		$DB1 = $this->load->database('default', TRUE);
		$DB1->select('*');
		$DB1->from('tb_usuarios');
		if($cpfcan <> null)
		{
			$DB1->where('tb_usuarios.cpfcan', $cpfcan);
		}		
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

	public function insert_tb_usuarios($dados)
	{
		$DB1 = $this->load->database('default', TRUE);
		$DB1->insert('tb_usuarios', $dados);
		if($DB1->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function update_tb_usuarios($cpf, $dados)
	{
		$DB1 = $this->load->database('default', TRUE);
		$DB1->where('cpf', $cpf);
		$DB1->update('tb_usuarios', $dados);
		if($DB1->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}