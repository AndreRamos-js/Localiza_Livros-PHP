<!-- public/admin/locacao/visualizar-locacoes.php -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../biblioteca/css/style.css">
    <title>Visualizar Locações</title>
</head>

<body>
    <h1>Visualizar Locações</h1>

    <p><a href="../../index.php">Voltar para Home</a></p>
    <p><a href="criar-locacao.php">Criar Nova Locação</a></p>

    <?php
    // Inclua os arquivos necessários e instancie o LocacaoController
    require_once '../../../config/database.php';
    require_once '../../../biblioteca/controllers/LocacaoController.php';

    $db = new Database();
    $locacaoController = new LocacaoController($db->getConnection());

    // Obtenha a lista de locações
    $locacoes = $locacaoController->getAll();

    if (empty($locacoes)) {
        echo "<p>Não há locações feitas.</p>";
    } else {
    ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome do Cliente</th>
                <th>Título Livro Alugado</th>
                <th>Data Locação</th>
                <th>Status</th>
                <th>Data Devolução</th>
            </tr>
            <?php foreach ($locacoes as $locacao) : ?>
                <tr>
                    <td><?php echo $locacao['id']; ?></td>
                    <td><?php echo $locacaoController->getNomeClienteById($locacao['id_cliente']); ?></td>
                    <td><?php echo $locacaoController->getTituloLivroById($locacao['id_livro']); ?></td>
                    <td><?php echo $locacao['data_locacao']; ?></td>
                    <td><?php echo $locacao['status']; ?></td>
                    <td><?php echo $locacao['data_devolucao']; ?></td>
                    <td>
                        <a href="editar-locacao.php?id=<?php echo $locacao['id']; ?>">Editar</a>
                        <form action="../../../biblioteca/actions/locacao/processa-deletar-locacao.php" method="post" style="display: inline-block;">
                            <input type="hidden" name="id_locacao" value="<?php echo $locacao['id']; ?>">
                            <button type="submit" onclick="return confirm('Tem certeza que deseja deletar esta locação?')">Deletar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php
    }
    ?>
</body>

</html>