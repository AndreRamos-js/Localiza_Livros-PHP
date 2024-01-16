<!-- public/admin/cliente/cadastro-cliente.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../biblioteca/css/style.css">
    <title>Cadastro de Cliente</title>
</head>
<body>
    <h1>Cadastro de Cliente</h1>

    <form method="post" action="../../../biblioteca/actions/cliente/processa-cadastro-cliente.php">
        <label for="nome_completo">Nome Completo:</label>
        <input type="text" name="nome_completo" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="numero_celular">Número Celular:</label>
        <input type="text" name="numero_celular" required>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" required>

        <button type="submit">Cadastrar</button>
    </form>

    <p><a href="visualizar-clientes.php">Visualizar Clientes</a></p>
    <p><a href="../../index.php">Voltar para Home</a></p>

</body>
</html>
