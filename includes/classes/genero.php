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
		$query = "INSERT INTO genero(gen_nome) VALUES (:n)";
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
	public function listarTodos(){
		$query = "SELECT * FROM genero ORDER BY gen_nome ASC";
		$resu = $this->con->getAll($query);
		return $resu;
	}
	public function excluir($codigo){
		$query ="DELETE FROM genero where gen_codigo = :cod";
		$resultado = $this->con->prepare($query);
		$resultado->bindParam(':cod',$codigo,PDO::PARAM_INT);
		$r = $resultado->execute();
		$resultado->closeCursor();
		$this->con->closeConnection();
		if($r){
			print 'Excluido com sucesso';
		}else{
			print 'Error';
		}
	}
	public function editar($cod){
		$query = 'UPDATE genero SET gen_nome = :nome WHERE gen_codigo = :cod';
		$faz = $this->con->prepare($query);
		$faz->bindParam(':nome',$this->genero,PDO::PARAM_STR);
		$faz->bindParam(':cod',$cod,PDO::PARAM_INT);
		$resultado = $faz->execute();
		$faz->closeCursor();
		$this->con->closeConnection();
		if($resultado){
			print 'Editado com sucesso';
		}else{
			print 'ERROR';
		}
	}
}