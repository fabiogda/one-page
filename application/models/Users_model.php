<?php 

class Users_model extends CI_Model{

    //Função construtora da MODEL
    public function __construct (){
        parent::__construct();
        $this->load->database();
    }

    //Função que verifica os dados no BANCO 
    //sintaxe SQL: SELECT ... FROM ... WHERE ... = ...
    public function get_user_data($user_login){

        $this->db
        ->select("user_id, password_hash, user_full_name, user_email")
        ->from("users")
        ->where("user_login", $user_login);

        $resultado = $this->db->get();
        
        if ($resultado->num_rows() > 0){
            return $resultado->row();
        }else {
            return NULL;
        }

    }

    //Função para trazer as informaçoẽs do USUARIO ============
    //Parametro $select = NULL é padrão
    public function get_data($id, $select = NULL){

        //verifica se o arquivo foi passado corretamente é efetuado a busca
        if(!empty($select)) {
            $this->db->select($$select);
        }

        //traz uma ou todas as informações da tabela
        $this->db->from("users");
        $this->db->where("user_id", $id);
        return $this->db->get();
    }

    //Função para INSERIR dados ==========
    public function insert($data){
        $this->db->insert("users", $data);
    }

    //Função para ATUALIZAR dados ==========
    public function update($id, $data){
        $this->db->where("user_id", $id);
        $this->db->update("users", $data);
    }

    //Função para EXCLUIR dados ==========
    public function delete($id){
        $this->db->where("user_id", $id);
        $this->db->delete("users");
    }
    
    //Função para verificar se a informação inserida no formulário já existe no banco
    //Field equivale a todos os inputs do formulário (pode ser alterado para um campo especifico), mas por tratar todos é mais prático
    //Value é o valor que está sobre os inputs
    //id serve para que seja excluido o ID de busca, para que quando seja atualizado alguma informação, não duplique no banco
    public function is_duplicated($field, $value, $id = NULL){

        if(!empty($id)){
            $this->db->where("user_id <>", $id);
        }
        $this->db->from("users");
        $this->db->where($field, $value);
        return $this->db->get()->num_rows() > 0; //se for maior que zero, está duplicado, retornando como verdadeiro
    }
}