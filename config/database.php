<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "@07@";
    private $dbname = "biblioteca";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Erro na conexão com o banco de dados: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

?>
