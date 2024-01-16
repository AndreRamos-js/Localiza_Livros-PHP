<?php
require_once '../../../config/database.php';
require_once '../../controllers/ClienteController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $clienteController = new ClienteController($db->getConnection());

    // Verifica se o ID do cliente foi enviado
    if (isset($_POST["id_cliente"])) {
        $idCliente = $_POST["id_cliente"];

        if ($clienteController->delete($idCliente)) {
            header("Location: ../../../public/admin/cliente/visualizar-clientes.php");
            exit();
        } else {
            // Lógica para tratamento de erro
            echo "Erro ao deletar o cliente.";
        }
    } else {
        // Lógica para tratamento de erro se o ID do cliente estiver faltando
        echo "ID do cliente não fornecido.";
    }
}
?>
