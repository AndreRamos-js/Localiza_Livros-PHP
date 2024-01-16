<?php

require_once '../config/database.php';
require_once '../biblioteca/controllers/ClienteController.php';
require_once '../biblioteca/controllers/LivroController.php';
require_once '../biblioteca/controllers/LocacaoController.php';

$db = new Database();
$conn = $db->getConnection();

// Cria instâncias dos controladores
$clienteController = new ClienteController($conn);
$livroController = new LivroController($conn);
$locacaoController = new LocacaoController($conn);

/*
// Exemplo de cadastro de cliente
$cliente = new Cliente("Fulano Silva", "fulano@gmail.com", "123456789", "Rua A, 123");
$clienteController->create($cliente);

// Exemplo de cadastro de livro
$livroController = new LivroController($conn);
$livro = new Livro("PHP para Iniciantes", "Autor A", 10);
$livroController->create($livro);

// Exemplo de cadastro de locação
$locacaoController = new LocacaoController($conn);
$locacao = new Locacao(1, 1, "Fulano Silva", "PHP para Iniciantes", date("Y-m-d"), "Retirado", null);
$locacaoController->create($locacao);
*/

// Exemplo de listagem de dados
$clientes = $clienteController->getAll();
$livros = $livroController->getAll();
$locacoes = $locacaoController->getAll();

/*
// Exemplo de edição de cliente
$clienteController = new ClienteController($conn);
$novosDadosCliente = [
    'nome_completo' => 'Novo Nome',
    'email' => 'novo@email.com',
    'numero_celular' => '987654321',
    'endereco' => 'Nova Rua, 456'
];
$clienteController->update(242, $novosDadosCliente); // 1 é o ID do cliente a ser editado

// Exemplo de edição de livro
$livroController = new LivroController($conn);
$novosDadosLivro = [
    'titulo' => 'Novo Título',
    'autor' => 'Novo Autor',
    'quantidade_disponivel' => 5
];
$livroController->update(25, $novosDadosLivro); // 1 é o ID do livro a ser editado


// Exemplo de edição de locação
$locacaoController = new LocacaoController($conn);
$novosDadosLocacao = [
    'nome_cliente' => 'Cliente123',
    'data_locacao' => '2024-01-20',
    'status' => 'Devolvido',
    'data_devolucao' => '2024-01-25'
];
$locacaoController->update(21, $novosDadosLocacao); // 1 é o ID da locação a ser editada
*/

/*
// Exemplo de exclusão de cliente
$clienteController = new ClienteController($conn);
$clienteController->delete(243); // 1 é o ID do cliente a ser excluído

// Exemplo de exclusão de livro
$livroController = new LivroController($conn);
$livroController->delete(26); // 1 é o ID do livro a ser excluído

// Exemplo de exclusão de locação
$locacaoController = new LocacaoController($conn);
$locacaoController->delete(22); // 1 é o ID da locação a ser excluída
*/

// Carregar as views
include '../biblioteca/views/cliente-lista.php';
include '../biblioteca/views/livro-lista.php';
include '../biblioteca/views/locacao-lista.php';

?>
