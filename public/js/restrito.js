$(function(){

    //ACIONAR MODAL TRABALHO
    $("#btn_add_trampo").click(function(){
        clearErros(); //limpa os erros
        $("#form_trampo")[0].reset(); //limpa todos os campos do tipo input no modal
        $("#trampo_img_path").attr("src", ""); //limpa o campo IMG
        $("#modal_trampo").modal(); //Abre modal
    });

    //ACIONAR MODAL EQUIPE
    $("#btn_add_equipe").click(function(){
        clearErros();
        $("#form_equipe")[0].reset(); //limpa todos os campos do tipo input no modal
        $("#membro_foto_path").attr("src", ""); //limpa o campo IMG
        $("#modal_equipe").modal(); //Abre modal
    });

    //ACIONAR MODAL USUARIO
    $("#btn_add_usuario").click(function(){
        clearErros(); //limpa os erros
        $("#form_usuario")[0].reset(); //limpa todos os campos do tipo input no modal
        $("#modal_usuario").modal(); //Abre modal
    });

    //ACIONA FUNÇÃO AJAX DO ARQUIVO UTIL.JS
    //btn_upload_trampo_img é o input que está com a imagem armazenada
    //parametros passados para util.js (this significa que é o [btn_upload_trampo_img], trampo_img_path e trampo_img)
    //trampo_img_path é o local onde aparecerá um preview da imagem (arquivo temporario) <img>
    //trampo_img é o local que exibe o caminho onde esta o arquivo
    //Formulário TRABALHO
    $("#btn_upload_trampo_img").change(function() {
        uploadImg($(this), $("#trampo_img_path"), $("#trampo_img")); //this significa #btn_upload_trampo_img
    });

    //Formulário EQUIPE
    $("#btn_upload_membro_foto").change(function() {
        uploadImg($(this), $("#membro_foto_path"), $("#membro_foto")); //this significa #btn_upload_membro_foto
    });

    //Envio do formulário TRAMPO =====================
    $("#form_trampo").submit(function() {

        $.ajax ({
            type: "post",
            url: BASE_URL + "/Restrict/ajax_save_trabalho",
            dataType: "json",
            data: $(this).serialize(), //this significa #form_trampo

            beforeSend: function(){
                clearErros();
                $("#btn_salvar_trampo").siblings(".help-block").html(loadingImg());
            },

            success: function(response) { //response é a resposta da função ajax_salvar_trabalho do controller
                clearErros();
                if(response["status"]){
                    $("#modal_trampo").modal("hide"); //estando tudo certo, aqui fecha o modal após salvar
                } else{
                    showErrorsModal(response["error_list"]);
                }
            }
        })
        return false;
    })

    //Envio do formulário EQUIPE =====================
    $("#form_equipe").submit(function() {

        $.ajax ({
            type: "post",
            url: BASE_URL + "/Restrict/ajax_save_equipe",
            dataType: "json",
            data: $(this).serialize(), //this significa #form_equipe

            beforeSend: function(){
                clearErros();
                $("#btn_salvar_equipe").siblings(".help-block").html(loadingImg());
            },

            success: function(response) { //response é a resposta da função ajax_salvar_trabalho do controller
                clearErros();
                if(response["status"]){
                    $("#modal_equipe").modal("hide"); //estando tudo certo, aqui fecha o modal após salvar
                } else{
                    showErrorsModal(response["error_list"]);
                }
            }
        })
        return false;
    })

    //Envio do formulário USUARIO =====================
    $("#form_usuario").submit(function() {

        $.ajax ({
            type: "post",
            url: BASE_URL + "/Restrict/ajax_save_user",
            dataType: "json",
            data: $(this).serialize(), //this significa #form_usuario

            beforeSend: function(){
                clearErros();
                $("#btn_salvar_usuario").siblings(".help-block").html(loadingImg());
            },

            success: function(response) { //response é a resposta da função ajax_salvar_trabalho do controller
                clearErros();
                if(response["status"]){
                    $("#modal_usuario").modal("hide"); //estando tudo certo, aqui fecha o modal após salvar
                } else{
                    showErrorsModal(response["error_list"]);
                }
            }
        })
        return false;
    })

})