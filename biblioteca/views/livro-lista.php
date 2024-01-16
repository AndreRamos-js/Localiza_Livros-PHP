<!-- HTML para exibir a lista de livros -->
<h2>Lista de Livros</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Quantidade Disponível</th>
    </tr>
    <?php foreach ($livros as $livro) : ?>
        <tr>
            <td><?php echo $livro['id']; ?></td>
            <td><?php echo $livro['titulo']; ?></td>
            <td><?php echo $livro['autor']; ?></td>
            <td><?php echo $livro['quantidade_disponivel']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
