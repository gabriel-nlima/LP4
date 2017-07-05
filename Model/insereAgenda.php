<?php
//classe para inserir dados da agenda no banco
	class InserirAgenda{
		//metodo que insere uma nova agenda no banco
		public function insereAgenda($nomeAgendamento,$dataAgendamento,$horaAgendamento,$nomeMedico,$tipoAgendamento,$descricaoAgendamento){
			include_once('conexaoBD.php');
			$conn = new Conexao();

			$stmt = $conn->prepare("INSERT INTO agenda (nomeAgendamento,dataAgendamento,horaAgendamento,nomeMedico,tipoAgendamento,descricaoAgendamento) VALUES (?,?,?,?,?,?)");

			$stmt->bind_param("ssssss",$nomeAgendamento,$dataAgendamento,$horaAgendamento,$nomeMedico,$tipoAgendamento,$descricaoAgendamento);

			$stmt->execute();

			if($stmt){
				return "Registrado com sucesso";
			}else{
				return "Falha ao registrar";
			}

			$stmt->close();
			$conn->close();
		}
	}


?>