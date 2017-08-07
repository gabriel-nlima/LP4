<?php
	//classe de controller, faz a intermediacao entre a camada View e Model
	class ControllerAgenda{

		public function Agendar(){
			//recebe os dados via metodo post e armazena em variaveis locais
			$nomeAgendamento = $_POST['nome'];
			$descricaoAgendamento = $_POST['descricao'];
			$dataAgendamento = $_POST['dataagendamento'];
			$nomeMedico = $_POST['nomemedico'];
			$horaAgendamento = $_POST['horario'];
			$tipoAgendamento = $_POST['marcacao'];

			//inclui a model 
			include_once ('../Model/Model.php');
			//novo objeto da classe model
			$validar = new Model();
			//chama o metodo para validar a o tipo de agendamento
			$tipoAgendamentoFormatado = $validar->validarTipo($tipoAgendamento);
			//inclui a model responsavel pela inserção da agenda no banco
			include_once('../Model/insereAgenda.php');
			//novo objeto da classe InserirAgenda
			$inserir = new InserirAgenda();
			//chama o metodo que insere a agenda no banco e armazena o resultado dentro de uma variavel
			//passa os dados digitados pelo usuario para o metodo
			$resultado = $inserir->insereAgenda($nomeAgendamento,$dataAgendamento,$horaAgendamento,$nomeMedico,$tipoAgendamentoFormatado,$descricaoAgendamento);
			//inclui a view
			include_once('../View/ViewAgenda.php');
			//novo objeto da classe view
			$view = new ViewAgenda();
			//passa o resultado da inserção para ser exibido pela view
			$view->Agendar($resultado);

		}

		public function listarAgenda(){
			include_once('../Model/consultaAgenda.php'); //Aqui
			$consulta = new ConsultarAgenda();
			$consulta->listarAgenda();
		}

		public function listarRelatorio(){
			include_once('../Model/consultaAgenda.php');
			$consulta = new ConsultarAgenda();
			$consulta->listarRelatorioAgen();
		}

		public function listarAgendaPeloNome(){
			$nome = $_POST['nome'];
			$nomeAgendamento = "%".$nome."%";
			include_once('../Model/consultaAgenda.php');
			$consulta = new ConsultarAgenda();
			$consulta->pesquisarAgendapeloNome($nomeAgendamento);
		}

		public function enviarDadosAgenda(){
			$idAgenda = $_GET['id'];
			include_once ('../Model/consultaAgenda.php');

			$consultar = new ConsultarAgenda();
			$resultado = $consultar->pesquisarPelaId($idAgenda);
			$nomeAgendamento = $resultado['nomeAgendamento'];
			$dataAgendamento = $resultado['dataAgendamento'];
			$horaAgendamento = $resultado['horaAgendamento'];
			$nomeMedico = $resultado['nomeMedico'];
			$tipoAgendamento = $resultado['tipoAgendamento'];
			$descricaoAgendamento = $resultado['descricaoAgendamento'];

			include_once ('../Model/Model.php');
			//novo objeto da classe model
			$validar = new Model();
			//chama o metodo para validar a o tipo de agendamento
			$tipoAgendamentoFormatado = $validar->validarTipo($tipoAgendamento);

			include_once('../View/ViewAgenda.php');
			$view = new ViewAgenda();
			$view->recebeDadosAgenda($idAgenda,$nomeAgendamento,$dataAgendamento,$horaAgendamento,$nomeMedico,$tipoAgendamentoFormatado,$descricaoAgendamento);
			
		}

		public function atualizarDadosAgenda(){
			$idAgenda = $_GET['id'];
			$nomeAgendamento = $_POST['nome'];
			$dataAgendamento = $_POST['dataagendamento'];
			$horaAgendamento = $_POST['horario'];
			$nomeMedico = $_POST['nomemedico'];
			$tipoAgendamento = $_POST['marcacao'];
			$descricaoAgendamento = $_POST['descricao'];

			include_once ('../Model/Model.php');
			//novo objeto da classe model
			$validar = new Model();
			//chama o metodo para validar a o tipo de agendamento
			$tipoAgendamentoFormatado = $validar->validarTipo($tipoAgendamento);

			include_once('../Model/atualizarAgenda.php');
			$atualizar = new AtualizarAgen();
			$atualizar->atualizarAgenda($nomeAgendamento,$dataAgendamento,$horaAgendamento,$nomeMedico,$tipoAgendamentoFormatado,$descricaoAgendamento, $idAgenda);

			include_once ('../View/ViewAgenda.php');
			$view = new ViewAgenda();
			$view->exibeTabelaAgenda();
			
		}

		function deletarAgenda(){
			$idAgenda = $_GET['id'];

			include_once ('../Model/deletarAgenda.php');
			$deletar = new DeletarAgen();
			$resultado = $deletar->deletarAgenda($idAgenda);

			include_once ('../View/ViewAgenda.php');
			$view = new ViewAgenda();
			$view->DeletarAgenda($resultado);

			$view = new ViewAgenda();
			$view->exibeTabelaAgenda();
		}

	}


?>