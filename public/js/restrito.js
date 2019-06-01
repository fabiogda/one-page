$(function(){

    //ACIONAR MODAL TRABALHO
    $("#btn_add_trampo").click(function(){
        $("#modal_trampo").modal();
    });

    //ACIONAR MODAL EQUIPE
    $("#btn_add_equipe").click(function(){
        $("#modal_equipe").modal();
    });

    //ACIONAR MODAL USUARIO
    $("#btn_add_usuario").click(function(){
        $("#modal_usuario").modal();
    });

    //ACIONA FUNÇÃO AJAX DO ARQUIVO UTIL.JS
    //btn_upload_trampo_img é o input que está com a imagem armazenada
    //parametros passados para util.js (this significa que é o [btn_upload_trampo_img], trampo_img_path e trampo_img)
    //trampo_img_path é o local onde aparecerá um preview da imagem (arquivo temporario) <img>
    //trampo_img é o local que exibe o caminho onde esta o arquivo
    //Formulário TRABALHO
    $("#btn_upload_trampo_img").change(function() {
        uploadImg($(this), $("#trampo_img_path"), $("#trampo_img"));
    });

    //Formulário EQUIPE
    $("#btn_upload_membro_foto").change(function() {
        uploadImg($(this), $("#membro_foto_path"), $("#membro_foto"));
    });

})