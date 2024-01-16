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
    <h1>Cadastro de Livro</h1>

    <form method="post" action="../../../biblioteca/actions/livro/processa-cadastro-livro.php">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required>

        <label for="autor">Autor:</label>
        <input type="text" name="autor" required>

        <label for="quantidade_disponivel">Quantidade Disponível:</label>
        <input type="number" name="quantidade_disponivel" required>

        <button type="submit">Cadastrar</button>
    </form>

    <p><a href="visualizar-livros.php">Visualizar Livros</a></p>
    <p><a href="../../index.php">Voltar para Home</a></p>

</body>
</html>
