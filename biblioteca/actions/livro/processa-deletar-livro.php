<?php
require_once '../../../config/database.php';
require_once '../../controllers/LivroController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $livroController = new LivroController($db->getConnection());

    // Verifica se o ID do livro foi enviado
    if (isset($_POST["id_livro"])) {
        $livroId = $_POST["id_livro"];

        if ($livroController->delete($livroId)) {
            header("Location: ../../../public/admin/livro/visualizar-livros.php");
            exit();
        } else {
            // Lógica para tratamento de erro
            echo "Erro ao deletar o livro.";
        }
    } else {
        // Lógica para tratamento de erro se o ID do livro estiver faltando
        echo "ID do livro não fornecido.";
    }
}
?>
