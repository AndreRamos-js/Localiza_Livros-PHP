<?php
require_once '../../../config/database.php';
require_once '../../controllers/ClienteController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $clienteController = new ClienteController($db->getConnection());

    // Verifica se todos os campos obrigatórios foram preenchidos
    if (isset($_POST["id_cliente"], $_POST["nome_completo"], $_POST["email"], $_POST["numero_celular"], $_POST["endereco"])) {
        $idCliente = $_POST["id_cliente"];
        $nomeCompleto = $_POST["nome_completo"];
        $email = $_POST["email"];
        $numeroCelular = $_POST["numero_celular"];
        $endereco = $_POST["endereco"];

        if ($clienteController->update($idCliente, $nomeCompleto, $email, $numeroCelular, $endereco)) {
            header("Location: ../../../public/admin/cliente/visualizar-clientes.php");
            exit();
        } else {
            // Lógica para tratamento de erro
            echo "Erro ao editar o cliente.";
        }
    } else {
        // Lógica para tratamento de erro se algum campo estiver faltando
        echo "Todos os campos são obrigatórios.";
    }
}
?>
