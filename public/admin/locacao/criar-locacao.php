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
    <div class="container">
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

        <form class="cadastro-form" method="post" action="../../../biblioteca/actions/locacao/processa-criar-locacao.php">
            <div class="form-group">
                <label for="cliente">Cliente:</label>
                <select class="form-control" name="cliente" required>
                    <?php foreach ($clientes as $cliente) : ?>
                        <option value="<?php echo $cliente['id']; ?>"><?php echo $cliente['nome_completo']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="livro">Livro:</label>
                <select class="form-control" name="livro" required>
                    <?php foreach ($livros as $livro) : ?>
                        <option value="<?php echo $livro['id']; ?>"><?php echo $livro['titulo']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="data_locacao">Data Locação:</label>
                <input type="date" class="form-control" name="data_locacao" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status" required>
                    <option value="Retirado">Retirado</option>
                    <option value="Devolvido">Devolvido</option>
                    <option value="Atrasado">Atrasado</option>
                </select>
            </div>

            <!-- A data de devolução não é obrigatória -->
            <div class="form-group">
                <label for="data_devolucao">Data Devolução:</label>
                <input type="date" class="form-control" name="data_devolucao">
            </div>

            <button type="submit" class="btn btn-secondary btn-block">Cadastrar</button>
        </form>

        <p class="mt-3"><a href="visualizar-locacoes.php" class="btn btn-secondary btn-block">Visualizar Locações</a></p>
        <p><a href="../../index.php" class="btn btn-secondary btn-block">Voltar para Home</a></p>
    </div>
</body>
</html>
