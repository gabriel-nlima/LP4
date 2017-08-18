<?php
	//classe da view responsavel por exibir os dados, informações, telas e outros para o usuario
	class ViewAgenda{
        
        public function Agendar($resultado){

            if($resultado == "Registrado com sucesso"){
                echo "<script type=\"text/javascript\">alert(\"Agendamento cadastrado com sucesso.\");</script>";
                echo "<script>location.href='agendar.php'</script>";
            }else{
                echo "<script type=\"text/javascript\">alert(\"Erro ao cadastrar agendamento\");</script>";
                return "Not ok";
            }
        }

         public function exibeTabelaAgenda(){
            
            echo "<table class='table table-striped table-bordered table-hover table-responsive'>";
            echo "<thead>
                    <tr>
                        <th> Nome </th>
                        <th> Data </th>
                        <th> Hora </th>
                        <th> Medico </th>
                        <th> Tipo </th>
                        <th> Ações </th>
                </thead>
                <tbody>";
    
            include_once ('../Controller/ControllerAgenda.php');
            $controller = new ControllerAgenda();
            $controller->listarAgenda();
    echo "</tbody>";
    echo "</table>";
        }

        public function exibeRelatorioAgenda(){
            
            echo "<table class='table' border='2' width='100%' >";
            echo "<thead>
                    <tr>
                        <th width='20%'> Nome </th>
                        <th width='20%'> Data </th>
                        <th width='20%'> Hora </th>
                        <th width='20%'> Medico </th>
                        <th width='20%'> Tipo </th>
                        
                </thead>
                <tbody>";
            include_once ('../Controller/ControllerAgenda.php');
            $controller = new ControllerAgenda();
            $controller->listarRelatorio();
    echo "</tbody>";
    echo "</table>";
        }

        public function exibeTabelaAgendaPeloNome(){
            
            echo "<table class='table table-striped table-bordered table-hover table-responsive'>";
            echo "<thead>
                    <tr>
                        <th> Nome </th>
                        <th> Data </th>
                        <th> Hora </th>
                        <th> Medico </th>
                        <th> Tipo </th>
                        <th> Ações </th>
                </thead>
                <tbody>";
    
            include_once ('../Controller/ControllerAgenda.php');
            $controller = new ControllerAgenda();
            $controller->listarAgendaPeloNome();
    echo "</tbody>";
    echo "</table>";
        }

        public function recebeDadosAgenda($idAgenda,$nomeAgendamento,$dataAgendamento,$horaAgendamento,$nomeMedico,$tipoAgendamentoFormatado,$descricaoAgendamento){
            echo "<div class='col-xs-4 col-xs-8 col-sm-12 col-md-4 well well-sm col-md-offset-4' style='background-color: white' >
                <!-- Titulo do Formulario de Agendamento -->
                <legend align='center'> <span class='glyphicon glyphicon-calendar' aria-hidden='true'></span>
                    <b> Agendar paciente </b></legend>

                    <!-- Inicio de Formulario de Agendamento -->
                    <form action='visualizar.php?acao=atualizar&id=$idAgenda' method='post' class='form' role='form'>

                    <!-- Campos de nome e sobrenome do paciente -->
                    <div class='row'>
                        <div class='col-sm-12 col-md-12 form-group'>
                            <input class='form-control' name='nome' placeholder='Nome' type='text' value='$nomeAgendamento' />
                        </div>
                        
                    </div>


                    <!-- Campo de texto para descrição -->
                    <input type='text' name='descricao' class='form-control' rows='5' cols='25'
                    placeholder='Descrição do caso do paciente, caso exista alguma informação importante, exemplo: como agravamentos do quadro, alergias, etc.' value='$descricaoAgendamento'></input>

                    <!-- DATA PARA AGENDAMENTO -->
                    <label> Insira uma data para agendamento </label>
                    <div class='row'>
                        <div class='col-xs-6 col-md-6 form-group'>
                                <input type='date' name='dataagendamento' id='dataagendamento' class='form-control' size='10' maxlength='10'
                                       onblur=\"pesquisacep(this.value);\" OnKeyPress=\"formatar('##/##/####', this)\" placeholder='Data de Agendamento' value='$dataAgendamento'>
                        </div>
                    </div>



                    <!-- MEDICO PARA AGENDAMENTO -->
                    <label>Médico para agendamento: </label>
                    <div class'row'>
                        <div class='col-xs-12 col-md-12 form-group'>
                            <select class='form-control' name='nomemedico'>
                                <option value='$nomeMedico' >$nomeMedico</option>
                                <option value='Dr Geraldo' >Dr. Geraldo</option>
                                <option value='Dr Carlos' >Dr. Carlos</option>
                                <option value='Dr Layla' >Dra. Layla</option>
                                <option value='Dr Paula' >Dra. Paula</option>
                            </select>
                        </div>
                    </div>

                    <!-- HORARIO PARA AGENDAMENTO -->
                    <label>Horario para agendamento: </label>
                    <div class='row'>
                         <div class='col-xs-12 col-md-12 form-group'>
                             <select class='form-control' name='horario'>
                                 <option value='$horaAgendamento' >$horaAgendamento</option>
                                 <option value='08:00' >08:00</option>
                                 <option value='08:20' >08:20</option>
                                 <option value='08:40' >08:40</option>
                                 <option value='09:00' >09:00</option>
                                 <option value='09:20' >09:20</option>
                                 <option value='09:40' >09:40</option>
                                 <option value='10:00' >10:00</option>
                                 <option value='10:20' >10:20</option>
                                 <option value='10:40' >10:40</option>
                                 <option value='13:00' >13:00</option>
                                 <option value='13:20' >13:20</option>
                                 <option value='13:40' >13:40</option>
                                 <option value='14:00' >14:00</option>
                                 <option value='14:20' >14:20</option>
                                 <option value='14:40' >14:40</option>
                                 <option value='15:00' >15:00</option>
                                 <option value='15:20' >15:20</option>
                                 <option value='15:40' >15:40</option>
                                 <option value='16:00' >16:00</option>
                                 <option value='16:20' >16:20</option>
                                 <option value='16:40' >16:40</option>
                                 <option value='17:00 >17:00</option>
                             </select>
                         </div>
                    </div>

                    <div class='row'>
                         <div class=' col-xs-6 col-md-12 text-justify form-group'>
                             <input type='radio' name='marcacao' value='marcacao'> Marcação </input>
                             <input type='radio' name='marcacao' value='remarcacao'> Remarcação </input>
                        </div>
                    </div>


                    <button class='form-control btn btn-primary' type='submit'>
                        Agendar Paciente</button>
                </form>
            </div>
        </div>
    </div>";
        }

         public function DeletarAgenda($resultado){

            if($resultado == "Deletado"){
                echo "<script type=\"text/javascript\">alert(\"Agenda Deletada\");</script>";
                echo "<script>location.href='visualizar.php'</script>";
            }else{
                echo "<script type=\"text/javascript\">alert(\"Erro ao deletar agendamento\");</script>";
                return "Not ok";
            }
        }
    }

?>