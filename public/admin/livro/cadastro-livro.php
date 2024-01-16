<!-- public/admin/livro/cadastro-livro.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../biblioteca/css/style.css">
    <title>Cadastro de Livro</title>
</head>
<body>
    <div class="container">
        <h1>Cadastro de Livro</h1>

        <form class="cadastro-form" method="post" action="../../../biblioteca/actions/livro/processa-cadastro-livro.php">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control" name="titulo" required>
            </div>

            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" class="form-control" name="autor" required>
            </div>

            <div class="form-group">
                <label for="quantidade_disponivel">Quantidade Disponível:</label>
                <input type="number" class="form-control" name="quantidade_disponivel" required>
            </div>

            <button type="submit" class="btn btn-secondary btn-block">Cadastrar</button>
        </form>

        <p class="mt-3"><a href="visualizar-livros.php" class="btn btn-secondary btn-block">Visualizar Livros</a></p>
        <p><a href="../../index.php" class="btn btn-secondary btn-block">Voltar para Home</a></p>
    </div>
</body>
</html>
