<?php
require_once '../../../config/database.php';
require_once '../../controllers/LivroController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $livroController = new LivroController($db->getConnection());

    // Verifica se todos os campos obrigatórios foram preenchidos
    if (isset($_POST["id_livro"], $_POST["titulo"], $_POST["autor"], $_POST["quantidade_disponivel"])) {
        $livroId = $_POST["id_livro"];
        $titulo = $_POST["titulo"];
        $autor = $_POST["autor"];
        $quantidadeDisponivel = $_POST["quantidade_disponivel"];

        if ($livroController->update($livroId, $titulo, $autor, $quantidadeDisponivel)) {
            header("Location: ../../../public/admin/livro/visualizar-livros.php");
            exit();
        } else {
            // Lógica para tratamento de erro
            echo "Erro ao editar o livro.";
        }
    } else {
        // Lógica para tratamento de erro se algum campo estiver faltando
        echo "Todos os campos são obrigatórios.";
    }
}
?>
