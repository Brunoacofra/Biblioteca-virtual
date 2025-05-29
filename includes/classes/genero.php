<?php 
include_once 'conexao.php';
class genero extends Database{
	public $genero;
	private $con;
	public function __construct(){
		$this->con = new Database();
	}
	public function getGenero(){
		return $this->genero;
	}
	public function setGenero($g){
		$this->genero = $g;
	}

	public function cadastro(){
		$query = "INSERT INTO genero (gen_nome) VALUES (:n)";
		$smt = $this->con->prepare($query);
		$smt->bindParam(':n',$this->genero,PDO::PARAM_STR);
		$resultado = $smt->execute();
		$smt->closeCursor();
		$this->con->closeConnection();
		if($resultado){
			return 'Gravado com sucesso';
		}
		return 'Erro';
	}
}