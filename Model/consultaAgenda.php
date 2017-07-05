<?php
	class ConsultarAgenda{
		public function listarAgenda(){
			include_once('conexaoBD.php');
			$conn = new Conexao();

			$sql = "SELECT idAgenda,nomeAgendamento,dataAgendamento,horaAgendamento,nomeMedico,tipoAgendamento,descricaoAgendamento FROM agenda";

			$resultado = $conn->query($sql);

			$conn->close();

			if ($resultado->num_rows>0){
					//pega uma linha e salva no array até acabar os resultados
					while ($row = $resultado->fetch_assoc()) {
					
						echo "<tr>";
						echo "<td>".$row['nomeAgendamento']."</td>";
						echo "<td>".$row['dataAgendamento']."</td>";
						echo "<td>".$row['horaAgendamento']."</td>";
						echo "<td>".$row['nomeMedico']."</td>";
						echo "<td>".$row['tipoAgendamento']."</td>";
						echo "<td><form method='post' action='visualizar.php?acao=enviar&id=".$row['idAgenda']."'><button type='submit' name='btn_atualizar' id='btn_atualizar' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span></button></form><form method='post' action='visualizar.php?acao=deletar&id=".$row['idAgenda']."'><button type='submit' name='btn_atualizar' id='btn_deletar' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button></form></td></div>";
						echo "</tr>";
				
				} 
				}else {
					return "0 resultados";
				}
			}

			public function listarRelatorioAgen(){
			include_once('conexaoBD.php');
			$conn = new Conexao();

			$sql = "SELECT idAgenda,nomeAgendamento,dataAgendamento,horaAgendamento,nomeMedico,tipoAgendamento,descricaoAgendamento FROM agenda";

			$resultado = $conn->query($sql);

			$conn->close();

			if ($resultado->num_rows>0){
					//pega uma linha e salva no array até acabar os resultados
					while ($row = $resultado->fetch_assoc()) {
					
						echo "<tr>";
						echo "<td width='20%'>".$row['nomeAgendamento']."</td>";
						echo "<td width='20%'>".$row['dataAgendamento']."</td>";
						echo "<td width='20%'>".$row['horaAgendamento']."</td>";
						echo "<td width='20%'>".$row['nomeMedico']."</td>";
						echo "<td width='20%'>".$row['tipoAgendamento']."</td>";
						echo "</tr>";
				} 

				}else {
					return "0 resultados";
				}
			}

			public function pesquisarAgendapeloNome($nomeAgendamento){

				include_once('conexaoBD.php');
				$conn = new Conexao();

				$stmt = $conn->prepare("SELECT * FROM agenda WHERE nomeAgendamento LIKE ?");
				$stmt->bind_param('s',$nomeAgendamento);

				$stmt->execute();

				$resultado = $stmt->get_result();
				if ($resultado->num_rows>0){
					//pega uma linha e salva no array até acabar os resultados
					while ($row = $resultado->fetch_assoc()) {					
						echo "<tr>";
						echo "<td>".$row['nomeAgendamento']."</td>";
						echo "<td>".$row['dataAgendamento']."</td>";
						echo "<td>".$row['horaAgendamento']."</td>";
						echo "<td>".$row['nomeMedico']."</td>";
						echo "<td>".$row['tipoAgendamento']."</td>";
						echo "<td><form method='post' action='visualizar.php?acao=enviar&id=".$row['idAgenda']."'><button type='submit' name='btn_atualizar' id='btn_atualizar' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span></button></form><form method='post' action='visualizar.php?acao=deletar&id=".$row['idAgenda']."'><button type='submit' name='btn_atualizar' id='btn_deletar' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button></form></td></div>";
						echo "</tr>";
				} 
				}else {
					return "0 resultados";
				}
			}
			public function pesquisarPelaId($idAgenda){
			//abrinado a conexao com o banco
			include_once('conexaoBD.php');
			$conn = new Conexao();
			//criando a prepared statement que será executada no banco
			// os "?" serão substituidos no banco pelas variaveis $campo e $valor passadas para a função, respectivamente
			$stmt = $conn->prepare("SELECT * FROM agenda WHERE idAgenda = ?");
			//bind_param avisa ao banco o tipo dos valores a serem recebidos(s = string) e suas respectivas variaveis a serem substituidas na query, isso previne as SQL injection
			$stmt->bind_param("i", $idAgenda);
			//executa a prepared statement no banco
			$stmt->execute();
			//armazena o resultado  da prepared statement
			$resultado = $stmt->get_result();
				//se o resultado tiver ao menos uma linha, cria um array com o usuario e senha retornados do banco
				//senao, retorna 0 resultaods;
				if ($resultado->num_rows>0){
					//pega uma linha e salva no array até acabar os resultados
					while ($row = $resultado->fetch_assoc()) {
					return $row;
					}
					//retorna o array com o usuario e senha encontrados
				return $listarAgenda;
				} else {
					return "0 resultados";
				}	
				//fecha a statement e a conexao
			$stmt->close();
			$conn->close();
		}
		}
?>