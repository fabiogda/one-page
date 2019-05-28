        <!-- Espaçamento da area section entre o nav e o footer -->        
        <section style="min-height: calc(100vh - 83px);" class="light-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-offset-3 col-lg-6 text-center">
						<div class="section-title">
                            <h2>Login</h2>
                            
                            <!-- FORMULÁRIO -->
                            <form id="login_form" method="POST">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <!-- DIV que permite colocar um icone em linha-->
                                            <div class="input-group-addon">
                                                <!-- Imagem do cadeado na linha da senha -->
                                                <span class="glyphicon glyphicon-user"></span>
                                            </div>
                                                <input type="text" id="username" name="username" class="form-control" placeholder="Usuário">                
                                            </div>
                                            <!-- LOCAL ONDE PODE APARECER O ERRO VINDO DO LOGIN.JS -->
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <!-- DIV que permite colocar um icone em linha-->
                                            <div class="input-group-addon">
                                                <!-- Imagem do cadeado na linha da senha -->
                                                <span class="glyphicon glyphicon-lock"></span>
                                            </div>
                                                <input type="password" id="password" name="password" class="form-control" placeholder="Senha">                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                        <button type="submit" id="btn_login" class="btn btn-block">Logar</button>
                                        </div>
                                        <!-- LOCAL ONDE PODE APARECER O ERRO VINDO DO LOGIN.JS -->
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </form>

						</div>
					</div>
				</div>
			</div>
		</section>