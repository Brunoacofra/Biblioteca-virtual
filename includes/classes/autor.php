<?php
include_once 'conexao.php';
class autor extends Database{
	public $name;
	private $con;

	public function __construct(){
		$this->con = new Database();
	}
	public function getNome(){
		return $this->name;
	}
	public function setNome($n){
		$this->name = $n;
	}
	public function cadastro(){
		$query = "INSERT INTO autor(aut_nome) VALUES(:nome)";
		$resultado = $this->con->prepare($query);
		$resultado->bindParam(':nome',$this->name,PDO::PARAM_STR);
		$retorno = $resultado->execute();
		$resultado->closeCursor();
		$this->con->closeConnection();
		if($retorno){
			return 'Gravado com sucesso';
		}
		return 'ERRO';
	}
	public function listarTodos(){
		$query = "SELECT * FROM autor ORDER BY aut_nome ASC";
		$resultado = $this->con->prepare($query);
		$resultado->execute();
		$result = $resultado->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
}