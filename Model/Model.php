<?php
//Camada Model responsavel pelo acesso ao banco e regras de negocio
class Model{
	//funcao que quando chamada valida os dados do usuario 
	public function validarUser($usuario, $senhaUsuario){


		//include do arquivo para chamar a classe

		include_once('consultaUsuario.php');
		//cria um objeto da classe consulta
		$consulta = new ConsultarUser();
		//executa a funcao de pesquisar usuario e senha e armazena o resultado
		$resultado = $consulta->pesquisarUsuario($usuario,$senhaUsuario);
		// se houver um array como resultado, compara os dados do banco com os dados recebidos

		if(is_array($resultado)){
			//Se o usuario e a senha recebidas forem iguais aos do banco, retorna que o login foi efetuado
			//senao, o usuario e senha estao incorretos pois nao foram achados no banco
			if($resultado[0]['usuario'] == $usuario){
				if($resultado[0]['senhaUsuario'] ==  $senhaUsuario){
					
					return "Login efetuado com sucesso";
				}else{
					
					
				}
			}
		}else{
			return "Usuario ou senha incorreto";
		}
	}
	//funcao para validar o tipo e formtar
	public function validarTipo($tipoAgendamento){
		if($tipoAgendamento == "marcacao"){
    		return "Marcação";
    	}else{
    		return "Remarcação";
    	}	
	}
}
?>