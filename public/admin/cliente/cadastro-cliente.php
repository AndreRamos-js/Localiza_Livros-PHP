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
    <div class="container">
        <h1>Cadastro de Cliente</h1>

        <form class="cadastro-form" method="post" action="../../../biblioteca/actions/cliente/processa-cadastro-cliente.php">
            <div class="form-group">
                <label for="nome_completo">Nome Completo:</label>
                <input type="text" class="form-control" name="nome_completo" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="form-group">
                <label for="numero_celular">Número Celular:</label>
                <input type="text" class="form-control" name="numero_celular" required>
            </div>

            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" name="endereco" required>
            </div>

            <button type="submit" class="btn btn-secondary btn-block">Cadastrar</button>
        </form>

        <p class="mt-3"><a href="visualizar-clientes.php" class="btn btn-secondary btn-block">Visualizar Clientes</a></p>
        <p><a href="../../index.php" class="btn btn-secondary btn-block">Voltar para Home</a></p>
    </div>
</body>
</html>
