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
    <?php
    require_once '../../../config/database.php';
    require_once '../../../biblioteca/controllers/LivroController.php';

    // Verifica se o ID do livro foi passado como parâmetro
    if (isset($_GET['id'])) {
        $idLivro = $_GET['id'];
        $db = new Database();
        $livroController = new LivroController($db->getConnection());

        // Obtém os detalhes do livro pelo ID
        $livro = $livroController->getById($idLivro);
    } else {
        echo "ID do livro não fornecido.";
        exit();
    }
    ?>

    <div class="container">
        <h1>Editar Livro</h1>

        <form class="cadastro-form" method="post" action="../../../biblioteca/actions/livro/processa-editar-livro.php">
            <input type="hidden" name="id_livro" value="<?php echo $livro['id']; ?>">

            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control" name="titulo" value="<?php echo $livro['titulo']; ?>" required>
            </div>

            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" class="form-control" name="autor" value="<?php echo $livro['autor']; ?>" required>
            </div>

            <div class="form-group">
                <label for="quantidade_disponivel">Quantidade Disponível:</label>
                <input type="number" class="form-control" name="quantidade_disponivel" value="<?php echo $livro['quantidade_disponivel']; ?>" required>
            </div>

            <button type="submit" class="btn btn-secondary btn-block">Salvar Alterações</button>
        </form>

        <p class="mt-3"><a href="visualizar-livros.php" class="btn btn-secondary btn-block">Voltar para Visualizar Livros</a></p>
    </div>
</body>

</html>
