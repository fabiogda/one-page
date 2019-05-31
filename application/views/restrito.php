    <!-- === TELA VISUALIZADA APÓS USUARIO CONSEGUIR LOGAR === -->    
    <section style="min-height: calc(100vh - 83px);" class="light-bg">
        <div class="container">

			<div class="row">
				<div class="col-lg-offset-3 col-lg-6 text-center">
	    			<div class="section-title">
                        <h2>Bem-vindo!</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- ====== Botões para informação e logoff ====== -->
        <div class="row">
				<div class="col-lg-offset-5 col-lg-2 text-center">
	    			<div class="form-group">
                        <a class="btn btn-link"><i class="fa fa-user"></i></a>
                        <a class="btn btn-link" href="restrict/logoff"><i class="fa fa-sign-out"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ==================== -->

        <!-- ====== ABAS ====== -->
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#trabalho" role="tab" data-toggle="tab">Trabalhos</a></li>
                <li><a href="#equipe" role="tab" data-toggle="tab">Equipe</a></li>
                <li><a href="#usuario" role="tab" data-toggle="tab">Usuários</a></li>
            </ul>
        <!-- ================== -->

        <!-- ====== ABA TRABALHO ====== -->
            <div class="tab-content">
                <div id="trabalho" class="tab-pane active">
                    <div class="container-fluid">
                        <h2 class="text-center"><strong>Gerenciar Trabalhos</strong></h2>
                        <!-- BOTAO PARA TESTAR MODAL -->
                        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_trampo"><i class="fa fa-plus">&nbsp Acionar modal</i></button>-->
                        <!-- ======================= -->
                        <!-- ====== BOTAO 1 ======-->
                        <a id="btn_add_trampo" class="btn btn-primary"><i class="fa fa-plus">&nbsp Adicionar trabalho</i></a>
                        <table id="dt_trampo" class="table table-striped table-bordered">
                            <thead>
                                <tr class="tableheader">
                                    <th>Nome</th>
                                    <th>Imagem</th>
                                    <th>Duração</th>
                                    <th>Descrição</th>
                                    <th>Ações</th>
                                </tr>
                            <thead>
                            <tbody>
                            </tbody>

                        </table>
                    </div>
                </div>
        <!-- ========================== -->

            <!-- ====== ABA EQUIPE ====== -->
                <div id="equipe" class="tab-pane">
                    <div class="container-fluid">
                        <h2 class="text-center"><strong>Gerenciar Equipe</strong></h2>
                        <!-- BOTAO PARA TESTAR MODAL -->
                        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_equipe"><i class="fa fa-plus">&nbsp Acionar modal</i></button>-->
                        <!-- ======================= -->
                        <!-- ====== BOTAO 2 ======-->
                        <a id="btn_add_equipe" class="btn btn-primary"><i class="fa fa-plus"> Adicionar equipe</i></a>
                        <table id="dt_equipe" class="table table-striped table-bordered">
                            <thead>
                                <tr class="tableheader">
                                    <th>Nome</th>
                                    <th>Foto</th>
                                    <th>Descrição</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>

                        </table>
                    </div>
                </div>
            <!-- ========================== -->

            <!-- ====== ABA USUARIO ====== -->
                <div id="usuario" class="tab-pane">
                    <div class="container-fluid">
                        <h2 class="text-center"><strong>Gerenciar Usuários</strong></h2>
                        <!-- BOTAO PARA TESTAR MODAL -->
                        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_usuario"><i class="fa fa-plus">&nbsp Acionar modal</i></button>-->
                        <!-- ======================= -->
                        <!-- ====== BOTAO 3 ======-->
                        <a id="btn_add_usuario" class="btn btn-primary"><i class="fa fa-plus"> Adicionar usuário</i></a>
                        <table id="dt_usuario" class="table table-striped table-bordered">
                            <thead>
                                <tr class="tableheader">
                                    <th>Login</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>

                        </table>
                    </div>
                </div>
            <!-- ========================== -->

            </div>
        </div>
    </section>

<!-- ================== MODAL aba TRABALHO ================== -->
<div id="modal_trampo" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- TITULO DO MODAL -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title"> Trabalhos </h4>
            </div>

            <!-- CONTEUDO DO MODAL-->
            <div class="modal-body">
                <!-- INICIANDO FORMULARIO -->
                <form id="form_trampo">

                    <input name="trampo_id" hidden>

                    <!-- CAMPO NOME -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nome</label>
                        <div class="col-lg-10">
                            <input id="trampo_nome" name="trampo_nome" class="form-control" maxlength="100">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <!-- CAMPO IMAGEM -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Imagem</label>
                        <div class="col-lg-10">
                            <!-- INSERÇÃO DE IMAGEM -->
                            <!-- == ELEMENTO DO TIPO IMG ONDE IRÁ APARECER A IMAGEM ENVIADA -->
                            <img id="trampo_img_path" name="trampo_img_path" src="" style="max-height: 400px; max-width: 400px">
                            <label class="btn btn-block btn-info">
                                <i class="fa fa-upload"></i>&nbsp; Importar Imagem
                                <!-- == ARMAZENA O ARQUIVO NESSE INPUT == -->
                                <input type="file" id="btn_upload_trampo_img" name="btn_upload_trampo_img" accept="image/*">
                            </label>
                            <!-- CAMINHO DO ARQUIVO -->
                            <input id="trampo_img" name="trampo_img">
                            <!-- ====== TESTE DE INSERÇÃO DE ARQUIVO ====== -->
                            <!--<input type="file" accept="image/*" id="trampo_img" name="trampo_img" class="form-control">-->
                            <!-- ===========================================-->
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <!-- CAMPO DURAÇÃO -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Duração</label>
                        <div class="col-lg-10">
                            <input type="number" min="0" id="trampo_duracao" name="trampo_duracao" class="form-control">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <!-- CAMPO DESCRIÇÃO -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Descrição</label>
                        <div class="col-lg-10">
                            <textarea id="trampo_descricao" name="trampo_descricao" class="form-control">
                            </textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <!-- BOTÃO SALVAR -->
                    <div class="form-group text-center">
                        <button type="submit" id="salvar_trampo" class="btn btn-primary">
                            <i class="fa fa-save"></i>&nbsp Salvar trabalho</i>
                        </button>
                        <span class="help-block"></span>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<!-- ================== MODAL aba EQUIPE ================== -->
<div id="modal_equipe" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- TITULO DO MODAL -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title"> Membro </h4>
            </div>

            <!-- CONTEUDO DO MODAL-->
            <div class="modal-body">
                <!-- INICIANDO FORMULARIO -->
                <form id="form_equipe">

                    <input name="equipe_id" hidden>

                    <!-- CAMPO NOME -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nome</label>
                        <div class="col-lg-10">
                            <input id="membro_nome" name="membro_nome" class="form-control" maxlength="100">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <!-- CAMPO IMAGEM -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Foto</label>
                        <div class="col-lg-10">
                            <!-- INSERÇÃO DE IMAGEM -->
                            <!-- == ELEMENTO DO TIPO IMG ONDE IRÁ APARECER A IMAGEM ENVIADA -->
                            <img id="membro_foto_path" name="membro_foto_path" src="" style="max-height: 400px; max-width: 400px">
                            <label class="btn btn-block btn-info">
                                <i class="fa fa-upload"></i>&nbsp; Importar Imagem
                                <!-- == ARMAZENA O ARQUIVO NESSE INPUT == -->
                                <input type="file" id="btn_upload_membro_foto" accept="image/*">  
                            </label>
                            <!-- CAMINHO DO ARQUIVO -->
                            <input id="membro_foto" name="membro_foto">
                            <!-- ====== TESTE DE INSERÇÃO DE ARQUIVO ====== -->
                            <!--<input type="file" accept="image/*" id="membro_foto" name="membro_foto" class="form-control">-->
                            <!-- ===========================================-->
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <!-- CAMPO DESCRIÇÃO -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Descrição</label>
                        <div class="col-lg-10">
                            <textarea id="membro_descricao" name="membro_descricao" class="form-control">
                            </textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <!-- BOTÃO SALVAR -->
                    <div class="form-group text-center">
                        <button type="submit" id="salvar_trampo" class="btn btn-primary">
                            <i class="fa fa-save"></i>&nbsp Salvar membro </i>
                        </button>
                        <span class="help-block"></span>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<!-- ================== MODAL aba USUARIO ================== -->
<div id="modal_usuario" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- TITULO DO MODAL -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title"> Usuários </h4>
            </div>

            <!-- CONTEUDO DO MODAL-->
            <div class="modal-body">
                <!-- INICIANDO FORMULARIO -->
                <form id="form_usuario">

                    <input name="usuario_id" hidden>

                    <!-- CAMPO Login -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Login</label>
                        <div class="col-lg-10">
                            <input id="usuario_login" name="usuario_login" class="form-control" maxlength="30">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <!-- CAMPO NOME -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nome completo</label>
                        <div class="col-lg-10">
                            <input id="usuario_nome" name="usuario_nome" class="form-control" maxlength="100">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <!-- CAMPO EMAIL -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">E-mail</label>
                        <div class="col-lg-10">
                            <input id="usuario_email" name="usuario_email" class="form-control" maxlength="100">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <!-- CAMPO CONFIRMAR EMAIL -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Confirmar e-mail</label>
                        <div class="col-lg-10">
                            <input id="usuario_email_confirm" name="usuario_email_confirm" class="form-control" maxlength="100">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <!-- CAMPO SENHA -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Senha</label>
                        <div class="col-lg-10">
                            <input type="password" id="usuario_senha" name="usuario_senha" class="form-control">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <!-- CAMPO CONFIRMAR SENHA -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Confirmar senha</label>
                        <div class="col-lg-10">
                            <input type="password" id="usuario_senha_confirm" name="usuario_senha_confirm" class="form-control">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <!-- BOTÃO SALVAR -->
                    <div class="form-group text-center">
                        <button type="submit" id="salvar_trampo" class="btn btn-primary">
                            <i class="fa fa-save"></i>&nbsp Salvar </i>
                        </button>
                        <span class="help-block"></span>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>