<?php
include_once 'conexao.php';
class livro extends Database{
    public $name;
    private $con;
    public $autor;
    public $genero = [];

    public function __construct(){
		$this->con = new Database();
	}
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }


    public function getAutor() {
        return $this->autor;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }


    public function getGenero() {
        return $this->genero;
    }

    public function setGenero(array $generos) {
        $this->genero = $generos;
    }


    public function cadastrar(){
        $query = "INSERT INTO livro(liv_nome,aut_codigo) VALUES (:nome,:cod)";
        $smt = $this->con->prepare($query);
        $smt->bindParam(':nome',$this->name,PDO::PARAM_STR);
        $smt->bindParam(':cod',$this->autor,PDO::PARAM_INT);
        $resultado = $smt->execute();
        if($resultado){
            $this->cadastrarGeneros();
        }else{
            print 'ERROR';
        }
    }
    public function cadastrarGeneros(){
        $query = "SELECT * FROM livro ORDER BY liv_codigo DESC LIMIT 1";
        $livro = $this->con->getOne($query);
        $number = count($this->genero)-1;
        $i = 0;
        for($x = 0;$x<=$number;$x++){
            $query = "INSERT INTO genero_livro(liv_codigo,gen_codigo) VALUES (:cl,:cg)";
            $smt = $this->con->prepare($query);
            $smt->bindParam(':cl',$livro['liv_codigo'],PDO::PARAM_INT);
            $smt->bindParam(':cg',$this->genero[$x],PDO::PARAM_INT);
            $resultado = $smt->execute();
            if($resultado){
                $i++;
            }
        }
        $smt->closeCursor();
		$this->con->closeConnection();
        if($i == $number+1 ){
            print 'Gravado com sucesso';
        }else{
            print 'ERRO';
        }
    }
    function listarTodos(){
        $query = "SELECT
            livro.liv_codigo AS cod,
            livro.liv_nome AS livro,
            autor.aut_nome AS autor,
            genero.gen_nome AS genero
            FROM livro
            JOIN autor ON livro.aut_codigo = autor.aut_codigo
            JOIN genero_livro ON livro.liv_codigo = genero_livro.liv_codigo
            JOIN genero ON genero_livro.gen_codigo = genero.gen_codigo";
        $smt = $this->con->getAll($query);
        return $smt;
    }
}