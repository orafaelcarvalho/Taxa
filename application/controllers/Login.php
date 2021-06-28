<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct ()
    {   
      parent::__construct();
      $this->load->model("Login_Model");
    }

    public function index()
    {
        $this->load->library('user_agent');
        $browser = $this->agent->browser();
        $browserVersion = $this->agent->version();
        $browserList = array('Opera', 'Firefox', 'Chrome');
        $validBrowser = in_array($browser, $browserList);

        $data['validBrowser'] = $validBrowser;

        if($validBrowser)
        {
            $this->load->view('Header_View');
            $this->load->view('Login_View', $data);
            $this->load->view('Footer_View');
        }
        else
        {
            $this->load->view('Header_View');
            $this->load->view('Login_View', $data);
            $this->load->view('Footer_View'); 
        } 
    }

    public function Entrar()
    {
    	$this->load->library('user_agent');
        $browser = $this->agent->browser();
        $browserVersion = $this->agent->version();
        $browserList = array('Opera', 'Firefox', 'Chrome');
        $validBrowser = in_array($browser, $browserList);

        $data['validBrowser'] = $validBrowser;

        if($validBrowser)
        {
            $this->load->library('form_validation');

            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

	    	$this->form_validation->set_message('required', 'O campo %s é obrigatório.');

	    	$this->form_validation->set_rules('txtCPF', 'CPF', 'trim|required');
	    	$this->form_validation->set_rules('txtSenha', 'Senha', 'trim|required');

	    	if($this->form_validation->run() == TRUE)
	        {
	        	$inputcpf 	= $this->input->post('txtCPF');
	        	$inputsenha = $this->input->post('txtSenha');

	        	$get = $this->Login_Model->get_tb_usuarios($inputcpf);

	        	if($get)
	        	{
	        		foreach ($get as $key) {
	        			$cpf 	= $key->cpf;
	        			$nome	= $key->nome;
	        			$senha 	= $key->senha; 
                        $tipo   = $key->tipo;
                        $situacao = $key->situacao;
	        		}

	        		if(password_verify($inputsenha, $senha))
	        		{
	        			$session_data = array(
	                        'cpf' 	=> $cpf,
	                        'nome'  => $nome,
                            'tipo'  => $tipo,
                            'situacao' => $situacao
                        );

                        $this->session->set_userdata('usuario', $session_data);

                        redirect(base_url().'Gerenciador', 'refresh');
	        		}
	        		else
	        		{
	        			$this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Senha incorreta.</div>"); 
                    	redirect(base_url().'Login', 'refresh');
	        		}
	        	}
	        	else
	        	{
	        		$this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>CPF não encontrado.</div>"); 
                    redirect(base_url().'Login', 'refresh');
	        	}
	        }
	        else
	        {
	        	$data['errors'] = validation_errors();

	            $this->load->view('Header_View');
	            $this->load->view('Login_View', $data);
	            $this->load->view('Footer_View');
	        }
        }
        else
        {
            $this->load->view('Header_View');
            $this->load->view('Login_View', $data);
            $this->load->view('Footer_View'); 
        }    	
    }

    public function Sair()
    {
        unset($_SESSION["usuario"]);
        redirect(base_url().'Home/', 'refresh');
    }

}