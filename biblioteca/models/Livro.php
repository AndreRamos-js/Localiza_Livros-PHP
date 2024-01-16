<?php

class Livro {
    private $id;
    private $titulo;
    private $autor;
    private $quantidadeDisponivel;

    public function __construct($titulo, $autor, $quantidadeDisponivel) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->quantidadeDisponivel = $quantidadeDisponivel;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getQuantidadeDisponivel() {
        return $this->quantidadeDisponivel;
    }

    // Outros métodos se necessário...
}

?>
