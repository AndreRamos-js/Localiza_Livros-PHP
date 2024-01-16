<?php
ob_start(); // Ativa o buffering de saída

require_once '../../../config/database.php';
require_once '../../controllers/ClienteController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $clienteController = new ClienteController($db->getConnection());

    // Verifica se todos os campos obrigatórios foram preenchidos
    if (isset($_POST["nome_completo"], $_POST["email"], $_POST["numero_celular"], $_POST["endereco"])) {
        $nomeCompleto = $_POST["nome_completo"];
        $email = $_POST["email"];
        $numeroCelular = $_POST["numero_celular"];
        $endereco = $_POST["endereco"];

        if ($clienteController->create($nomeCompleto, $email, $numeroCelular, $endereco)) {
            header("Location: ../../../public/admin/cliente/visualizar-clientes.php");
            exit();
        } else {
            // Lógica para tratamento de erro
            echo "Erro ao cadastrar o cliente.";
        }
    } else {
        // Lógica para tratamento de erro se algum campo estiver faltando
        echo "Todos os campos são obrigatórios.";
    }
}

ob_end_flush(); // Descarrega o buffer de saída
?>
