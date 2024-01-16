<?php

require_once __DIR__ . '/../models/Locacao.php';

class LocacaoController {
    private $db;
    private $table = 'locacao';

    public function __construct($db) {
        $this->db = $db;
    }

    // Cadastrar a locação
    public function create($cliente, $livro, $dataLocacao, $status, $dataDevolucao) {
        $query = "INSERT INTO " . $this->table . " (id_cliente, id_livro, data_locacao, status, data_devolucao) VALUES (:cliente, :livro, :dataLocacao, :status, :dataDevolucao)";
    
        $stmt = $this->db->prepare($query);
    
        $stmt->bindParam(':cliente', $cliente);
        $stmt->bindParam(':livro', $livro);
        $stmt->bindParam(':dataLocacao', $dataLocacao);
        $stmt->bindParam(':status', $status);
    
        $dataDevolucao = !empty($dataDevolucao) ? $dataDevolucao : null;
        $stmt->bindParam(':dataDevolucao', $dataDevolucao, PDO::PARAM_STR);
    
        if ($stmt->execute()) {
            return true;
        }
    
        return false;
    }

    // Visualizar os dados da locação
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

    public function getAllClientes() {
        $query = "SELECT id, nome_completo FROM cliente";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllLivros() {
        $query = "SELECT id, titulo FROM livro WHERE quantidade_disponivel > 0";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNomeClienteById($idCliente) {
        $query = "SELECT nome_completo FROM cliente WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $idCliente);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return ($result) ? $result['nome_completo'] : 'Cliente não encontrado';
    }

    public function getTituloLivroById($idLivro) {
        $query = "SELECT titulo FROM livro WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $idLivro);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return ($result) ? $result['titulo'] : 'Livro não encontrado';
    }

    public function getLocacaoById($id) {
        $query = "SELECT * FROM locacao WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    // Editar os dados da locação
    public function update($cliente, $livro, $dataLocacao, $status, $dataDevolucao) {
        $query = "UPDATE " . $this->table . " (id_cliente, id_livro, data_locacao, status, data_devolucao) VALUES (:cliente, :livro, :dataLocacao, :status, :dataDevolucao)";
    
        $stmt = $this->db->prepare($query);
    
        $stmt->bindParam(':cliente', $cliente);
        $stmt->bindParam(':livro', $livro);
        $stmt->bindParam(':dataLocacao', $dataLocacao);
        $stmt->bindParam(':status', $status);
    
        $dataDevolucao = !empty($dataDevolucao) ? $dataDevolucao : null;
        $stmt->bindParam(':dataDevolucao', $dataDevolucao, PDO::PARAM_STR);
    
        if ($stmt->execute()) {
            return true;
        }
    
        return false;
    }

    // Excluir a locação
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
