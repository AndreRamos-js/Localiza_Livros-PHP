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

    <h1>Editar Cliente</h1>

    <form method="post" action="../../../biblioteca/actions/cliente/processa-editar-cliente.php">
        <input type="hidden" name="id_cliente" value="<?php echo $cliente['id']; ?>">

        <label for="nome_completo">Nome Completo:</label>
        <input type="text" name="nome_completo" value="<?php echo $cliente['nome_completo']; ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $cliente['email']; ?>" required>

        <label for="numero_celular">Número Celular:</label>
        <input type="text" name="numero_celular" value="<?php echo $cliente['numero_celular']; ?>" required>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" value="<?php echo $cliente['endereco']; ?>" required>

        <button type="submit">Salvar Alterações</button>
    </form>

    <p><a href="visualizar-clientes.php">Voltar para Visualizar Clientes</a></p>
</body>
</html>
