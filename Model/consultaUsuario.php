<?php
	//Classe da model para fazer consultas na tabela usuario do banco de dados
	class ConsultarUser{

		public function __construct()
		{
		
		}
		//funcao para retornar todos os usuarios presente na tabela usuario do banco de dados
		public function listarUsuarios(){
			//inclui e cria a conexao com o banco
			include_once('conexaoBD.php');
			$conn = new Conexao();
			//query para executar no banco
			$sql = "SELECT idUsuario,usuario,nomeUsuario,sobrenomeUsuario,emailUsuario,cpfUsuario,cepUsuario FROM usuario";
			//executa a query e armazena o resultado da query na variavel $resultado
			$resultado = $conn->query($sql);
			//fecha a conexao para não consumir recursos(ram, rede) de forma desnecessaria
			$conn->close();
			if ($resultado->num_rows>0){
					//pega uma linha e salva no array até acabar os resultados
					while ($row = $resultado->fetch_assoc()) {
					
						echo "<tr>";
						echo "<td>".$row['usuario']."</td>";
						echo "<td>".$row['nomeUsuario']."</td>";
						echo "<td>".$row['sobrenomeUsuario']."</td>";
						echo "<td>".$row['emailUsuario']."</td>";
						echo "<td>".$row['cpfUsuario']."</td>";
						echo "<td>".$row['cepUsuario']."</td>";
						echo "<td><form method='post' action='Usuarios.php?acao=enviar&id=".$row['idUsuario']."'><button type='submit' name='btn_atualizar' id='btn_atualizar' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span></button></form><form method='post' action='Usuarios.php?acao=deletar&id=".$row['idUsuario']."'><button type='submit' name='btn_atualizar' id='btn_deletar' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button></form></td></div>";
						
						echo "</tr>";

				
				} 

				}else {
					return "0 resultados";
			
				}
		}

		public function listarPeloNome($nomeUsuario){
			//abrinado a conexao com o banco
			include_once('conexaoBD.php');
			$conn = new Conexao();
			//criando a prepared statement que será executada no banco
			// os "?" serão substituidos no banco pelas variaveis $campo e $valor passadas para a função, respectivamente
			$stmt = $conn->prepare("SELECT * FROM usuario WHERE nomeUsuario LIKE ?");
			//bind_param avisa ao banco o tipo dos valores a serem recebidos(s = string) e suas respectivas variaveis a serem substituidas na query, isso previne as SQL injection
			$stmt->bind_param("s",$nomeUsuario);
			//executa a prepared statement no banco
			$stmt->execute();
			//armazena o resultado  da prepared statement
			$resultado = $stmt->get_result();
			if ($resultado->num_rows>0){
					//pega uma linha e salva no array até acabar os resultados
					while ($row = $resultado->fetch_assoc()) {
					
						echo "<tr>";
						echo "<td>".$row['usuario']."</td>";
						echo "<td>".$row['nomeUsuario']."</td>";
						echo "<td>".$row['sobrenomeUsuario']."</td>";
						echo "<td>".$row['emailUsuario']."</td>";
						echo "<td>".$row['cpfUsuario']."</td>";
						echo "<td>".$row['cepUsuario']."</td>";
						echo "<td><form method='post' action='Usuarios.php?acao=enviar&id=".$row['idUsuario']."'><button type='submit' name='btn_atualizar' id='btn_atualizar' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span></button></form><form method='post' action='Usuarios.php?acao=deletar&id=".$row['idUsuario']."'><button type='submit' name='btn_atualizar' id='btn_deletar' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button></form></td></div>";
						
						echo "</tr>";

				
				} 

				}else {
					return "0 resultados";
			
				}
				$stmt->close();
				$conn->close();
		}
		//funcao para pesquisar o usuario e senha de usuario no banco
		public function pesquisarUsuario($usuario,$senhaUsuario){
			//abrinado a conexao com o banco
			include_once('conexaoBD.php');
			$conn = new Conexao();
			//criando a prepared statement que será executada no banco
			// os "?" serão substituidos no banco pelas variaveis $campo e $valor passadas para a função, respectivamente
			$stmt = $conn->prepare("SELECT usuario,senhaUsuario FROM usuario WHERE usuario = ? AND senhaUsuario = ?");
			//bind_param avisa ao banco o tipo dos valores a serem recebidos(s = string) e suas respectivas variaveis a serem substituidas na query, isso previne as SQL injection
			$stmt->bind_param("ss",$usuario,$senhaUsuario);
			//executa a prepared statement no banco
			$stmt->execute();
			//armazena o resultado  da prepared statement
			$resultado = $stmt->get_result();
				//se o resultado tiver ao menos uma linha, cria um array com o usuario e senha retornados do banco
				//senao, retorna 0 resultaods;
				if ($resultado->num_rows>0){
					//pega uma linha e salva no array até acabar os resultados
					while ($row = $resultado->fetch_assoc()) {
					# code...
					$listaUsuario[] = $row;
					}
					//retorna o array com o usuario e senha encontrados
				return $listaUsuario;
				} else {
					return "0 resultados";

				}	
				//fecha a statement e a conexao
			$stmt->close();
			$conn->close();
		}

		public function pesquisarPelaId($idUsuario){
			//abrinado a conexao com o banco
			include_once('conexaoBD.php');
			$conn = new Conexao();
			//criando a prepared statement que será executada no banco
			// os "?" serão substituidos no banco pelas variaveis $campo e $valor passadas para a função, respectivamente
			$stmt = $conn->prepare("SELECT * FROM usuario WHERE idUsuario = ?");
			//bind_param avisa ao banco o tipo dos valores a serem recebidos(s = string) e suas respectivas variaveis a serem substituidas na query, isso previne as SQL injection
			$stmt->bind_param("i",$idUsuario);
			//executa a prepared statement no banco
			$stmt->execute();
			//armazena o resultado  da prepared statement
			$resultado = $stmt->get_result();
				//se o resultado tiver ao menos uma linha, cria um array com o usuario e senha retornados do banco
				//senao, retorna 0 resultaods;
				if ($resultado->num_rows>0){
					//pega uma linha e salva no array até acabar os resultados
					while ($row = $resultado->fetch_assoc()) {
					# code...
					return $row;
					}
					//retorna o array com o usuario e senha encontrados
				return $listaUsuario;
				} else {
					return "0 resultados";

				}	
				//fecha a statement e a conexao
			$stmt->close();
			$conn->close();
		}
	}



?>