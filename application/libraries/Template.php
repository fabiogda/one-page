<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

    //Função que modulariza a página, carregando os arquivos apenas uma vez (header, footer e script)
    function show($view, $data=array()){

        $CI = & get_instance();

        //load Header
        $CI->load->view('template/header', $data);

        //load Content
        $CI->load->view($view, $data);

        //load Footer
        $CI->load->view('template/footer', $data);

        //load Scripts
        $CI->load->view('template/script', $data);
    }
}
