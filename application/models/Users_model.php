<?php 

class Users_model extends CI_Model{

    //Função construtora da MODEL
    public function __construct (){
        parent::__construct();
        $this->load->database();
    }

    //Função que verifica os dados no BANCO 
    //sintaxe: SELECT ... FROM ... WHERE ... = ...
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
}