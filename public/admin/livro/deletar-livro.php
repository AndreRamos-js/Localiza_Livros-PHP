<!-- public/admin/livro/deletar-livro.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../biblioteca/css/style.css">
    <title>Deletar Livro</title>
</head>
<body>
    <h1>Deletar Livro</h1>

    <?php
    // Verifica se o ID do livro foi passado pela URL
    if (isset($_GET['id'])) {
        $livroId = $_GET['id'];

        require_once '../../../config/database.php';
        require_once '../../../biblioteca/controllers/LivroController.php';

        $db = new Database();
        $livroController = new LivroController($db->getConnection());

        // Obtém os detalhes do livro pelo ID
        $livro = $livroController->getById($livroId);

        if ($livro) {
    ?>
            <p>Tem certeza de que deseja excluir o livro "<?php echo $livro['titulo']; ?>"?</p>

            <form method="post" action="../../../biblioteca/actions/livro/processa-deletar-livro.php">
                <input type="hidden" name="id_livro" value="<?php echo $livro['id']; ?>">
                <button type="submit">Confirmar Exclusão</button>
            </form>

            <p><a href="visualizar-livros.php">Cancelar e Voltar para Visualizar Livros</a></p>
    <?php
        } else {
            echo "<p>Livro não encontrado.</p>";
        }
    } else {
        echo "<p>ID do livro não fornecido.</p>";
    }
    ?>
</body>
</html>
