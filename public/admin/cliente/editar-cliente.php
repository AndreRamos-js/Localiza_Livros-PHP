<!-- public/admin/cliente/editar-cliente.php -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../biblioteca/css/style.css">
    <title>Editar Cliente</title>
</head>

<body>
    <?php
    require_once '../../../config/database.php';
    require_once '../../../biblioteca/controllers/ClienteController.php';

    // Verifica se o ID do cliente foi passado como parâmetro
    if (isset($_GET['id'])) {
        $idCliente = $_GET['id'];
        $db = new Database();
        $clienteController = new ClienteController($db->getConnection());

        // Obtém os detalhes do cliente pelo ID
        $cliente = $clienteController->getById($idCliente);
    } else {
        echo "ID do cliente não fornecido.";
        exit();
    }
    ?>

    <div class="container">
        <h1>Editar Cliente</h1>

        <form class="cadastro-form" method="post" action="../../../biblioteca/actions/cliente/processa-editar-cliente.php">
            <input type="hidden" name="id_cliente" value="<?php echo $cliente['id']; ?>">

            <div class="form-group">
                <label for="nome_completo">Nome Completo:</label>
                <input type="text" class="form-control" name="nome_completo" value="<?php echo $cliente['nome_completo']; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $cliente['email']; ?>" required>
            </div>

            <div class="form-group">
                <label for="numero_celular">Número Celular:</label>
                <input type="text" class="form-control" name="numero_celular" value="<?php echo $cliente['numero_celular']; ?>" required>
            </div>

            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" name="endereco" value="<?php echo $cliente['endereco']; ?>" required>
            </div>

            <button type="submit" class="btn btn-secondary btn-block">Salvar Alterações</button>
        </form>

        <p class="mt-3"><a href="visualizar-clientes.php" class="btn btn-secondary btn-block">Voltar para Visualizar Clientes</a></p>
    </div>
</body>

</html>
