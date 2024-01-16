<?php
require_once '../../../config/database.php';
require_once '../../controllers/LivroController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $livroController = new LivroController($db->getConnection());

    // Verifica se o ID do livro foi enviado
    if (isset($_POST['id_livro'])) {
        $livroId = $_POST['id_livro'];
    
        try {
            // Código para excluir o livro do banco de dados
            $livroController->delete($livroId);
            // Redirecionar ou exibir uma mensagem de sucesso, se necessário
        } catch (PDOException $e) {
            // Verificar se a exceção é devido a uma restrição de chave estrangeira
            if ($e->getCode() == 23000 && $e->errorInfo[1] == 1451) {
                // Mensagem de erro amigável para o usuário
                echo "Não é possível excluir este livro, pois existem locações associadas a ele.";
            } else {
                // Outros erros que podem ocorrer durante a exclusão
                echo "Erro ao excluir o livro: " . $e->getMessage();
            }
        }
    }
}
?>
