    <!-- TELA VISUALIZADA APÓS USUARIO CONSEGUIR LOGAR -->    
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

        <div class="row">
				<div class="col-lg-offset-5 col-lg-2 text-center">
	    			<div class="form-group">
                        <a class="btn btn-link"><i class="fa fa-user"></i></a>
                        <a class="btn btn-link" href="restrict/logoff"><i class="fa fa-sign-out"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#trabalho" role="tab" data-toggle="tab">Trabalhos</a></li>
                <li><a href="#equipe" role="tab" data-toggle="tab">Equipe</a></li>
                <li><a href="#usuario" role="tab" data-toggle="tab">Usuários</a></li>
            </ul>

            <div class="tab-content">
                <div id="trabalho" class="tab-pane active">
                    <div class="container-fluid">
                        <h2 class="text-center"><strong>Gerenciar Trabalhos</strong></h2>
                        <!-- BOTAO PARA TESTAR MODAL -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_trampo"><i class="fa fa-plus">&nbsp Acionar modal</i></button>
                        <!-- ======================= -->
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
                <div id="equipe" class="tab-pane">
                    <div class="container-fluid">
                        <h2 class="text-center"><strong>Gerenciar Equipe</strong></h2>
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
                <div id="usuario" class="tab-pane">
                    <div class="container-fluid">
                        <h2 class="text-center"><strong>Gerenciar Usuários</strong></h2>
                        <a id="btn_add_usuarios" class="btn btn-primary"><i class="fa fa-plus"> Adicionar usuário</i></a>
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
            </div>
        </div>
    </section>

<!-- ================== MODAL ================== -->
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
                            <input type="file" accept="image/*" id="trampo_img" name="trampo_img" class="form-control">
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

                    <!-- CAMPO DESCRIÇÃO -->
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