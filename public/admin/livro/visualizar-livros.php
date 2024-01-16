<!-- public/admin/livro/visualizar-livros.php -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../biblioteca/css/style.css">
    <title>Visualizar Livros</title>
</head>

<body>
    <div class="container">
        <h1>Visualizar Livros</h1>

        <p><a href="../../index.php" class="btn btn-secondary btn-block">Voltar para Home</a></p>
        <p class="mt-3"><a href="cadastro-livro.php" class="btn btn-secondary btn-block">Cadastrar Livro</a></p>

        <?php
        require_once '../../../config/database.php';
        require_once '../../../biblioteca/controllers/LivroController.php';

        $db = new Database();
        $livroController = new LivroController($db->getConnection());

        // Obtem a lista de livros
        $livros = $livroController->getAll();

        if (empty($livros)) {
            echo "<p>Não há livros cadastrados.</p>";
        } else {
        ?>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Quantidade Disponível</th>
                    <th>Ações</th>
                </tr>
                <?php foreach ($livros as $livro) : ?>
                    <tr>
                        <td><?php echo $livro['id']; ?></td>
                        <td><?php echo $livro['titulo']; ?></td>
                        <td><?php echo $livro['autor']; ?></td>
                        <td><?php echo $livro['quantidade_disponivel']; ?></td>
                        <td>
                            <a class="a-editar" href="editar-livro.php?id=<?php echo $livro['id']; ?>">Editar</a>
                            <form action="../../../biblioteca/actions/livro/processa-deletar-livro.php" method="post" style="display: inline-block;">
                                <input type="hidden" name="id_livro" value="<?php echo $livro['id']; ?>">
                                <button class="button-deletar" type="submit" onclick="return confirm('Tem certeza que deseja deletar o livro <?php echo $livro['titulo']; ?>?')">Deletar</button>
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
