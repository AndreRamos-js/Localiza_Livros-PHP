<!-- public/admin/cliente/visualizar-clientes.php -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../biblioteca/css/style.css">
    <title>Visualizar Clientes</title>
</head>

<body>
    <div class="container">
        <h1>Visualizar Clientes</h1>

        <p><a href="../../index.php" class="btn btn-secondary btn-block">Voltar para Home</a></p>
        <p class="mt-3"><a href="cadastro-cliente.php" class="btn btn-secondary btn-block">Cadastrar Cliente</a></p>

        <?php

        require_once '../../../config/database.php';
        require_once '../../../biblioteca/controllers/ClienteController.php';

        $db = new Database();
        $clienteController = new ClienteController($db->getConnection());

        // Obtem a lista de clientes
        $clientes = $clienteController->getAll();

        if (empty($clientes)) {
            echo "<p>Não há clientes cadastrados.</p>";
        } else {
        ?>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nome Completo</th>
                    <th>Email</th>
                    <th>Número Celular</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
                <?php foreach ($clientes as $cliente) : ?>
                    <tr>
                        <td><?php echo $cliente['id']; ?></td>
                        <td><?php echo $cliente['nome_completo']; ?></td>
                        <td><?php echo $cliente['email']; ?></td>
                        <td><?php echo $cliente['numero_celular']; ?></td>
                        <td><?php echo $cliente['endereco']; ?></td>
                        <td>
                            <a class="a-editar" href="editar-cliente.php?id=<?php echo $cliente['id']; ?>">Editar</a>
                            <form action="../../../biblioteca/actions/cliente/processa-deletar-cliente.php" method="post" style="display: inline-block;">
                                <input type="hidden" name="id_cliente" value="<?php echo $cliente['id']; ?>">
                                <button class="button-deletar" type="submit" onclick="return confirm('Tem certeza que deseja deletar o cliente <?php echo $cliente['nome_completo']; ?>?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php
        }
        ?>
    </div>
</body>

</html>