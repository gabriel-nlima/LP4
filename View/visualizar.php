<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Visualizar Agendamentos </title>
    <?php
        //importando o CSS do Bootstrap para a pagina.
        include_once ('Templates/TemplateBootstrap.html');
    ?>
    <!-- chamando o arquvio externo que tem todos os JavaScripts da pagina para usar -->
    <script type="text/javascript" src="Templates/TemplateJS.js" ></script>

</head>

<body style="background-color: ghostwhite">
<!-- Botões na Navbar -->
<!-- Botão Inicio -->
<?php include_once ('Templates/TemplateMenu.html'); ?>

<div class="container" style="padding-top: 20px">
    <div class="row">
        <?php

        include_once('../mpdf60/mpdf.php');
            if(!isset($_GET['acao'])){
                echo "<div class='col-xs-12 col-md-12'>";
            echo "<h1>Pesquisar</h1></br>";

            echo "<div class='row'>
            <div class='col-xs-12 col-md-12'>
            <form method='post' action='visualizar.php?acao=pesquisar' role='form'>
                    <input type='text' name='nome' placeholder='Digite um nome' value=''/>
                    <input type='submit' class='btn btn-primary' value='Pesquisar'>
                    </form>";
            echo    "<form method='post' action='visualizar.php?acao=gerar' role='form'>
                    <input type='submit' class='btn btn-primary disabled' value='Gerar PDF'>
                    </form>
                    </div>
                    </div>";

            include_once('ViewAgenda.php');
            echo "<h2>Agendas encontradas:</h2>";
            $view = new ViewAgenda();
            $view->exibeTabelaAgenda();
            echo "</div>";

            }elseif(isset($_GET['acao']) && $_GET['acao'] == 'pesquisar'){
            echo "<div class='col-xs-12 col-md-12'>";
            echo "<h1>Pesquisar</h1></br>";
            echo "<form method='post' action='visualizar.php?acao=pesquisar' role='form'>
                    <input type='text' name='nome' placeholder='Digite um nome' value=''/>
                    <input type='submit' class='btn btn-primary' value='Pesquisar'>
                    </form>";
            echo    "<form method='post' action='visualizar.php?acao=gerar' role='form'>
                    <input type='submit' class='btn btn-primary disabled' value='Gerar PDF'>
                    </form>";

            include_once ('ViewAgenda.php');
            $view = new ViewAgenda();
            $view->exibeTabelaAgendaPeloNome();
            echo "</div>";
            }elseif (isset($_GET['acao']) && $_GET['acao'] == 'enviar') {
                include_once('../Controller/ControllerAgenda.php');
                $controller = new ControllerAgenda();
                $controller->enviarDadosAgenda();
                
            }elseif(isset($_GET['acao']) && $_GET['acao'] == 'atualizar'){
            echo "<div class='col-xs-12 col-md-12'>";    
            echo "<h1>Pesquisar</h1></br>";
            echo "<form method='post' action='visualizar.php?acao=pesquisar' role='form'>
                    <input type='text' name='nome' placeholder='Digite um nome' value=''/>
                    <input type='submit' class='btn btn-primary' value='Pesquisar'>
                    </form>";
            echo    "<form method='post' action='visualizar.php?acao=gerar' role='form'>
                    <input type='submit' class='btn btn-primary disabled' value='Gerar PDF'>
                    </form>";

                include_once ('../Controller/ControllerAgenda.php');
                $controller = new ControllerAgenda();
                $controller->atualizarDadosAgenda();
                echo "</div>";

            }elseif(isset($_GET['acao']) && $_GET['acao'] == 'deletar'){
            include_once ('../Controller/ControllerAgenda.php');
            $controller = new ControllerAgenda();
            $controller->deletarAgenda();

            }elseif(isset($_GET['acao']) && $_GET['acao'] == 'gerar'){
                //include_once('../mpdf60/mpdf.php');
                include_once ('../Model/GerarPDF.php');
                $gerar = new GerarRelatorio();
                
            }
        ?>
</div>
</div>
<!-- RODAPE
<div class="container" >
<div class="footer">
    Teste - Todos os direitos reservados.
</div>
</div>
-->
<?php
    //incluindo o JS do BootStrap
        include ('Templates/TemplateBootstrapJS.html');
    ?>
</body>
</html>