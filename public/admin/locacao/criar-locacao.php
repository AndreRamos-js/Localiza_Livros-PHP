<!-- public/admin/locacao/criar-locacao.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../biblioteca/css/style.css">
    <title>Criar Locação</title>
</head>
<body>
    <h1>Criar Locação</h1>

    <?php

    require_once '../../../config/database.php';
    require_once '../../../biblioteca/controllers/LocacaoController.php';

    $db = new Database();
    $locacaoController = new LocacaoController($db->getConnection());

    // Obtem a lista de clientes e livros disponíveis
    $clientes = $locacaoController->getAllClientes();
    $livros = $locacaoController->getAllLivros();
    ?>

    <form method="post" action="../../../biblioteca/actions/locacao/processa-criar-locacao.php">
        <label for="cliente">Cliente:</label>
        <select name="cliente" required>
            <?php foreach ($clientes as $cliente) : ?>
                <option value="<?php echo $cliente['id']; ?>"><?php echo $cliente['nome_completo']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="livro">Livro:</label>
        <select name="livro" required>
            <?php foreach ($livros as $livro) : ?>
                <option value="<?php echo $livro['id']; ?>"><?php echo $livro['titulo']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="data_locacao">Data Locação:</label>
        <input type="date" name="data_locacao" required>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="Retirado">Retirado</option>
            <option value="Devolvido">Devolvido</option>
            <option value="Atrasado">Atrasado</option>
        </select>

        <!-- A data de devolução não é obrigatória -->
        <label for="data_devolucao">Data Devolução:</label>
        <input type="date" name="data_devolucao">

        <button type="submit">Cadastrar</button>
    </form>

    <p><a href="visualizar-locacoes.php">Visualizar Locações</a></p>
    <p><a href="../../index.php">Voltar para Home</a></p>

</body>
</html>
