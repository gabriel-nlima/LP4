<?php

class ViewUsuario{
        //funcao que quando chamada, exibe o formulario de login
		public function exibeLogin(){

			include_once('formLogin.html');
		}
        //funcao que quando chamada, exibe o formulario de registro
		public function registrar($resultado){
            if(isset($resultado)){
                if($resultado == "Registrado com sucesso"){
                    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0; URL=
                    http://localhost/Projeto PHP/View/paginaInicial.php'>
                    <script type=\"text/javascript\">alert(\"Salvo com sucesso.\");</script>";
                }else{
                    echo "<script type=\"text/javascript\">alert(\"Falha ao salvar\");</script>";
                    include_once('formRegistrar.html');
                }
            }else{
                include_once('formRegistrar.html');
            }
			
		}

        public function exibeRegistrar(){
            include_once('formRegistrar.php');
        }
        //funcao que mostra algum resultado na tela quando chamado
		public function mostrar($resultado){
			echo $resultado;
		}
        //funcao que mostra o resultado do login e redireciona o usuario para a pagina inicial ao clicar no alerta em js
        public function Login($validado){
        	if($validado == "Login efetuado com sucesso"){
        echo "<META HTTP-EQUIV=REFRESH CONTENT = '0; URL=
                    http://localhost/Projeto PHP/View/paginaInicial.php'>
                    <script type=\"text/javascript\">alert(\"Login Efetuado com sucesso.\");</script>";
                }else{
                	echo "<script type=\"text/javascript\">alert(\"Usuario ou senha incorreto\");</script>";
                	include_once('formLogin.html');
                }
        }

        public function recebeDadosUser($idUsuario, $usuario, $nomeUsuario,$sobrenomeUsuario,$cpfUsuario,$emailUsuario,$cepUsuario,$bairro,$rua,$cidade,$uf){
            
            echo "<div class='panel panel-login'>
                            <div class='panel-heading'>
                                <div class='row'>
                                <div class='col-xs-12 col-md-12 text-center'>
                                        <h2>Atualizar</h2>
                                    </div>
                                </div>
                                <div class='panel-body'>
                                <div class='row'>
                                    <div class='col-lg-12 col-md-12 col-xs-12'>
                                    <form id='register-form' action='Usuarios.php?acao=atualizar&id=$idUsuario' method='post' role='form'>
                <div class='form-group'>
                    <input type='text' name='usuario' id='usuario' tabindex='1' class='form-control' maxlength='15' placeholder='Usuário (Para efetuar login)'value='$usuario' required='true'>
                </div>
                <div class='form-group'>
                    <input type='text' name='nome' id='nome' tabindex='1' class='form-control' maxlength='30' placeholder='Nome' value='$nomeUsuario' required='true'>
                </div>
                <div class='form-group'>
                    <input type='text' name='sobrenome' id='sobrenome' tabindex='1' class='form-control' maxlength='45' placeholder='Sobrenome' value='$sobrenomeUsuario' required='true'>
                </div>
                <div class='form-group'>
                    <input type='text' name='cpf' id='cpf' class='form-control' maxlength='14' OnKeyPress=\"formatar('###.###.###-##', this)\" placeholder='CPF' value='$cpfUsuario' required='true'>
                </div>
                <div class='form-group'>
                    <input type='email' name='email' id='email' tabindex='1' class='form-control' maxlength='45' placeholder='Endereço de e-mail' value='$emailUsuario' required='true'>
                </div>
                <div class='form-group'>
                    <input type='cep' name='cep' id='cep' class='form-control'  value='$cepUsuario' size='10' maxlength='9'
                        onblur=\"pesquisacep(this.value)\" OnKeyPress=\"formatar('#####-###', this)\" placeholder='CEP (Somente numerais)'' value=''>
                </div>
                <div class='form-group'>
                    <input type='text' name='rua' id='rua' tabindex='1' class='form-control' maxlength='40' placeholder='Rua' value='$rua'>
                </div>
                <div class='form-group'>
                    <input type='text' name='bairro' id='bairro' tabindex='1' class='form-control' maxlength='40' placeholder='Bairo' value='$bairro'>
                </div>
                <div class='form-group'>
                    <input type='text' name='cidade' id='cidade' tabindex='1' class='form-control' maxlength='40' placeholder='Cidade' value='$cidade'>
                </div>
                <div class='form-group'>
                    <input type='text' name='uf' id='uf' tabindex='1' class='form-control' maxlength='40' placeholder='UF' value='$uf'>
                </div>
                <div class='form-group'>
                    <input type='password' name='senha' id='senha' tabindex='2' class='form-control' maxlength='20' placeholder='Senha' required='true'>
                </div>
                                           
                <div class='form-group'>
                    <div class='row'>
                        <div class='col-sm-6 col-sm-offset-3'>
                            <input type='submit' name='register-submit' id='register-submit' tabindex='4' class='form-control btn btn-primary' value='Salvar'>
                        </div>
                                           
                    </div>
                </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";

        }

        public function exibeTabelaUsuarios(){
            
        	echo "<table class='table table-striped table-bordered table-hover table-responsive'>";
    		echo "<thead>
            		<tr>
                		<th> User </th>
                		<th> Nome </th>
                		<th> Sobrenome </th>
                		<th> Email </th>
                		<th> CPF </th>
                		<th> CEP </th>
                        <th> Ações </th>
       			</thead>
                <tbody>";
    
    		include_once ('../Controller/ControllerUsuario.php');
    		$controller = new ControllerUsuario();
    		$controller->listarUsuarios();
    echo "</tbody>";
    echo "</table>";

        }

        public function exibeTabelaUsuariosPeloNome(){
            
            echo "<table class='table table-striped table-bordered table-hover table-responsive'>";
            echo "<thead>
                    <tr>
                        <th> User </th>
                        <th> Nome </th>
                        <th> Sobrenome </th>
                        <th> Email </th>
                        <th> CPF </th>
                        <th> CEP </th>
                        <th> Ações </th>
                </thead>
                <tbody>";
    
            include_once ('../Controller/ControllerUsuario.php');
            $controller = new ControllerUsuario();
            $controller->listarUsuariosPeloNome();
    echo "</tbody>";
    echo "</table>";

        }

        public function Deletar($resultado){

            if($resultado == "Deletado"){
                echo "<META HTTP-EQUIV=REFRESH CONTENT = '0; URL=
                    http://localhost/Projeto PHP/View/Usuarios.php'>
                    <script type=\"text/javascript\">alert(\" Usuario deletado.\");</script>";
                    return "Ok";
            }else{
                echo "<script type=\"text/javascript\">alert(\"Erro ao deletar usuario\");</script>";
                return "Not ok";
            }
        }
    }
?>