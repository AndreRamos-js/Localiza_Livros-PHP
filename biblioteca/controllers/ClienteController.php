<?php

require_once __DIR__ . '/../models/Cliente.php';

class ClienteController {
    private $db;
    private $table = 'cliente';

    public function __construct($db) {
        $this->db = $db;
    }

    // Cadastrar o cliente
    public function create($nome, $email, $numero, $endereco) {
        $query = "INSERT INTO " . $this->table . " (nome_completo, email, numero_celular, endereco) VALUES (:nome, :email, :numero, :endereco)";
    
        $stmt = $this->db->prepare($query);
    
        $cliente = new Cliente($nome, $email, $numero, $endereco);
    
        $stmt->bindParam(':nome', $cliente->getNomeCompleto());
        $stmt->bindParam(':email', $cliente->getEmail());
        $stmt->bindParam(':numero', $cliente->getNumeroCelular());
        $stmt->bindParam(':endereco', $cliente->getEndereco());
    
        if ($stmt->execute()) {
            return true;
        }
    
        return false;
    }

    // Visualizar os dados do cliente
    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Editar o cliente
    public function update($id, $nome, $email, $numero, $endereco) {
        $query = "UPDATE " . $this->table . " SET nome_completo = :nome, email = :email, numero_celular = :numero, endereco = :endereco WHERE id = :id";
        $stmt = $this->db->prepare($query);
    
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':endereco', $endereco);
    
        if ($stmt->execute()) {
            return true;
        }
    
        return false;
    }

    // Excluir o cliente
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}

?>
