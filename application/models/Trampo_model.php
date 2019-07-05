<?php 

class Trampo_model extends CI_Model{

    //Função construtora da MODEL
    public function __construct (){
        parent::__construct();
        $this->load->database();
    }

    //Função para trazer as informaçoẽs do TRABALHO ============
    //Parametro $select = NULL é padrão
    public function get_data($id){

        //traz uma ou todas as informações da tabela
        $this->db->from("trabalho");
        $this->db->where("trabalho_id", $id);
        return $this->db->get();
    }

    //Função para INSERIR dados ==========
    public function insert($data){
        $this->db->insert("trabalho", $data);
    }

    //Função para ATUALIZAR dados ==========
    public function update($id, $data){
        $this->db->where("trabalho_id", $id);
        $this->db->update("trabalho", $data);
    }

    //Função para EXCLUIR dados ==========
    public function delete($id){
        $this->db->where("trabalho_id", $id);
        $this->db->delete("trabalho");
    }
    
    //Função para verificar se a informação inserida no formulário já existe no banco
    //Field equivale a todos os inputs do formulário (pode ser alterado para um campo especifico), mas por tratar todos é mais prático
    //Value é o valor que está sobre os inputs
    //id serve para que seja excluido o ID de busca, para que quando seja atualizado alguma informação, não duplique no banco
    public function is_duplicated($field, $value, $id = NULL){

        if(!empty($id)){
            $this->db->where("trabalho_id <>", $id);
        }
        $this->db->from("trabalho");
        $this->db->where($field, $value);
        return $this->db->get()->num_rows() > 0; //se for maior que zero, está duplicado, retornando como verdadeiro
    }

    //==========================================================================================================================================================
    //==============================================  DATATABLE ================================================================================================
    //==========================================================================================================================================================
    /* CAMPOS VIA POST (DATATABLE)
        DATATABLE
    $_POST['search']['value'] = campo de busca
    $_POST['order'] = [[0, 'asc']] = define como ordenação
        $_POST['order'][0]['column'] = index da coluna, são as colunas  da tabela do banco
        $_POST['order'][0]['dir'] = tipo de ordenação (asc, desc)
    $_POST['length'] = Quantas buscas traz da tabela (10, 25, 50, 100..)
    $_POST['start'] = Qual posição começa (paginação)
    */

    //quando digitado na busca pesquisa por conteudo no NOME ou DESCRIÇÃO
    var $column_search = array("trampo_nome", "trampo_descricao"); //nome e descricao são os campos do BANCO, quando inserido caracter na caixa de pesquisa ira buscar os valores nesses campos
    //quando clickado na coluna ordena o NOME ou DURAÇÃO (para pular uma coluna de ordenação, deixar o campo vazio "")
    var $column_order = array ("trampo_nome", "", "trampo_duracao"); //nome, "", descricao são os campos do BANCO (o que ficou vazio é o campo da imagem)
    
    //Função que cria o metodo de busca dinamica e ordenação ======
    private function _get_datatable() {

        //variavel iniciada como vazia
        $search = NULL;
        //se existir conteudo em search, retorna o valor (campo de busca dinamico)
        if ($this->input->post("search")) { //search é o campo de pesquisa do datatable
            $search = $this->input->post("search")["value"]; //value é o valor inserido
        }

        //variaveis iniciada como vazia
        $order_column = NULL; 
        $order_dir = NULL;
        //se existir conteudo em search, retorna o valor
        $order = $this->input->post("order"); //order é o campo de ordenação vindo do datatable
        if (isset($order)) {
            $order_column = $order[0]["column"]; //recebe o nome da coluna da tabela
            $order_dir = $order["dir"]; //organiza de forma ascendente ou descendente o conteudo da coluna
        }

        //usar a tabela trabalho
        $this->db->from("trabalho");

        //realiza uma query(busca) nos campos, baseado pelos caracteres inserido na barra de pesquisa (busca dinamica)
        if (isset($search)) {
            //variavel iniciada com valor TRUE
            $first = TRUE;
                foreach ($this->column_search as $field){
                    if($first){
                        $this->db->group_start(); //cria uma instancia de busca
                        $this->db->like($field, $search); //usando a condição AND para junção das palavras na caixa de busca
                        $first = FALSE; //false significa a quebra da condição AND e direciona para a condição OR abaixo
                    } else {
                        //ainda utilizando a instancia de busca, é alterado a busca para OR caso a condição AND for quebrada
                        $this->db->or_like($field, $search);
                    }
                }

            //encerra a busca
            if (!$first){
                $this->db->group_end();
            }
        }

        //ordenação da coluna reconhecido pela numeção 0,1..(0=id, 1=nome..) e do menor valor/maior valor
        if(isset($order)){
            $this->db->order_by($this->column_order[$order_column], $order_dir);
        }
    }

    // Função que retorna a informação para o DATATABLE
    public function get_datatable(){

        $lenght = $this->input->post("lenght"); //recebe a quantidade de busca
        $start = $this->input->post("start"); //informa onde esta sendo iniciado a busca
        $this->_get_datatable();

        if (isset($lenght) && $lenght != -1){
            $this->db->limit($lenght, $start); // informa a quantidade de busca por paginação [10], [25], [50]..
        }
        return $this->db->get()->result();
    }

    // função para saber quantos campos estão sendo filtrados
    public function record_filtered(){
        
        $this->_get_datatable();
        //retornando o numero de linhas
        return $this->db->get()->num_rows();
    }

    // record_filtered e records_total são nomes que são reconhecidos pelo datatable

    // função que retorna o total de linhas que existem
    public function records_total() {

        //count_all_results é função nativa do codeigniter
        $this->db->count_all_results(); //retorna todos os resultados como numero
    }
    
    
}