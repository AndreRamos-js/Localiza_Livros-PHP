<?php
require_once '../../../config/database.php';
require_once '../../controllers/LocacaoController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $locacaoController = new LocacaoController($db->getConnection());

    // Verifica se o ID da locação foi enviado
    if (isset($_POST["id_locacao"])) {
        $locacaoId = $_POST["id_locacao"];

        if ($locacaoController->delete($locacaoId)) {
            header("Location: ../../../public/admin/locacao/visualizar-locacoes.php");
            exit();
        } else {
            // Lógica para tratamento de erro
            echo "Erro ao deletar a locação.";
        }
    } else {
        // Lógica para tratamento de erro se o ID da locação estiver faltando
        echo "ID da locação não fornecido.";
    }
}
?>
