<?php
require_once '../../../config/database.php';
require_once '../../controllers/LocacaoController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $locacaoController = new LocacaoController($db->getConnection());

    // Verifica se todos os campos obrigatórios foram preenchidos
    if (isset($_POST["cliente"], $_POST["livro"], $_POST["data_locacao"], $_POST["status"])) {
        $cliente = $_POST["cliente"];
        $livro = $_POST["livro"];
        $dataLocacao = $_POST["data_locacao"];
        $status = $_POST["status"];

        // A data de devolução é opcional
        $dataDevolucao = isset($_POST["data_devolucao"]) ? $_POST["data_devolucao"] : null;

        if ($locacaoController->create($cliente, $livro, $dataLocacao, $status, $dataDevolucao)) {
            header("Location: ../../../public/admin/locacao/visualizar-locacoes.php");
            exit();
        } else {
            // Lógica para tratamento de erro
            echo "Erro ao cadastrar a locação.";
        }
    } else {
        // Lógica para tratamento de erro se algum campo estiver faltando
        echo "Todos os campos obrigatórios devem ser preenchidos.";
    }
}
?>
