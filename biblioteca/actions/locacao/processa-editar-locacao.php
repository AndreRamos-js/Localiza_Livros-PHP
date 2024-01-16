<?php
require_once '../../../config/database.php';
require_once '../../controllers/LocacaoController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $locacaoController = new LocacaoController($db->getConnection());

    // Verifica se todos os campos obrigatórios foram preenchidos
    if (isset($_POST["id_locacao"], $_POST["id_cliente"], $_POST["id_livro"], $_POST["data_locacao"], $_POST["status"], $_POST["data_devolucao"])) {
        $locacaoId = $_POST["id_locacao"];
        $idCliente = $_POST["id_cliente"];
        $idLivro = $_POST["id_livro"];
        $dataLocacao = $_POST["data_locacao"];
        $status = $_POST["status"];
        $dataDevolucao = $_POST["data_devolucao"];

        if ($locacaoController->update($locacaoId, $idCliente, $idLivro, $dataLocacao, $status, $dataDevolucao)) {
            header("Location: ../../../public/admin/locacao/visualizar-locacoes.php");
            exit();
        } else {
            // Lógica para tratamento de erro
            echo "Erro ao editar a locação.";
        }
    } else {
        // Lógica para tratamento de erro se algum campo estiver faltando
        echo "Todos os campos são obrigatórios.";
    }
}
?>
