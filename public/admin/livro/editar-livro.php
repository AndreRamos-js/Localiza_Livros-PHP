<!-- public/admin/livro/editar-livro.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../biblioteca/css/style.css">
    <title>Editar Livro</title>
</head>
<body>
    <h1>Editar Livro</h1>

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
            <form method="post" action="../../../biblioteca/actions/livro/processa-editar-livro.php">
                <input type="hidden" name="id_livro" value="<?php echo $livro['id']; ?>">

                <label for="titulo">Título:</label>
                <input type="text" name="titulo" value="<?php echo $livro['titulo']; ?>" required>

                <label for="autor">Autor:</label>
                <input type="text" name="autor" value="<?php echo $livro['autor']; ?>" required>

                <label for="quantidade_disponivel">Quantidade Disponível:</label>
                <input type="number" name="quantidade_disponivel" value="<?php echo $livro['quantidade_disponivel']; ?>" required>

                <button type="submit">Salvar Alterações</button>
            </form>

            <p><a href="visualizar-livros.php">Voltar para Visualizar Livros</a></p>
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
