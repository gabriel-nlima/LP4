<?php
//classe responsavel pela insercao de dados de usuario no banco de dados (Model)
	class InserirUser{
		//funcao contrustora da classe (vazio)
		public function __construct()
		{
		
		}
		// funcao para inserir um usuario na tabela usuario do banco, passando como parametro (ou argumento) os dados do usuario a ser inserido, como nome, cpf etc
		public function insereUsuario($usuario, $nomeUsuario,$sobrenomeUsuario,$cpfUsuario, $emailUsuario, $cepUsuario,$rua,$bairro,$cidade,$uf,$senhaUsuario){
			//inclui a conexao com o banco de dados
			include_once('conexaoBD.php');
			//cria um objeto da classe conexao e realiza a conexao com o banco
			$conn = new Conexao();
			//cria a query sql usando prepared statements (que previne sql Injection)
			//statement que armazena a query preparada
			//funcao "prepare" prepara a query statement para ser executada no banco (mas não executa)
			$stmt = $conn->prepare("INSERT INTO usuario(usuario, nomeUsuario, sobrenomeUsuario, cpfUsuario, emailUsuario, cepUsuario, rua, bairro, cidade, uf, senhaUsuario) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			//bind param avisa ao banco quais valores vai receber (s = string) e substitui as ? na stmt pelos parametros recebidos pela função 
			$stmt->bind_param("sssssssssss",$usuario, $nomeUsuario, $sobrenomeUsuario,$cpfUsuario,$emailUsuario,$cepUsuario,$rua,$bairro,$cidade,$uf,$senhaUsuario);
			//executa a prepared statement no banco
			$stmt->execute();
			// se o resultado retornado for true, então o usuario foi inserido com sucesso, senão, entao falhou
			if ($stmt){
				$resultado = "Registrado com sucesso";

			}else{
				$resultado = "Falha ao registrar";
			}
			//retorna o resultado
			return $resultado;
			//fecha a prepared statement e a conexao
			$stmt->close();
			$conn->close();

		}






	}



?>