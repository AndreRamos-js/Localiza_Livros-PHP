<?php

class Locacao {
    private $id;
    private $idCliente;
    private $idLivro;
    private $nomeCliente;
    private $tituloLivroAlugado;
    private $dataLocacao;
    private $status;
    private $dataDevolucao;

    public function __construct($idCliente, $idLivro, $nomeCliente, $tituloLivroAlugado, $dataLocacao, $status, $dataDevolucao) {
        $this->idCliente = $idCliente;
        $this->idLivro = $idLivro;
        $this->nomeCliente = $nomeCliente;
        $this->tituloLivroAlugado = $tituloLivroAlugado;
        $this->dataLocacao = $dataLocacao;
        $this->status = $status;
        $this->dataDevolucao = $dataDevolucao;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function getIdLivro() {
        return $this->idLivro;
    }

    public function getnomeCliente() {
        return $this->nomeCliente;
    }

    public function getTituloLivroAlugado() {
        return $this->tituloLivroAlugado;
    }

    public function getDataLocacao() {
        return $this->dataLocacao;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getDataDevolucao() {
        return $this->dataDevolucao;
    }
}

?>
