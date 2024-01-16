<?php

require_once __DIR__ . '/../models/Cliente.php';

class ClienteController {
    private $db;
    private $table = 'cliente';

    public function __construct($db) {
        $this->db = $db;
    }

    // Cadastrar o cliente
    public function create($cliente) {
        $query = "INSERT INTO " . $this->table . " (nome_completo, email, numero_celular, endereco) VALUES (:nome, :email, :numero, :endereco)";

        $stmt = $this->db->prepare($query);

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


    // Editar o cliente
    public function update($id, $cliente) {
        // Certifica-se de que não é possível alterar o ID
        unset($cliente['id']);

        $query = "UPDATE " . $this->table . " SET nome_completo = :nome, email = :email, numero_celular = :numero, endereco = :endereco WHERE id = :id";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $cliente['nome_completo']);
        $stmt->bindParam(':email', $cliente['email']);
        $stmt->bindParam(':numero', $cliente['numero_celular']);
        $stmt->bindParam(':endereco', $cliente['endereco']);

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
