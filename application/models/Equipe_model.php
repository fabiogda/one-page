<?php 

class Equipe_model extends CI_Model{

   //Função construtora da MODEL
    public function __construct (){
        parent::__construct();
        $this->load->database();
    }

    //Função para trazer as informaçoẽs do TRABALHO ============
    //Parametro $select = NULL é padrão
    public function get_data($id){

        //traz uma ou todas as informações da tabela
        $this->db->from("equipe");
        $this->db->where("membro_id", $id);
    return $this->db->get();
    }

    //Função para INSERIR dados ==========
    public function insert($data){
        $this->db->insert("equipe", $data);
    }

    //Função para ATUALIZAR dados ==========
    public function update($id, $data){
        $this->db->where("membro_id", $id);
        $this->db->update("equipe", $data);
    }

    //Função para EXCLUIR dados ==========
    public function delete($id){
        $this->db->where("membro_id", $id);
        $this->db->delete("equipe");
    }
    
    //Função para verificar se a informação inserida no formulário já existe no banco
    //Field equivale a todos os inputs do formulário (pode ser alterado para um campo especifico), mas por tratar todos é mais prático
    //Value é o valor que está sobre os inputs
    //id serve para que seja excluido o ID de busca, para que quando seja atualizado alguma informação, não duplique no banco
    public function is_duplicated($field, $value, $id = NULL){

        if(!empty($id)){
            $this->db->where("membro_id <>", $id);
        }
        $this->db->from("equipe");
        $this->db->where($field, $value);
        return $this->db->get()->num_rows() > 0; //se for maior que zero, está duplicado, retornando como verdadeiro
    }
}