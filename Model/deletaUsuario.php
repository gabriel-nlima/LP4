<?php
	
	class DeletarUser{

		public function deletarUsuario($idUsuario)
		{
			include_once('conexaoBD.php');
			$conn = new Conexao();

			$stmt = $conn->prepare("DELETE FROM usuario WHERE idUsuario = ?");

			$stmt->bind_param("i",$idUsuario);

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