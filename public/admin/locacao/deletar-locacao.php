<!-- public/admin/locacao/deletar-locacao.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../biblioteca/css/style.css">
    <title>Deletar Locação</title>
</head>
<body>
    <h1>Deletar Locação</h1>

    <?php
    // Verifica se o ID da locação foi passado pela URL
    if (isset($_GET['id'])) {
        $locacaoId = $_GET['id'];

        require_once '../../../config/database.php';
        require_once '../../../biblioteca/controllers/LocacaoController.php';

        $db = new Database();
        $locacaoController = new LocacaoController($db->getConnection());

        // Obtém os detalhes da locação pelo ID
        $locacao = $locacaoController->getLocacaoById($locacaoId);

        if ($locacao) {
    ?>
            <p>Tem certeza de que deseja excluir a locação de "<?php echo $locacao['nome_cliente']; ?>"?</p>

            <form method="post" action="../../../biblioteca/actions/locacao/processa-deletar-locacao.php">
                <input type="hidden" name="id_locacao" value="<?php echo $locacao['id']; ?>">
                <button type="submit">Confirmar Exclusão</button>
            </form>

            <p><a href="visualizar-locacoes.php">Cancelar e Voltar para Visualizar Locações</a></p>
    <?php
        } else {
            echo "<p>Locação não encontrada.</p>";
        }
    } else {
        echo "<p>ID da locação não fornecido.</p>";
    }
    ?>
</body>
</html>
