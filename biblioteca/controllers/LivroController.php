<?php

require_once __DIR__ . '/../models/Livro.php';

class LivroController {
    private $db;
    private $table = 'livro';

    public function __construct($db) {
        $this->db = $db;
    }

    // Cadastrar o livro
    public function create($titulo, $autor, $quantidade) {
        $query = "INSERT INTO " . $this->table . " (titulo, autor, quantidade_disponivel) VALUES (:titulo, :autor, :quantidade)";

        $stmt = $this->db->prepare($query);

        $livro = new Livro($titulo, $autor, $quantidade);


        $stmt->bindParam(':titulo', $livro->getTitulo());
        $stmt->bindParam(':autor', $livro->getAutor());
        $stmt->bindParam(':quantidade', $livro->getQuantidadeDisponivel());

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Visualizar os dados do livro
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

    
    // Editar o livro
    public function update($id, $titulo, $autor, $quantidadeDisponivel) {
        $query = "UPDATE " . $this->table . " SET titulo = :titulo, autor = :autor, quantidade_disponivel = :quantidadeDisponivel WHERE id = :id";
        $stmt = $this->db->prepare($query);
    
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':quantidadeDisponivel', $quantidadeDisponivel);
    
        if ($stmt->execute()) {
            return true;
        }
    
        return false;
    }

    // Excluir o livro
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
