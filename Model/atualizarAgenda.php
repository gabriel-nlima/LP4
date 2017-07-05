<?php

class AtualizarAgen{

	public function atualizarAgenda($nomeAgendamento,$dataAgendamento,$horaAgendamento,$nomeMedico,$tipoAgendamento,$descricaoAgendamento, $idAgenda){
		include_once('conexaoBD.php');
			$conn = new Conexao();

			$stmt = $conn->prepare("UPDATE agenda SET nomeAgendamento = ?, dataAgendamento = ?, horaAgendamento = ?, nomeMedico = ?, tipoAgendamento = ?, descricaoAgendamento = ? WHERE idAgenda = ?");

			$stmt->bind_param("ssssssi",$nomeAgendamento,$dataAgendamento,$horaAgendamento,$nomeMedico,$tipoAgendamento,$descricaoAgendamento, $idAgenda);

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