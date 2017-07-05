<?php
	//classe de controller, faz a intermediacao entre a camada View e Model
	class ControllerUsuario{
		//funcao para cadastrar um novo usuario e logar
		public function RegistraController(){
			//captura os dados digitados no formulario via POST
			$usuario = $_POST['usuario'];
			$nomeUsuario = $_POST['nome'];
			$sobrenomeUsuario = $_POST['sobrenome'];
			$cpfUsuario = $_POST['cpf'];
			$emailUsuario = $_POST['email'];
			$cepUsuario = $_POST['cep'];
			$rua = $_POST['rua'];
			$bairro = $_POST['bairro'];
			$cidade = $_POST['cidade'];
			$uf = $_POST['uf'];
			$senhaUsuario = md5($_POST['senha']);
			//chama a a classe de insercao de usuario da model
			include_once('Model/insereUsuario.php');
			//cria um objeto da classe inserir
			$usuarioModel = new InserirUser();
			//chama a funcao de inserir usuario  da model
			//armazena o resultado 
			$resultado = $usuarioModel->insereUsuario($usuario, $nomeUsuario,$sobrenomeUsuario,$cpfUsuario, $emailUsuario, $cepUsuario,$rua,$bairro,$cidade,$uf,$senhaUsuario);
			
			//envia o resultado obtido na model para ser exibido na view
			//chama a view e passa o resultado da model
			include_once('View/ViewUsuario.php');
			//objeto da classe view
			$view = new ViewUsuario();
			//funcao da view responsavel por exibir o resultado
			$view->registrar($resultado);

		}

		//funcao responsavel pelo login
		public function LoginController(){

			//captura os dados digitados pelo usuario no formulario e armazena
			$usuario = $_POST['username'];
			$senhaUsuario = md5($_POST['password']);
			//inclui o arquivo da model
			include_once('Model/Model.php');
			//cria um objeto da classe Model
			$model = new Model();
			//chama a funcao que valida os dados passados pelo usuario

			$validado = $model->validarUser($usuario, $senhaUsuario);
			//chama a view responsavel por exibir o resultado da model
			//passa para a view o resultado da model para ser exibido
			include_once('View/ViewUsuario.php');
			$view = new ViewUsuario();
			//chama a funcao da view e passa o resultado da model para ser exibido.
			$view->Login($validado);
		}

		public function listarUsuarios(){
			include_once('../Model/consultaUsuario.php');
			$consulta = new ConsultarUser();
			$consulta->listarUsuarios();
		}

		public function listarUsuariosPeloNome(){
			$nome = $_POST['nome'];
			$nomeUsuario = "%".$nome."%";
			include_once('../Model/consultaUsuario.php');
			$consulta = new ConsultarUser();
			$consulta->listarPeloNome($nomeUsuario);
		}

		public function enviarDadosUsuario(){
			$idUsuario = $_GET['id'];
			include_once ('../Model/consultaUsuario.php');

			$consultar = new ConsultarUser();
			$resultado = $consultar->pesquisarPelaId($idUsuario);
			$usuario = $resultado['usuario'];
			$nomeUsuario = $resultado['nomeUsuario'];
			$sobrenomeUsuario = $resultado['sobrenomeUsuario'];
			$cpfUsuario = $resultado['cpfUsuario'];
			$emailUsuario = $resultado['emailUsuario'];
			$cepUsuario = $resultado['cepUsuario'];
			$rua = $resultado['rua'];
			$bairro = $resultado['bairro'];
			$cidade = $resultado['cidade'];
			$uf = $resultado['uf'];


			include_once('../View/ViewUsuario.php');
			$view = new ViewUsuario();
			$view->recebeDadosUser($idUsuario, $usuario, $nomeUsuario,$sobrenomeUsuario,$cpfUsuario,$emailUsuario,$cepUsuario,$bairro,$rua,$cidade,$uf);
			
		}

		public function atualizarDadosUsuario(){
			$idUsuario = $_GET['id'];
			$usuario = $_POST['usuario'];
			$nomeUsuario = $_POST['nome'];
			$sobrenomeUsuario = $_POST['sobrenome'];
			$cpfUsuario = $_POST['cpf'];
			$emailUsuario = $_POST['email'];
			$cepUsuario = $_POST['cep'];
			$rua = $_POST['rua'];
			$bairro = $_POST['bairro'];
			$cidade = $_POST['cidade'];
			$uf = $_POST['uf'];
			$senhaUsuario = md5($_POST['senha']);

			include_once('../Model/atualizaUsuario.php');
			$atualizar = new AtualizarUser();
			$resultado = $atualizar->atualizarDados($idUsuario, $usuario, $nomeUsuario,$sobrenomeUsuario,$cpfUsuario,$emailUsuario,$cepUsuario,$bairro,$rua,$cidade,$uf,$senhaUsuario);

			include_once ('../View/ViewUsuario.php');
			$view = new ViewUsuario();
			$view->exibeTabelaUsuarios();
		}

		function deletarUsuario(){
			$idUsuario = $_GET['id'];

			include_once ('../Model/deletaUsuario.php');
			$deletar = new DeletarUser();
			$resultado = $deletar->deletarUsuario($idUsuario);

			include_once ('../View/ViewUsuario.php');
			$view = new ViewUsuario();
			$view->Deletar($resultado);

			$view = new ViewUsuario();
			$view->exibeTabelaUsuarios();
		}
	}

?>