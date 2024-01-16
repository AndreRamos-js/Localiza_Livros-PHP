<!-- public/admin/cliente/deletar-cliente.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../biblioteca/css/style.css">
    <title>Deletar Cliente</title>
</head>
<body>
    <h1>Deletar Cliente</h1>

    <?php
    // Verifica se o ID do cliente foi passado pela URL
    if (isset($_GET['id'])) {
        $clienteId = $_GET['id'];

        require_once '../../../config/database.php';
        require_once '../../../biblioteca/controllers/ClienteController.php';

        $db = new Database();
        $clienteController = new ClienteController($db->getConnection());

        // Obtém os detalhes do cliente pelo ID
        $cliente = $clienteController->getById($clienteId);

        if ($cliente) {
    ?>
            <p>Tem certeza de que deseja excluir o cliente "<?php echo $cliente['nome_completo']; ?>"?</p>

            <form method="post" action="../../../biblioteca/actions/cliente/processa-deletar-cliente.php">
                <input type="hidden" name="id_cliente" value="<?php echo $cliente['id']; ?>">
                <button type="submit">Confirmar Exclusão</button>
            </form>

            <p><a href="visualizar-clientes.php">Cancelar e Voltar para Visualizar Clientes</a></p>
    <?php
        } else {
            echo "<p>Cliente não encontrado.</p>";
        }
    } else {
        echo "<p>ID do cliente não fornecido.</p>";
    }
    ?>
</body>
</html>
