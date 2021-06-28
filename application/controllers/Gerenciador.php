<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gerenciador extends CI_Controller {

    function __construct ()
    {   
      parent::__construct();
      $this->load->model("Home_Model");
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
            if(isset($_SESSION['usuario']))
            {
                if($_SESSION['usuario']['situacao'] == "Z")
                {
                    $this->session->set_flashdata("Alerta", "<div class='alert alert-warning'>Você deve alterar sua senha.</div>"); 
                    redirect(base_url().'Gerenciador/Perfil', 'refresh');
                }
                else
                {
                    $colunas = 'codsol, datsol, nomsol, cpfsol, cepsol, endsol, nensol, baisol, cdcsol, pgtsol, status';
                    $data['solicitacoes'] = $this->Home_Model->get_tb_solicitacoes(null, $colunas);

                    $this->load->view('Header_View');
                    $this->load->view('Gerenciador_View', $data);
                    $this->load->view('Footer_View');
                }
            }
            else
            {
                $this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Faça login para acessar essa página.</div>");
                redirect(base_url().'Login', 'refresh');
            }
        }
        else
        {
            $this->load->view('Header_View');
            $this->load->view('Login_View', $data);
            $this->load->view('Footer_View'); 
        } 
    }

    public function Detalhes()
    {
        if($this->uri->segment(3))
        {
            $codsol = $this->uri->segment(3);
            $data['detalhes']   = $this->Home_Model->get_tb_solicitacoes($codsol, null);
            
            if($data['detalhes']<>false)
            {
                $this->load->view('Header_View');
                $this->load->view('Detalhes_Solicitacao_View', $data);
                $this->load->view('Footer_View');
            }
            else
            {
                redirect(base_url().'Gerenciador', 'refresh');    
            }
            
        }
        else
        {
            redirect(base_url().'Gerenciador', 'refresh');
        }
    }

    public function ConcluirAtendimento()
    {
        if($this->uri->segment(3))
        {
            $cdcsol = $this->uri->segment(3);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('txtnumcad', 'número de cadastro', 'trim|required|numeric');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            if($this->form_validation->run() == TRUE)
            {
                $numcad = $this->input->post('txtnumcad');
                $data['detalhes'] = $this->Home_Model->get_tb_solicitacoes($cdcsol, null);

                if($data['detalhes']<>false)
                {
                    foreach ($data['detalhes'] as $key)
                    {
                        $status = $key->status;
                        $numcadbanco = $key->numcad;
                    }

                    $dados = array('status' => '1' , 'numcad' => $numcad);
                    $update = $this->Home_Model->update_tb_solicitacoes($cdcsol, $dados);

                    if($update)
                    {
                        $numcadbanco == NULL ? $mensagem = 'Atendimento concluído com sucesso.' : $mensagem = 'Número do cadastro alterado com sucesso.';
                        $this->session->set_flashdata("Alerta", "<div class='alert alert-success'>".$mensagem."</div>");
                    }
                    else
                    {
                        $this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Erro ao tentar concluir o atendimento. Favor tentar novamente.</div>");
                    }
                }
                else
                {
                    $this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Erro ao tentar concluir o atendimento. Favor tentar novamente.</div>");
                }
            }
            else
            {
                $data['errorsModalAtendimento'] = validation_errors();
                $this->session->set_flashdata("ErrosModalAtendimento", $data['errorsModalAtendimento']);
            }
            redirect(base_url().'Gerenciador/Detalhes/'.$cdcsol, 'refresh');
        }
        else
        {
            redirect(base_url().'Gerenciador/', 'refresh');
        }
    }

    public function Download()
    {
        $this->load->helper('download');
        if($this->uri->segment(3)){
            $patch = 'public/docs/docs_municipes/';
            $file = $this->uri->segment(3);
            force_download($patch.$file, NULL);
        }
    }

    public function Perfil()
    {
        $this->load->library('user_agent');
        $browser = $this->agent->browser();
        $browserVersion = $this->agent->version();
        $browserList = array('Opera', 'Firefox', 'Chrome');
        $validBrowser = in_array($browser, $browserList);

        $data['validBrowser'] = $validBrowser;

        if($validBrowser)
        {
            if(isset($_SESSION['usuario']))
            {
                $this->load->view('Header_View');
                $this->load->view('Perfil_View', $data);
                $this->load->view('Footer_View');
            }
            else
            {
                $this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Faça login para acessar essa página.</div>"); 
                redirect(base_url().'Login', 'refresh');
            }
        }
        else
        {
            $this->load->view('Header_View');
            $this->load->view('Login_View', $data);
            $this->load->view('Footer_View'); 
        } 
    }

    public function AlterarSenha()
    {
        $this->load->library('user_agent');
        $browser = $this->agent->browser();
        $browserVersion = $this->agent->version();
        $browserList = array('Opera', 'Firefox', 'Chrome');
        $validBrowser = in_array($browser, $browserList);

        $data['validBrowser'] = $validBrowser;

        if($validBrowser)
        {
            if(isset($_SESSION['usuario']))
            {
                $this->load->library('form_validation');

                $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>'); 

                $this->form_validation->set_rules('txtSenha', 'Senha', 'trim|required');
                $this->form_validation->set_rules('txtConfirmar', 'Confirmar Senha', 'trim|required|matches[txtSenha]');

                $this->form_validation->set_message('required', 'O campo %s é obrigatório.');
                $this->form_validation->set_message('matches', 'O campo %s não é igual ao campo %s.');

                if($this->form_validation->run() == TRUE)
                {
                    $cpf = $_SESSION['usuario']['cpf'];
                    $senha = $this->input->post('txtSenha');
                    $senha = password_hash($senha, PASSWORD_DEFAULT);

                    $dados = array('senha' => $senha, 'situacao' => 'N');

                    if($_SESSION['usuario']['situacao'] == "Z")
                    {
                        $_SESSION['usuario']['situacao'] = "N";
                    }

                    $update = $this->Home_Model->update_tb_usuarios($cpf, $dados);

                    if($update)
                    {
                        $this->session->set_flashdata("Alerta", "<div class='alert alert-warning'>Senha alterada com sucesso.</div>"); 
                        redirect(base_url().'Gerenciador/Perfil', 'refresh');
                    }
                    else
                    {
                        $this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Erro ao alterar senha.</div>"); 
                        redirect(base_url().'Gerenciador/Perfil', 'refresh');
                    }
                }
                else
                {
                    $data['errors'] = validation_errors();

                    $this->load->view('Header_View');
                    $this->load->view('Perfil_View', $data);
                    $this->load->view('Footer_View');
                }                
            }
            else
            {
                $this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Faça login para acessar essa página.</div>"); 
                redirect(base_url().'Login', 'refresh');
            }
        }
        else
        {
            $this->load->view('Header_View');
            $this->load->view('Login_View', $data);
            $this->load->view('Footer_View'); 
        } 
    }

    public function Usuarios()
    {
        $this->load->library('user_agent');
        $browser = $this->agent->browser();
        $browserVersion = $this->agent->version();
        $browserList = array('Opera', 'Firefox', 'Chrome');
        $validBrowser = in_array($browser, $browserList);

        $data['validBrowser'] = $validBrowser;

        if($validBrowser)
        {
            if(isset($_SESSION['usuario']))
            {
                if($_SESSION['usuario']['tipo'] == 1)
                {
                    $data['usuarios'] = $this->Home_Model->get_tb_usuarios(null);

                    $this->load->view('Header_View');
                    $this->load->view('Usuarios_View', $data);
                    $this->load->view('Footer_View');
                }
                else
                {
                    $this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Você não possui acesso a está página.</div>"); 
                    redirect(base_url().'Home', 'refresh');
                }                
            }
            else
            {
                $this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Faça login para acessar essa página.</div>"); 
                redirect(base_url().'Login', 'refresh');
            }
        }
        else
        {
            $this->load->view('Header_View');
            $this->load->view('Login_View', $data);
            $this->load->view('Footer_View'); 
        } 
    }

    public function CadastrarUsuario()
    {
        $this->load->library('user_agent');
        $browser = $this->agent->browser();
        $browserVersion = $this->agent->version();
        $browserList = array('Opera', 'Firefox', 'Chrome');
        $validBrowser = in_array($browser, $browserList);

        $data['validBrowser'] = $validBrowser;

        if($validBrowser)
        {
            if(isset($_SESSION['usuario']))
            {
                if($_SESSION['usuario']['tipo'] == 1)
                {

                    $this->load->library('form_validation');

                    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>'); 

                    $this->form_validation->set_rules('txtCPF', 'CPF', 'trim|required|callback_check_cpf');
                    $this->form_validation->set_rules('txtNome', 'Nome', 'trim|required');
                    $this->form_validation->set_rules('selectTipo', 'Tipo', 'trim|required');

                    $this->form_validation->set_message('required', 'O campo %s é obrigatório.');
                    $this->form_validation->set_message('check_cpf', 'O campo %s não é válido.');

                    if($this->form_validation->run() == TRUE)
                    {
                        $cpf  = $this->input->post('txtCPF');
                        $nome = $this->input->post('txtNome');
                        $tipo = $this->input->post('selectTipo');
                        $situacao = "Z";

                        $nome  = mb_convert_case($nome, MB_CASE_UPPER, "UTF-8");
                        $senha = password_hash($cpf, PASSWORD_DEFAULT);

                        $dados = array('cpf' => $cpf, 'nome' => $nome, 'senha' => $senha, 'tipo' => $tipo, 'situacao' => $situacao);

                        $insert = $this->Home_Model->insert_tb_usuarios($dados);

                        if($insert)
                        {
                            $this->session->set_flashdata("Alerta", "<div class='alert alert-warning'>Usuário cadastrado com sucesso.</div>"); 
                            redirect(base_url().'Gerenciador/Usuarios', 'refresh');
                        }
                        else
                        {
                            $this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Erro ao cadastrar usuário.</div>"); 
                            redirect(base_url().'Gerenciador/Usuarios', 'refresh');
                        }
                    }
                    else
                    {
                        $data['errors'] = validation_errors();
                        $data['usuarios'] = $this->Home_Model->get_tb_usuarios(null);

                        $this->load->view('Header_View');
                        $this->load->view('Usuarios_View', $data);
                        $this->load->view('Footer_View');
                    }
                }
                else
                {
                    $this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Você não possui acesso a está página.</div>"); 
                    redirect(base_url().'Home', 'refresh');
                }                
            }
            else
            {
                $this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Faça login para acessar essa página.</div>"); 
                redirect(base_url().'Login', 'refresh');
            }
        }
        else
        {
            $this->load->view('Header_View');
            $this->load->view('Login_View', $data);
            $this->load->view('Footer_View'); 
        } 
    }

    public function AlterarUsuario()
    {
        $this->load->library('user_agent');
        $browser = $this->agent->browser();
        $browserVersion = $this->agent->version();
        $browserList = array('Opera', 'Firefox', 'Chrome');
        $validBrowser = in_array($browser, $browserList);

        $data['validBrowser'] = $validBrowser;

        if($validBrowser)
        {
            if(isset($_SESSION['usuario']))
            {
                if($_SESSION['usuario']['tipo'] == 1)
                {

                    $this->load->library('form_validation');

                    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>'); 

                    $this->form_validation->set_rules('txtCPF', 'CPF', 'trim|required|callback_check_cpf');
                    $this->form_validation->set_rules('txtNome', 'Nome', 'trim|required');
                    $this->form_validation->set_rules('selectTipo', 'Tipo', 'trim|required');

                    $this->form_validation->set_message('required', 'O campo %s é obrigatório.');
                    $this->form_validation->set_message('check_cpf', 'O campo %s não é válido.');

                    if($this->form_validation->run() == TRUE)
                    {
                        $cpf  = $this->input->post('txtCPF');
                        $nome = $this->input->post('txtNome');
                        $tipo = $this->input->post('selectTipo');

                        $nome  = mb_convert_case($nome, MB_CASE_UPPER, "UTF-8");

                        $dados = array('nome' => $nome, 'tipo' => $tipo);

                        $update = $this->Home_Model->update_tb_usuarios($cpf, $dados);

                        if($update)
                        {
                            $this->session->set_flashdata("Alerta", "<div class='alert alert-warning'>Usuário alterado com sucesso.</div>"); 
                            redirect(base_url().'Gerenciador/Usuarios', 'refresh');
                        }
                        else
                        {
                            $this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Erro ao alterar usuário.</div>"); 
                            redirect(base_url().'Gerenciador/Usuarios', 'refresh');
                        }
                    }
                    else
                    {
                        $data['errors'] = validation_errors();
                        $data['usuarios'] = $this->Home_Model->get_tb_usuarios(null);

                        $this->load->view('Header_View');
                        $this->load->view('Usuarios_View', $data);
                        $this->load->view('Footer_View');
                    }
                }
                else
                {
                    $this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Você não possui acesso a está página.</div>"); 
                    redirect(base_url().'Home', 'refresh');
                }                
            }
            else
            {
                $this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Faça login para acessar essa página.</div>"); 
                redirect(base_url().'Login', 'refresh');
            }
        }
        else
        {
            $this->load->view('Header_View');
            $this->load->view('Login_View', $data);
            $this->load->view('Footer_View'); 
        } 
    }

    public function ZerarSenha()
    {
        $this->load->library('user_agent');
        $browser = $this->agent->browser();
        $browserVersion = $this->agent->version();
        $browserList = array('Opera', 'Firefox', 'Chrome');
        $validBrowser = in_array($browser, $browserList);

        $data['validBrowser'] = $validBrowser;

        if($validBrowser)
        {
            if(isset($_SESSION['usuario']))
            {
                if($_SESSION['usuario']['tipo'] == 1)
                {

                    $this->load->library('form_validation');

                    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>'); 

                    $this->form_validation->set_rules('txtCPF', 'CPF', 'trim|required|callback_check_cpf');

                    $this->form_validation->set_message('required', 'O campo %s é obrigatório.');
                    $this->form_validation->set_message('check_cpf', 'O campo %s não é válido.');

                    if($this->form_validation->run() == TRUE)
                    {
                        $cpf  = $this->input->post('txtCPF');

                        $senha = password_hash($cpf, PASSWORD_DEFAULT);
                        $situacao = "Z";

                        $dados = array('senha' => $senha, 'situacao' => $situacao);

                        $update = $this->Home_Model->update_tb_usuarios($cpf, $dados);

                        if($update)
                        {
                            $this->session->set_flashdata("Alerta", "<div class='alert alert-warning'>Senha zerada com sucesso. Usuário deve usar o número do CPF para acessar.</div>"); 
                            redirect(base_url().'Gerenciador/Usuarios', 'refresh');
                        }
                        else
                        {
                            $this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Erro ao zerar senha.</div>"); 
                            redirect(base_url().'Gerenciador/Usuarios', 'refresh');
                        }
                    }
                    else
                    {
                        $data['errors'] = validation_errors();
                        $data['usuarios'] = $this->Home_Model->get_tb_usuarios(null);

                        $this->load->view('Header_View');
                        $this->load->view('Usuarios_View', $data);
                        $this->load->view('Footer_View');
                    }
                }
                else
                {
                    $this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Você não possui acesso a está página.</div>"); 
                    redirect(base_url().'Home', 'refresh');
                }                
            }
            else
            {
                $this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Faça login para acessar essa página.</div>"); 
                redirect(base_url().'Login', 'refresh');
            }
        }
        else
        {
            $this->load->view('Header_View');
            $this->load->view('Login_View', $data);
            $this->load->view('Footer_View'); 
        } 
    }

    function check_cpf($post_string)
    {
        $cpf = $post_string;
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }

}