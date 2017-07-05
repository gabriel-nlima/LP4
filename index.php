<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Sistema de Agendamento Online v0.2</title>
  <?php
    //importando o CSS do Bootstrap para a pagina.
    include_once ('View/Templates/TemplateBootstrap.html');
  ?>
    <!-- chamando o arquvio externo que tem todos os JavaScripts da pagina para usar -->
    <script type="text/javascript" src="View/Templates/TemplateJS.js" ></script>

</head>
<body>

<div class="container-fluid">
    <header class="row">
        <h1 class="page-header">Bem-vindo ao sistema de agendamentos online.</h1>
        <i> Por favor, efetue login para continuar.</i>
    </header>

</div>

<!-- Container com todas Funções de Login e Registro -->
<div class="container" style="left: 5%">
    <div class="row">
        <div role="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-login">
                            <div class="panel-heading">
                                <div class="row">

                                    <!-- Botão login em cima do quadro de Login -->
                                    <div class="col-xs-6">
                                        <a href="login.html" class="active" id="login-form-link">Login</a>
                                    </div>

                                    <!-- Botão registrar em cima do quadro de Login -->
                                    <div class="col-xs-6">
                                        <a href="#" id="register-form-link">Registrar</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php
                                        	include_once ('View/ViewUsuario.php');
                                        	include_once('Controller/ControllerUsuario.php');


                                            if(isset($_GET['acao']) && $_GET['acao'] == 'login'){
                                                $controller = new ControllerUsuario();
                                                $controller->LoginController();
                                            }elseif (!isset($validado)) {
                                                $view = new ViewUsuario();
                                                $view->exibeLogin();
                                                
                                            }
                                               
                                        ?>
                                        <?php

                                        include_once ('View/ViewUsuario.php');
                                        include_once('Controller/ControllerUsuario.php');

                                        

                                        if(isset($_GET['acao']) && $_GET['acao'] == 'registrar'){
                                            $controller = new ControllerUsuario();
                                            $controller->RegistraController();
                                        }else{
                                            $view = new ViewUsuario();
                                            $view->exibeRegistrar();
                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    //incluindo o JS do BootStrap
    include ('View/Templates/TemplateBootstrapJS.html');
?>
</body>
</html>