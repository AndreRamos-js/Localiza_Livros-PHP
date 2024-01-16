<?php

require_once __DIR__ . '/../models/Locacao.php';

class LocacaoController {
    private $db;
    private $table = 'locacao';

    public function __construct($db) {
        $this->db = $db;
    }

    // Cadastrar a locação
    public function create($locacao) {
        $query = "INSERT INTO " . $this->table . " (id_cliente, id_livro, nome_cliente, titulo_livro_alugado, data_locacao, status, data_devolucao) 
                  VALUES (:idCliente, :idLivro, :nomeCliente, :tituloLivro, :dataLocacao, :status, :dataDevolucao)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':idCliente', $locacao->getIdCliente());
        $stmt->bindParam(':idLivro', $locacao->getIdLivro());
        $stmt->bindParam(':nomeCliente', $locacao->getnomeCliente());
        $stmt->bindParam(':tituloLivro', $locacao->getTituloLivroAlugado());
        $stmt->bindParam(':dataLocacao', $locacao->getDataLocacao());
        $stmt->bindParam(':status', $locacao->getStatus());
        $stmt->bindParam(':dataDevolucao', $locacao->getDataDevolucao());

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

    
    // Editar os dados da locação
    public function update($id, $locacao) {
        // Certifica-se de que não é possível alterar os IDs
        unset($locacao['id']);
        unset($locacao['id_cliente']);
        unset($locacao['id_livro']);

        $query = "UPDATE " . $this->table . " SET nome_cliente = :nomeCliente, data_locacao = :dataLocacao, status = :status, data_devolucao = :dataDevolucao WHERE id = :id";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nomeCliente', $locacao['nome_cliente']);
        $stmt->bindParam(':dataLocacao', $locacao['data_locacao']);
        $stmt->bindParam(':status', $locacao['status']);
        $stmt->bindParam(':dataDevolucao', $locacao['data_devolucao']);

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
