<!DOCTYPE html>
<html>
<head>
	<title>Usuarios do Sistema</title>
	<?php
    //importando o CSS do Bootstrap para a pagina.
    include_once ('Templates/TemplateBootstrap.html');
    ?>
    <!-- chamando o arquvio externo que tem todos os JavaScripts da pagina para usar -->
    <script type="text/javascript" src="Templates/TemplateJS.js" ></script>
</head>
<body style="background-color: ghostwhite">
<?php
	include_once ('Templates/TemplateMenu.html');
?>
<div class="container" style="padding-top: 20px">
	<div class="row">
		<?php

		if(!isset($_GET['acao'])){
            echo "<div class='row'>";
			echo "<div class='col-xs-12 col-md-12 col-lg-12'>";
			echo "<h1>Pesquisar</h1></br>";
			echo "<form method='post' action='Usuarios.php?acao=pesquisar' role='form'>
					<input type='text' name='nome' placeholder='Digite um nome' value=''/>
					<input type='submit' class='btn btn-primary' value='Pesquisar'>
					</form>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<div class='col-xs-12 col-md-12 col-lg-12'>";
		          include_once('ViewUsuario.php');
			echo "<h2>Usuarios encontrados:</h2>";
    		$view = new ViewUsuario();
    		$view->exibeTabelaUsuarios();
    		echo "</div>";
            echo "</div>";

    	}elseif (isset($_GET['acao']) && $_GET['acao'] == 'enviar') {
    		echo "<div class='col-xs-10 col-xs-offset-2 col-md-6 col-md-offset-3'>";
    		include_once ('../Controller/ControllerUsuario.php');
    		$controller = new ControllerUsuario();
    		$controller->enviarDadosUsuario();
    		echo "</div>";

    	}elseif (isset($_GET['acao']) && $_GET['acao'] == 'atualizar') {
    		include_once('../Controller/ControllerUsuario.php');
    		echo "<div class='col-xs-12 col-md-12'>";
    		echo "<h1>Pesquisar</h1></br>";
			echo "<form method='post' action='Usuarios.php?acao=pesquisar' role='form'>
					<input type='text' name='nome' placeholder='Digite um nome' value=''/>
					<input type='submit' class='btn btn-primary' value='Pesquisar'>
					</form>";

    		echo "<h1>Usuarios encontrados:</h1>";
    		$controller = new ControllerUsuario();
    		$controller->atualizarDadosUsuario();
    		echo "</div>";

    	}elseif (isset($_GET['acao']) && $_GET['acao'] == 'pesquisar') {
    		echo "<h1>Pesquisar</h1></br>";
			echo "<form method='post' action='Usuarios.php?acao=pesquisar' role='form'>
					<input type='text' name='nome' placeholder='Digite um nome' value=''/>
					<input type='submit' class='btn btn-primary' value='Pesquisar'>
					</form>";

    		include_once ('ViewUsuario.php');
    		$view = new ViewUsuario();
    		$view->exibeTabelaUsuariosPeloNome();

    	}elseif(isset($_GET['acao']) && $_GET['acao'] == 'deletar'){
    		include_once ('../Controller/ControllerUsuario.php');
    		$controller = new ControllerUsuario();
    		$controller->deletarUsuario();

    	}else{
            echo "<div class='col-xs-12 col-md-12'>";
            echo "<h1>Pesquisar</h1></br>";
            echo "<form method='post' action='Usuarios.php?acao=pesquisar' role='form'>
                    <input type='text' name='nome' placeholder='Digite um nome' value=''/>
                    <input type='submit' class='btn btn-primary' value='Pesquisar'>
                    </form>";
        include_once('ViewUsuario.php');

            echo "<h2>Usuarios encontrados:</h2>";
            $view = new ViewUsuario();
            $view->exibeTabelaUsuarios();
            echo "</div>";

        }
		?>
	</div>
</div>
<?php
    //incluindo o JS do BootStrap
    include ('Templates/TemplateBootstrapJS.html');
?>
</body>
</html>