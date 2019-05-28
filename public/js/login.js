//Fomulário de LOGIN é enviado para cá
$(function(){

    //Seletor que puxa o formulário após clickar no botão
    $("#login_form").submit(function(){

        //Função que verifica a integridade das informações do formulário
        $.ajax({
            //verifica se o metodo passado POST está correto
            type: "post",
            //Passa para o controller realizar a verificação do USUARIO e SENHA
            //BASE_URL está setado como localhost no arquivo config.php
            url: BASE_URL + "/Restrict/ajax_login",
            //define o tipo de arquivo para leitura
            dataType: "json",
            /*-----------------------------------------------------------------------------------------
            Método que coleta as informações e transforma em string.
            Para que o método serialize() funcione, é necessário que os campos de entrada dos dados
            a serem serializados sejam marcados com o atributo name.
            */
            data: $(this).serialize(),
            
            //Enquanto verifica as informações passada do formulário apaga a mensagem de erro, caso houver.
            //Exibe imagem de LOAD do arquivo util.js durante a verificação
            beforeSend: function(){
                clearErros(); //apaga a mensagem de erro
                $("#btn_login").parent().siblings(".help-block").html(loadingImg()); //exibe imagem de LOAD enquando está verificando                
            },
            //Caso estiver tudo OK, exibe imagem de LOAD com atraso de 2 segundo para o redirecionamento da página
            success: function(json){
                //verifica se o retorno do CONTROLLER está OK
                if (json["status"] ==1){
                    clearErros(); //apaga a mensagem de erro
                    $("#btn_login").parent().siblings(".help-block").html(loadingImg()); //exibe imagem de LOAD enquando está logando
                    setTimeout(function(){ window.location = BASE_URL + "/Restrict"; }, 2000); //Redirecionamento com delay de 2seg para exibir a pagina de logado
                }else {
                    //Se o retorno da verificação não for valida, exibe o ERRO sobre(usuario vazio/errado, senha vazia/errada);
                    showErrors(json["error_list"]);
                }
            },
            //qualquer erro derivado do JS será exibido no F12->Console
            error: function(response){
                console.log(response);
            }
        })

        return false;
    })
})