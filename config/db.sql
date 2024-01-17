-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS biblioteca;

-- Seleciona o banco de dados
USE biblioteca;

-- Criação da tabela Cliente
CREATE TABLE IF NOT EXISTS cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    numero_celular VARCHAR(15) NOT NULL,
    endereco VARCHAR(255) NOT NULL
);

-- Criação da tabela Livro
CREATE TABLE IF NOT EXISTS livro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    quantidade_disponivel INT NOT NULL
);

-- Criação da tabela Locacao
CREATE TABLE IF NOT EXISTS locacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    id_livro INT,
    data_locacao DATE NOT NULL,
    status ENUM('Retirado', 'Devolvido', 'Atrasado') NOT NULL,
    data_devolucao DATE,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id),
    FOREIGN KEY (id_livro) REFERENCES livro(id)
);
