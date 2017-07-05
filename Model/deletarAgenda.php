<?php
class DeletarAgen{

		public function deletarAgenda($idAgenda)
		{
			include_once('conexaoBD.php');
			$conn = new Conexao();

			$stmt = $conn->prepare("DELETE FROM agenda WHERE idAgenda = ?");

			$stmt->bind_param("i",$idAgenda);

			$stmt->execute();

			if ($stmt){
				return "Deletado";
			}else{
				return "Erro ao deletar";
			}

			$stmt->close();
			$conn->close();
		}
	}


?>