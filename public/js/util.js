//Local onde está sendo executado o projeto
//é necessário inserir o HTTP:// para que o arquivo seja lido pelo navegador.
//senão o navegador irá duplicar o local do arquivo gerando erro.
const BASE_URL = "http://localhost:8080";

//Arquivo para selecionar local onde será exibido/apagado ERRO caso houver.
//Assim como também é selecionado o local da imagem de LOAD acessando sistema.

//FUNÇÃO PARA LIMPAR ERROS
function clearErros(){
    //has-error é uma classe para tratamento de erro
    $(".has-error").removeClass("has-error");
    $(".help-block").html("");
}

// FUNÇÃO PARA RESERVAR AREA ONDE IREMOS EXIBIR ERROS
function showErrors(error_list){
    clearErros();

    $.each(error_list, function(id, message){
        $(id).parent().parent().addClass("has-error");
        $(id).parent().siblings(".help-block").html(message)
        //parent() serve para selecionar uma <div> anterior
        //siblings() é o seletor de classe onde aparecerá a mensagem
    })
}

// Função para exibir imagem de LOADING
function loadingImg(message=""){
    return "<i class='fa fa-spinner fa-spin fa-3x' </i>&nbsp;" + message;
}