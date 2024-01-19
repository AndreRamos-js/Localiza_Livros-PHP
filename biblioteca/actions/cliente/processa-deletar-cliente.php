<?php
require_once '../../../config/database.php';
require_once '../../controllers/ClienteController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $clienteController = new ClienteController($db->getConnection());

    // Verifica se o ID do cliente foi enviado
    if (isset($_POST['id_cliente'])) {
        $idCliente = $_POST['id_cliente'];
    
        try {
            // Código para excluir o cliente do banco de dados
            $clienteController->delete($idCliente);
                header("Location: ../../../public/admin/cliente/visualizar-clientes.php");
                exit();
        } catch (PDOException $e) {
            // Verificar se a exceção é devido a uma restrição de chave estrangeira
            if ($e->getCode() == 23000 && $e->errorInfo[1] == 1451) {
                // Mensagem de erro amigável para o usuário
                echo "Não é possível excluir este cliente, pois existem locações associadas a ele.";
            } else {
                // Outros erros que podem ocorrer durante a exclusão
                echo "Erro ao excluir o cliente: " . $e->getMessage();
            }
        }
    }
}
