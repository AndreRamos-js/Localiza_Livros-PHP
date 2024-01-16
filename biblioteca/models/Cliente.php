<?php

class Cliente {
    private $id;
    private $nomeCompleto;
    private $email;
    private $numeroCelular;
    private $endereco;

    public function __construct($nomeCompleto, $email, $numeroCelular, $endereco) {
        $this->nomeCompleto = $nomeCompleto;
        $this->email = $email;
        $this->numeroCelular = $numeroCelular;
        $this->endereco = $endereco;
    }

    public function getNomeCompleto() {
        return $this->nomeCompleto;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getNumeroCelular() {
        return $this->numeroCelular;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    // Outros métodos se necessário...
}

?>
