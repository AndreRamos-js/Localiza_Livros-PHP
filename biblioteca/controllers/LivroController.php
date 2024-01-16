<?php

require_once __DIR__ . '/../models/Livro.php';

class LivroController {
    private $db;
    private $table = 'livro';

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($livro) {
        $query = "INSERT INTO " . $this->table . " (titulo, autor, quantidade_disponivel) VALUES (:titulo, :autor, :quantidade)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':titulo', $livro->getTitulo());
        $stmt->bindParam(':autor', $livro->getAutor());
        $stmt->bindParam(':quantidade', $livro->getQuantidadeDisponivel());

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $livro) {
        // Certifica-se de que não é possível alterar o ID
        unset($livro['id']);

        $query = "UPDATE " . $this->table . " SET titulo = :titulo, autor = :autor, quantidade_disponivel = :quantidade WHERE id = :id";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':titulo', $livro['titulo']);
        $stmt->bindParam(':autor', $livro['autor']);
        $stmt->bindParam(':quantidade', $livro['quantidade_disponivel']);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

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
