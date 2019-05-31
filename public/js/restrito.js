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
    //trampo_img_path é a da <img>
    //trampo_img pertence ao input que faz o caminho do arquivo para o controller
    //Formulário TRABALHO
    $("#btn_upload_trampo_img").change(function() {
        uploadImg($(this), $("#trampo_img_path"), $("#trampo_img"));
    });

    //Formulário EQUIPE
    $("#btn_upload_membro_foto").change(function() {
        uploadImg($(this), $("#membro_foto_path"), $("#membro_foto"));
    });

})