<!DOCTYPE html>
<html>
<head>
	<title>Bem Vindo</title>
	<?php
    //importando o CSS do Bootstrap para a pagina.
    include_once ('Templates/TemplateBootstrap.html');
  	?>
    <!-- chamando o arquvio externo que tem todos os JavaScripts da pagina para usar -->
    <script type="text/javascript" src="Templates/TemplateJS.js" ></script>
</head>
<body>
<?php
	include_once ('Templates/TemplateMenu.html');
?>
<div class="container">
	<div class="jumbotron">
		<h1>Bem vindo ao Sistema de Agendamentos online!<small> Projeto de PHP do 5º Semestre de Sistemas de Informação</small></h1>
		<p>Professor: Jânio Eduardo</p>
		<p>Alunos: </p>
		<ol>
			<li>Gabriel Nascimento Lima</li>
			<li>Alexandre França</li>
			<li>Pedro Henrique</li>
		</ol>
		<p>Use a Barra de Navegação acima para utilizar o sistema.</p>
	</div>
</div>
<?php
	//incluindo o JS do BootStrap
    include ('Templates/TemplateBootstrapJS.html');
?>
</body>
</html>