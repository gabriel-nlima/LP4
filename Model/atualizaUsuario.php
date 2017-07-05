<?php
	
//classe para atualizar usuario
	class AtualizarUser{
		
		//funcao para atualizar todos os dados do usuario
		public function atualizarDados($idUsuario, $usuario, $nomeUsuario,$sobrenomeUsuario,$cpfUsuario,$emailUsuario,$cepUsuario,$bairro,$rua,$cidade,$uf,$senhaUsuario){
			//chamando o arquivo de conexao com o banco
			include_once('conexaoBD.php');
			//criando a conexao
			$conn = new Conexao();

			// preparando a statement para executar no banco
			$stmt = $conn->prepare("UPDATE usuario SET usuario = ?, nomeUsuario = ?, sobrenomeUsuario = ?, cpfUsuario = ?, emailUsuario = ?, cepUsuario = ?, bairro = ?, rua = ?, cidade = ?, uf = ?, senhaUsuario = ? WHERE idUsuario = ?");

			//avisando o banco sobre os tipos de valores que vai receber (s = string, i = inteiro) e substituindo as "? " pelas variabeis recebidas
			$stmt->bind_param("sssssssssssi",$usuario, $nomeUsuario,$sobrenomeUsuario,$cpfUsuario,$emailUsuario,$cepUsuario,$bairro,$rua,$cidade,$uf,$senhaUsuario,$idUsuario);

			//executando a prepared statement
			$stmt->execute();

			//checkando se a operacao deu certo
			if($stmt){
				return "Salvo";
			}else{
				return "Falha ao salvar";
			}

			//fechando a statement e a conexao
			$stmt->close();
			$conn->close();
		}

		//funcao para atualizar somente o usuario e a senha
		public function atualizarUserSenha($idUsuario, $usuario, $senhaUsuario){
			include_once('conexaoBD.php');
			$conn = new Conexao();

			$stmt = $conn->prepare("UPDATE usuario SET usuario = ?, senhaUsuario = ? WHERE idUsuario = ?");

			$stmt->bind_param("ssi", $usuario, $senhaUsuario, $idUsuario);

			$stmt->execute();

			if($stmt){
				return "Salvo com sucesso";
			}else{
				return "Falha ao salvar";
			}

			$stmt->close();
			$conn->close();



		}
		
	}


?>