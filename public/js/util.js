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

// Função que pega a imagem enviada do HTML(restrito.js) e envia para o CONTROLLER via AJAX
function uploadImg(input_file, img, input_path){

    //varial que pega a imagem, src é o tipo GIF/PNG/JPG, e caso der erro volta para o source original
    src_before = img.attr("src");
    //varial que recebe o arquivo do input_file enviado do HTML
    img_file = input_file[0].files[0];
    //form_data é um formulário nativo do JS
    form_data = new FormData();
    //adicionar campo image_file ao formulário (image_file é o nome dado lá no controller)
    form_data.append("image_file", img_file);

    //Metodo AJAX
    $.ajax({
        //Caminho onde será tratado o upload da imagem (localhost/controller/função)
        url: BASE_URL + "/Restrict/ajax_import_image",
        //tipo do arquivo gerado
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        //Formulário criado acima com campo imagem
        data: form_data,
        //Ação de envio
        type: "POST",
        //Antes de enviar caso houver algum erro LIMPA e EXIBE imagem de loading
        beforeSend: function(){
            clearErros();
            input_path.siblings(".help-block").html(loadingImg()); //Imagem de loading
            //setTimeout(function(){},2000);
        },
        //Estando tudo certo
        success: function(response){
            clearErros();
            if (response["status"]){
                img.attr("src", response["img_path"]); //image_path é uma chave da array JSON criada no controller que tera o valor atribuido. (este valor é a imagem)
                input_path.val(response["img_path"]); //input_path é o caminho de onde a imagem veio -- Além de mostrar a imagem, esse campo fica oculto, quando salvar o formulário, ele que vai ser mandado ao controller e salvo.
                console.log(input_path);
            }else{
                //Em caso de erro ou falha do envio é feito o rollback
                img.attr("src" , src_before); //Volta para a imagem anterior
                input_path.siblings(".help-block").html(response["error"]); //Exibe o erro na tela
            }
        },
        //resguarda sobre erro no envio
        //caso o upload falhe, garante que a imagem anterior não seja perdida
        error: function(){
            img.attr("src", src_before);
        }
    })
}