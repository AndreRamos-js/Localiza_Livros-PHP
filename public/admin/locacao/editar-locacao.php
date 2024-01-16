<!-- public/admin/locacao/editar-locacao.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../biblioteca/css/style.css">
    <title>Editar Locação</title>
</head>
<body>
    <h1>Editar Locação</h1>

    <?php
    // Adicione as dependências e crie instâncias necessárias
    require_once '../../../config/database.php';
    require_once '../../../biblioteca/controllers/LocacaoController.php';
    require_once '../../../biblioteca/controllers/ClienteController.php';
    require_once '../../../biblioteca/controllers/LivroController.php';

    $db = new Database();
    $locacaoController = new LocacaoController($db->getConnection());
    $clienteController = new ClienteController($db->getConnection());
    $livroController = new LivroController($db->getConnection());

    // Verifique se o ID da locação foi fornecido na URL
    if (isset($_GET['id'])) {
        $idLocacao = $_GET['id'];

        // Obtenha os detalhes da locação
        $locacao = $locacaoController->getById($idLocacao);

        // Obtenha a lista de clientes e livros
        $clientes = $clienteController->getAll();
        $livros = $livroController->getAll();
    }
    ?>

    <form method="post" action="../../../biblioteca/actions/locacao/processa-editar-locacao.php">
        <!-- Campos ocultos para enviar o ID da locação -->
        <input type="hidden" name="id_locacao" value="<?php echo $locacao['id']; ?>">

        <label for="id_cliente">Cliente:</label>
        <select name="id_cliente">
            <?php foreach ($clientes as $cliente) : ?>
                <option value="<?php echo $cliente['id']; ?>" <?php echo ($cliente['id'] == $locacao['id_cliente']) ? 'selected' : ''; ?>>
                    <?php echo $cliente['nome_completo']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="id_livro">Livro:</label>
        <select name="id_livro">
            <?php foreach ($livros as $livro) : ?>
                <option value="<?php echo $livro['id']; ?>" <?php echo ($livro['id'] == $locacao['id_livro']) ? 'selected' : ''; ?>>
                    <?php echo $livro['titulo']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="data_locacao">Data Locação:</label>
        <input type="date" name="data_locacao" value="<?php echo $locacao['data_locacao']; ?>" required>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="Retirado" <?php echo ($locacao['status'] === 'Retirado') ? 'selected' : ''; ?>>Retirado</option>
            <option value="Devolvido" <?php echo ($locacao['status'] === 'Devolvido') ? 'selected' : ''; ?>>Devolvido</option>
            <option value="Atrasado" <?php echo ($locacao['status'] === 'Atrasado') ? 'selected' : ''; ?>>Atrasado</option>
        </select>

        <label for="data_devolucao">Data Devolução:</label>
        <input type="date" name="data_devolucao" value="<?php echo $locacao['data_devolucao']; ?>">

        <!-- Adicione outros campos conforme necessário -->

        <button type="submit">Salvar Alterações</button>
    </form>

    <p><a href="visualizar-locacoes.php">Voltar para Visualizar Locações</a></p>
</body>
</html>
