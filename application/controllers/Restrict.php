<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restrict extends CI_Controller {

    //Função construtora de sessão
    public function __construct(){
        parent::__construct();
        $this->load->library("session");
    }

    public function index(){
    //echo password_hash ("123456", PASSWORD_DEFAULT); //codifica a senha
    //Testa a conexão passando como parametro o ID
    //$this->load->model("users_model");
    //echo "<pre>";
    //print_r ($this->users_model->get_user_data("fabioga"));
    
    //Este IF serve para identificar se o usuário está logado
    //Se estiver direciona para a página RESTRITO.
    if ($this->session->userdata("user_id")) {
        $data = array(
            "scripts" => array(
            "util.js",
            "restrito.js"
            )
        );
        $this->template->show("restrito.php", $data);
    //Se não estiver logado, é carregado a tela de login
    }else{
        //Assim que a pagina login.php é requisitada, a mesma carrega acrescentando 2 arquivos scripts
        $data = array(
            "scripts" => array(
            "util.js",
            "login.js"
            )
        );
        $this->template->show("login.php",$data);
    }
    }

    //Função que destroy a sessão, encerrando acesso
    public function logoff(){
        $this->session->sess_destroy();
        header("Location: " . base_url() . "/Restrict"); //Redireciona para a tela de login após deslogar
        //header("refresh:3;url=" . base_url() . "/Restrict"); //Redireciona para a tela de login após 3segundos
    }

    //Função que verifica se os dados inseridos estão corretos
    public function ajax_login(){

        //Verifica se este controller está sendo acessado diretamente
        //Se for passado por JSON é permitido o acesso.
        if (!$this->input->is_ajax_request()){
            exit("Você foi impedido de acessar a requisição diretamente!");
        }

        //Inserção do metodo AJAX para verificar via JSON
        //Este metodo não faz recarregar a página
        $json = array();
        $json["status"] = 1;
        $json["error_list"] = array();

        //USUARIO e SENHA fornecidos pelo formulário
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        //verifica se o campo USUARIO está vazio
        if(empty($username)){
            $json["status"] = 0;
            $json["error_list"]["#username"] = "Usuário não pode ser vazio!";
        }
        //Se o USUARIO estiver preenchido corretamente é verificado no banco
         else{
            $this->load->model("users_model");
            $result = $this->users_model->get_user_data($username);
            //Pega o USUARIO e compara se a SENHA digitada confere
            if($result){
                $user_id = $result->user_id; //user_id sem o $ é a referencia do campo no banco de dados (olhar na model)
                $password_hash = $result->password_hash; //password_hash referencia do campo no banco de dados (olhar na model)
                //Verifica se o campo SENHA está vazio
                //se estiver correto, set_userdata cria uma sessão com base no USUARIO logado.
                if(password_verify($password, $password_hash)){
                    $this->session->set_userdata("user_id", $user_id);
                }else{
                    //caso a SENHA inserida errada, é setado como 0 e será barrado abaixo
                    $json["status"] = 0;
                }
            }else{
                //caso SENHA não coincida com o USUARIO, é setado como 0 e será barrado abaixo
                $json["status"] = 0;
            }
            /* verifica a condição de acesso dos testes acima,
            caso USUARIO for errado/vazio e SENHA errada/vazia,
            exibe mensagem de erro */
            if($json["status"] == 0){
                $json["error_list"]["#btn_login"] = "Usuário e/ou senha incorretos!";
            }
        }
        //Estando todas as informações corretas, converte este resultado em um arquivo TXT que é lido pelo Login.JS
        echo json_encode($json);     
    }

    public function ajax_import_image(){

        //Verifica se este controller está sendo acessado diretamente
        //Se for passado por JSON é permitido o acesso.
        if (!$this->input->is_ajax_request()){
            exit("Você foi impedido de acessar a requisição diretamente!");
        }

        //$config é variavel reservada do codeIgniter para configurar uma biblioteca
        //TMP é a pasta criada na raiz do projeto para armazenar arquivo antes de envia-lo ao banco
        $config["upload_path"] = "./tmp/"; //caminho onde o arquivo será salvo temporariamente
        $config["allowed_types"] = "gif|png|jpg"; //tipo de arquivo permitido
        $config["overwrite"] = TRUE; //caso já houver um arquivo com nome igual, sobrescreve

        //carrega a biblioteca UPLOAD que foi configurada acima
        $this->load->library("upload", $config);

        //Inserção do metodo AJAX para verificar via JSON
        $json = array();
        $json["status"] = 1;

        //Condição para testar se o arquivo é diferente de gif/png/jpg
        if(!$this->upload->do_upload("image_file")) {
            $json["status"] = 0;
            $json["error"] = $this->upload->display_errors("",""); //display_error exibe o tipo erro (função nativa da biblioteca UPLOAD)
        } else{
            //Caso o tipo da imagem for aceito, é especificado o tamanho(peso) 1024kb (1mb) é armazenado no DATA
            if ($this->upload->data()["file_size"] <= 1024){
                $file_name = $this->upload->data()["file_name"]; //nomeando a imagem enviada
                $json["img_path"] = BASE_URL() . "tmp/" . $file_name; //retorna o nome da imagem enviada como arquivo JSON
            } else{
                $json["status"] = 0;
                $json["error"] = "Arquivo não deve ser maior que 1 MB!";
                }

        }

        echo json_encode($json);

    }

}