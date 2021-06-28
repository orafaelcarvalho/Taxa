<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

        $this->load->view('Header_View');
        $this->load->view('Home_View', $data);
        $this->load->view('Footer_View');
    }

    public function Solicitacao()
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
            $this->load->view('Solicitacao_View', $data);
            $this->load->view('Footer_View');
        }
        else
        {
            $this->load->view('Header_View');
            $this->load->view('Home_View', $data);
            $this->load->view('Footer_View'); 
        }      
    }

    public function Cadastrar()
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
            
            $this->form_validation->set_rules('txtNome', 'Nome', 'trim|required');
            $this->form_validation->set_rules('txtEmail', 'E-Mail', 'trim|required|valid_email');
            $this->form_validation->set_rules('txtConfirmarEmail', 'Confirmar E-Mail', 'trim|required|valid_email|matches[txtEmail]');
            $this->form_validation->set_rules('txtTelefone', 'Telefone', 'trim|required|callback_check_phone');
            $this->form_validation->set_rules('txtRG', 'RG', 'trim|required');
            $this->form_validation->set_rules('txtCPF', 'CPF', 'trim|required|callback_check_cpf');
            $this->form_validation->set_rules('txtCEP', 'CEP', 'trim|required');
            $this->form_validation->set_rules('txtEndereco', 'Endereço', 'trim|required');
            $this->form_validation->set_rules('txtNumero', 'Número', 'trim|required');
            $this->form_validation->set_rules('txtCidade', 'Cidade', 'trim|required');
            $this->form_validation->set_rules('selectEstado', 'Estado', 'trim|required');
            $this->form_validation->set_rules('txtCDC', 'CDC', 'trim|required');
            $this->form_validation->set_rules('selectPagamento', 'Forma de pagamento', 'trim|required');

            $this->form_validation->set_message('required', 'O campo %s é obrigatório.');
            $this->form_validation->set_message('matches', 'O campo %s não é igual ao campo %s.');
            $this->form_validation->set_message('valid_email', 'O campo %s não é válido.');
            $this->form_validation->set_message('check_default', 'O campo %s é obrigatório.');
            $this->form_validation->set_message('check_phone', 'O campo %s não é válido.');
            $this->form_validation->set_message('check_cpf', 'O campo %s não é válido.');
            $this->form_validation->set_message('check_date', 'O campo %s não é válido.');
            $this->form_validation->set_message('min_length', 'O campo %s deve ter pelo menos %s caracteres');
            $this->form_validation->set_message('max_length', 'O campo %s deve ter no máximo %s caracteres');

            // Validando upload dos documentos
            $config['upload_path']          = './public/docs/docs_municipes/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             = 2048;
            $config['encrypt_name']         = true;

            $this->load->library('upload', $config);
            $arquivos = array('fileRG', 'fileCPF', 'fileContaAgua');
            $upload   = true;

            foreach ($arquivos as $arquivo)
            {
                if ( ! $this->upload->do_upload($arquivo))
                {
                    $data = array('errorsupload' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
                    $upload = false;
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                    switch ($arquivo) {
                        case 'fileRG':
                            $filerg = $this->upload->data('file_name');
                            break;
                        case 'fileCPF':
                            $filecpf = $this->upload->data('file_name');
                            break;
                        case 'fileContaAgua':
                            $filecontaagua = $this->upload->data('file_name');
                            break;
                    }
                }
            }

            if($this->form_validation->run() == TRUE and $upload == true)
            {
                $dathoj = $this->data_hoje();
                $datsol = $dathoj->format('Y-m-d');
                $nomsol = $this->input->post('txtNome');
                $emasol = $this->input->post('txtEmail');
                $telsol = $this->input->post('txtTelefone');
                $nrgsol = $this->input->post('txtRG');
                $cpfsol = $this->input->post('txtCPF');
                $cepsol = $this->input->post('txtCEP');
                $endsol = $this->input->post('txtEndereco');
                $nensol = $this->input->post('txtNumero');
                $censol = $this->input->post('txtComplemento');
                $baisol = $this->input->post('txtBairro');
                $cidsol = $this->input->post('txtCidade');
                $estsol = $this->input->post('selectEstado');
                $cdcsol = $this->input->post('txtCDC');
                $pgtsol = $this->input->post('selectPagamento');

                $nomsol = mb_convert_case($nomsol, MB_CASE_UPPER, "UTF-8");
                $emasol = mb_convert_case($emasol, MB_CASE_UPPER, "UTF-8");
                $endsol = mb_convert_case($endsol, MB_CASE_UPPER, "UTF-8");
                $nensol = mb_convert_case($nensol, MB_CASE_UPPER, "UTF-8");
                $censol = mb_convert_case($censol, MB_CASE_UPPER, "UTF-8");
                $baisol = mb_convert_case($baisol, MB_CASE_UPPER, "UTF-8");
                $cidsol = mb_convert_case($cidsol, MB_CASE_UPPER, "UTF-8");
                $estsol = mb_convert_case($estsol, MB_CASE_UPPER, "UTF-8");
                $pgtsol = mb_convert_case($pgtsol, MB_CASE_UPPER, "UTF-8");

                $dados = array(
                    'datsol' => $datsol, 
                    'nomsol' => $nomsol,
                    'emasol' => $emasol,
                    'telsol' => $telsol,
                    'nrgsol' => $nrgsol,
                    'cpfsol' => $cpfsol,
                    'cepsol' => $cepsol,
                    'endsol' => $endsol,
                    'nensol' => $nensol,
                    'censol' => $censol,
                    'baisol' => $baisol,
                    'cidsol' => $cidsol,
                    'estsol' => $estsol,
                    'cdcsol' => $cdcsol,
                    'pgtsol' => $pgtsol,
                    'filerg' => $filerg,
                    'filecpf' => $filecpf,
                    'filecontaagua' => $filecontaagua,
                ); 

                $get = $this->Home_Model->get_tb_solicitacoes($cdcsol, null);

                if($get)
                {
                    $this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Já existe solicitação para o CDC informado.</div>"); 
                    redirect(base_url().'Home/Solicitacao', 'refresh');
                }
                else
                {
                    $insert = $this->Home_Model->insert_tb_solicitacoes($dados);

                    if($insert)
                    {
                        $get = "";
                        $get = $this->Home_Model->get_tb_solicitacoes($cdcsol, null);

                        foreach ($get as $key) {
                            $codsol = $key->codsol;
                            $nomsol = $key->nomsol;
                            $nrgsol = $key->nrgsol;
                            $cpfsol = $key->cpfsol;
                            $cdcsol = $key->cdcsol;
                            $status = $key->status;
                            $key->status==1 ? $status = 'Atendida' : $status = 'Aguardando atendimento';
                            $key->status==1 ? $class = 'badge-success' : $class = 'badge-danger';
                        }

                        $data['requerente'] = array('codsol' => $codsol,
                                                   'datsol' => $datsol,
                                                   'nomsol' => $nomsol, 
                                                   'nrgsol' => $nrgsol,
                                                   'cpfsol' => $cpfsol,
                                                   'cdcsol' => $cdcsol,
                                                   'status' => $status,
                                                   'class'  => $class);

                        $this->load->library('user_agent');
                        $browser = $this->agent->browser();
                        $browserVersion = $this->agent->version();
                        $browserList = array('Opera', 'Firefox', 'Chrome');
                        $validBrowser = in_array($browser, $browserList);

                        $data['validBrowser'] = $validBrowser;
                        
                        $this->load->view('Header_View');
                        $this->load->view('Sucesso_View', $data);
                        $this->load->view('Footer_View');
                    }
                    else
                    {
                        $this->load->view('Header_View');
                        $this->load->view('Solicitacao_View', $data);
                        $this->load->view('Footer_View');
                    }
                }              
            }
            else
            {
                // Excluindo os arquivos caso algum campo não passe pelas validações
                unlink('public/docs/docs_municipes/'.$filerg);
                unlink('public/docs/docs_municipes/'.$filecpf);
                unlink('public/docs/docs_municipes/'.$filecontaagua);
                
                $data['errors'] = validation_errors();

                $this->load->view('Header_View');
                $this->load->view('Solicitacao_View', $data);
                $this->load->view('Footer_View');
            }
        }
        else
        {
            $this->load->view('Header_View');
            $this->load->view('Home_View', $data);
            $this->load->view('Footer_View'); 
        } 
    }

    public function Consultar()
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
            $this->load->view('Consultar_View', $data);
            $this->load->view('Footer_View');
        }
        else
        {
            $this->load->view('Header_View');
            $this->load->view('Home_View', $data);
            $this->load->view('Footer_View'); 
        }
    }

    public function Buscar()
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
            $this->form_validation->set_rules('txtCDC', 'CDC', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>'); 

            if($this->form_validation->run() == TRUE)
            {
                $this->load->model('Home_Model');
                $cdcsol = $this->input->post('txtCDC');

                $get = $this->Home_Model->get_tb_solicitacoes($cdcsol, null);

                if($get)
                {
                    foreach ($get as $key) {
                        $codsol = $key->codsol;
                        $datsol = $key->datsol;
                        $nomsol = $key->nomsol;
                        $nrgsol = $key->nrgsol;
                        $cpfsol = $key->cpfsol;
                        $cdcsol = $key->cdcsol;
                        $numcad = $key->numcad;
                        $key->status==1 ? $status = 'Atendida' : $status = 'Aguardando atendimento';
                        $key->status==1 ? $class = 'badge-success' : $class = 'badge-danger';
                    }

                    $data['requerente'] = array('codsol' => $codsol,
                                               'datsol' => $datsol,
                                               'nomsol' => $nomsol, 
                                               'nrgsol' => $nrgsol,
                                               'cpfsol' => $cpfsol,
                                               'cdcsol' => $cdcsol,
                                               'numcad' => $numcad,
                                               'status' => $status,
                                               'class' => $class);

                    $this->load->view('Header_View');
                    $this->load->view('Sucesso_View', $data);
                    $this->load->view('Footer_View');
                }
                else
                {
                    $this->session->set_flashdata("Alerta", "<div class='alert alert-danger'>Solicitação não encontrada.</div>"); 
                    redirect(base_url().'Home/Consultar', 'refresh');
                }
            }
            else
            {
                $data['errors'] = validation_errors();

                $this->load->view('Header_View');
                $this->load->view('Consultar_View', $data);
                $this->load->view('Footer_View');
            }
        }
        else
        {
            $this->load->view('Header_View');
            $this->load->view('Home_View', $data);
            $this->load->view('Footer_View'); 
        }     
    }

    /*function check_default($post_string)
    {
        return $post_string == '0' ? false : true;
    }*/

    function check_phone($post_string)
    {
        $len = strlen($post_string);
        if(($len > 0) AND (($len < 14) OR ($len > 15)))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    function check_check($post_string)
    {
        print_r($post_string);
        $len = count($post_string);
        if(($len > 2))
        {
            return false;
        }
        else
        {
            return true;
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

    function check_date($post_string)
    {
        $len = strlen($post_string);
        if(($len > 0) and ($len == 10))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function check_other_field($post_string, $other_field)
    {
        if(($this->input->post($other_field) == 'Outros') AND ($post_string == ''))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    function check_interval($post_string, $other_field)
    {
        if(($this->input->post($other_field) == 'Sim') AND ($post_string <= 0) OR ($post_string > 10))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    function data_hoje()
    {
        date_default_timezone_set('America/Sao_Paulo');;
        $dathoj = new DateTime();
        return $dathoj;
    }

    function converte_data($data)
    {
        $olddat = explode('/', $data);
        $newdat = $olddat[2].'-'.$olddat[1].'-'.$olddat[0];
        return $newdat;
    }

}