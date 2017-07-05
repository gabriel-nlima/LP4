<!DOCTYPE html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Realizar Agendamento </title>
        <?php
            //importando o CSS do Bootstrap para a pagina.
            include_once ('Templates/TemplateBootstrap.html');
        ?>
    <!-- chamando o arquvio externo que tem todos os JavaScripts da pagina para usar -->
    <script type="text/javascript" src="Templates/TemplateJS.js" ></script>

    <!-- SCRIPT PARA FORMATAÇÃO DE CAMPO -->
    <script>
        function formatar(mascara, documento){
            var i = documento.value.length;
            var saida = mascara.substring(0,1);
            var texto = mascara.substring(i)

            if (texto.substring(0,1) != saida){
                documento.value += texto.substring(0,1);
            }
        }
    </script>
</head>

<body style="background-color: gainsboro">
<!-- Botões na Navbar -->
<!-- Botão Inicio -->
    <?php
        include_once ('Templates/TemplateMenu.html');
    ?>


<div class="container-fluid">
    <header class="row">
        <h1 class="page-header"></h1>
    </header>
</div>
<!-- Inicio do corpo do formulario de agendamento -->
<div class="corpo">
    <!-- Container para conter formulario -->
    <div class="container">
        <div class="row">
            <!-- Divisões das Grids do formulário de agendamento -->
            <div class="col-xs-4 col-xs-8 col-sm-12 col-md-4 well well-sm col-md-offset-4" style="background-color: white" >
                <!-- Titulo do Formulario de Agendamento -->
                <legend align="center"> <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                    <b> Agendar paciente </b></legend>

                    <!-- Inicio de Formulario de Agendamento -->
                    <form action="agendar.php?acao=agendar" method="post" class="form" role="form">

                    <!-- Campos de nome e sobrenome do paciente -->
                    <div class="row">
                        <div class="col-sm-12 col-md-12 form-group">
                            <input class="form-control" name="nome" placeholder="Nome" type="text" required="true" />
                        </div>
                    </div>

                    <!-- Campo de texto para descrição -->
                    <textarea name="descricao" class="form-control" rows="5" cols="25"
                    placeholder="Descrição do caso do paciente, caso exista alguma informação importante, exemplo: como agravamentos do quadro, alergias, etc."></textarea>

                    <!-- DATA PARA AGENDAMENTO -->
                    <label> Insira uma data para agendamento </label>
                    <div class="row">
                        <div class="col-xs-6 col-md-6 form-group">
                                <input type="dataagendamento" name="dataagendamento" id="dataagendamento" class="form-control"  value="" size="10" maxlength="10"
                                       onblur="pesquisacep(this.value);" OnKeyPress="formatar('##/##/####', this)" placeholder="Data de Agendamento" value="">
                        </div>
                    </div>

                    <!-- MEDICO PARA AGENDAMENTO -->
                    <label>Médico para agendamento: </label>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 form-group">
                            <select class="form-control" name="nomemedico" required="true">
                                <option value="0" >Selecione o médico</option>
                                <option value="Dr Geraldo" >Dr. Geraldo</option>
                                <option value="Dr Carlos" >Dr. Carlos</option>
                                <option value="Dr Layla" >Dra. Layla</option>
                                <option value="Dr Paula" >Dra. Paula</option>
                            </select>
                        </div>
                    </div>

                    <!-- HORARIO PARA AGENDAMENTO -->
                    <label>Horario para agendamento: </label>
                    <div class="row">
                         <div class="col-xs-12 col-md-12 form-group">
                             <select class="form-control" name="horario" required="true">
                                 <option value="0" >Selecione o horario</option>
                                 <option value="08:00" >08:00</option>
                                 <option value="08:20" >08:20</option>
                                 <option value="08:40" >08:40</option>
                                 <option value="09:00" >09:00</option>
                                 <option value="09:20" >09:20</option>
                                 <option value="09:40" >09:40</option>
                                 <option value="10:00" >10:00</option>
                                 <option value="10:20" >10:20</option>
                                 <option value="10:40" >10:40</option>
                                 <option value="13:00" >13:00</option>
                                 <option value="13:20" >13:20</option>
                                 <option value="13:40" >13:40</option>
                                 <option value="14:00" >14:00</option>
                                 <option value="14:20" >14:20</option>
                                 <option value="14:40" >14:40</option>
                                 <option value="15:00" >15:00</option>
                                 <option value="15:20" >15:20</option>
                                 <option value="15:40" >15:40</option>
                                 <option value="16:00" >16:00</option>
                                 <option value="16:20" >16:20</option>
                                 <option value="16:40" >16:40</option>
                                 <option value="17:00" >17:00</option>
                             </select>
                         </div>
                    </div>

                    <div class="row">
                         <div class="col-xs-6 col-md-6 form-group col-lg-offset-1">
                             <input type="radio" name="marcacao" value="marcacao"> Marcação </input>
                         </div>
                         <div>
                             <input type="radio" name="marcacao" value="remarcacao"> Remarcação </input>
                        </div>
                    </div>

                    <button class="form-control btn btn-primary" type="submit">
                        Agendar Paciente</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    //pega a ação quando o usuario clica no botao e chama a controller
        if(isset($_GET['acao']) && $_GET['acao'] == 'agendar'){
            include_once '../Controller/ControllerAgenda.php';
            $controller = new ControllerAgenda();
            $controller->Agendar();
        }

    ?>

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