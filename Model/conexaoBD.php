<?php



//classe de conexao com o banco de dados

class Conexao{

	//declaração das variáveis usadas para a conexão
private $conn;
private $host;
private $user;
private $password;
private $dbname;
private $port;

	//construtor da classe usado para construir a conexão com o banco de dados
	//quando a classe for instanciada, a funcao construtor sera chamada imediatamente, crianco, iniciando e checkando a conexao com o banco
public function __construct(){
	//definddo as credenciais da conexão
$this->conn;
$this->host = "localhost";
$this->user = "root";
$this->password = "";
$this->dbname = "projphp";
$this->port = 3306;

	//criando a conexão com o banco de dados
	$this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname, $this->port);
	//checkando a conexão
	if($this->conn->connect_error){
		die("Conexao falhou1".$conn->connect_error);
	}
	
	
}
//função para executar as querys sql
public function query($sql)
        {
        return $this->conn->query($sql);
        }
//funcao para fechar a conexão com o servidor
public function close(){
	return $this->conn->close();
}
//funcao para preparar statements
public function prepare($string){
	return $this->conn->prepare($string);
}

}
?>