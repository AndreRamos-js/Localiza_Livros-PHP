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
    <?php
    require_once '../../../config/database.php';
    require_once '../../../biblioteca/controllers/LocacaoController.php';

    // Verifica se o ID da locação foi passado como parâmetro
    if (isset($_GET['id'])) {
        $idLocacao = $_GET['id'];
        $db = new Database();
        $locacaoController = new LocacaoController($db->getConnection());

        // Obtém os detalhes da locação pelo ID
        $locacao = $locacaoController->getById($idLocacao);

        // Obtem a lista de clientes e livros disponíveis
        $clientes = $locacaoController->getAllClientes();
        $livros = $locacaoController->getAllLivros();
    } else {
        echo "ID da locação não fornecido.";
        exit();
    }
    ?>

    <div class="container">
        <h1>Editar Locação</h1>

        <form class="cadastro-form" method="post" action="../../../biblioteca/actions/locacao/processa-editar-locacao.php">
            <input type="hidden" name="id_locacao" value="<?php echo $locacao['id']; ?>">

            <div class="form-group">
                <label for="cliente">Cliente:</label>
                <select class="form-control" name="cliente" required>
                    <?php foreach ($clientes as $cliente) : ?>
                        <option value="<?php echo $cliente['id']; ?>" <?php echo ($cliente['id'] == $locacao['id_cliente']) ? 'selected' : ''; ?>>
                            <?php echo $cliente['nome_completo']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="livro">Livro:</label>
                <select class="form-control" name="livro" required>
                    <?php foreach ($livros as $livro) : ?>
                        <option value="<?php echo $livro['id']; ?>" <?php echo ($livro['id'] == $locacao['id_livro']) ? 'selected' : ''; ?>>
                            <?php echo $livro['titulo']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="data_locacao">Data Locação:</label>
                <input class="form-control" type="date" name="data_locacao" value="<?php echo $locacao['data_locacao']; ?>" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status" required>
                    <option value="Retirado" <?php echo ($locacao['status'] == 'Retirado') ? 'selected' : ''; ?>>Retirado</option>
                    <option value="Devolvido" <?php echo ($locacao['status'] == 'Devolvido') ? 'selected' : ''; ?>>Devolvido</option>
                    <option value="Atrasado" <?php echo ($locacao['status'] == 'Atrasado') ? 'selected' : ''; ?>>Atrasado</option>
                </select>
            </div>

            <!-- A data de devolução não é obrigatória -->
            <div class="form-group">
                <label for="data_devolucao">Data Devolução:</label>
                <input type="date" class="form-control" name="data_devolucao">
            </div>

            <button type="submit" class="btn btn-secondary btn-block">Salvar Alterações</button>
        </form>

        <p class="mt-3"><a href="visualizar-locacoes.php" class="btn btn-secondary btn-block">Voltar para Visualizar Locações</a></p>
    </div>
</body>
</html>
