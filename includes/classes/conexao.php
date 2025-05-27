<?php
class Database {
    private $host = "localhost:3300";
    private $dbname = "biblioteca";
    private $username = "root";
    private $password = "";
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }
    }
    public function prepare($query) {
        $stmt = $this->conn->prepare($query);
        return $stmt;
    }
    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn = null;
    }
    public function getOne($query){
      $a = $this->conn->prepare($query);
      $a->execute();

      $resultado = $a->fetch(PDO::FETCH_ASSOC);
      return $resultado;
    }
    public function getAll($query){
      $a = $this->conn->prepare($query);
      $a->execute();

      $resultado = $a->fetchAll(PDO::FETCH_ASSOC);
      return $resultado;
    }
}
$database = new Database();
$conn = $database->getConnection();
?>
