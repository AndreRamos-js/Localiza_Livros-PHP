<!-- HTML para exibir a lista de locações -->
<h2>Lista de Locações</h2>

<?php if (empty($locacoes)) : ?>
    <p>Não há locações feitas.</p>
<?php else : ?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>ID Cliente</th>
        <th>ID Livro</th>
        <th>Nome do Cliente</th>
        <th>Título Livro Alugado</th>
        <th>Data Locação</th>
        <th>Status</th>
        <th>Data Devolução</th>
    </tr>
    <?php foreach ($locacoes as $locacao) : ?>
        <tr>
            <td><?php echo $locacao['id']; ?></td>
            <td><?php echo $locacao['id_cliente']; ?></td>
            <td><?php echo $locacao['id_livro']; ?></td>
            <td><?php echo $locacao['nome_cliente']; ?></td>
            <td><?php echo $locacao['titulo_livro_alugado']; ?></td>
            <td><?php echo $locacao['data_locacao']; ?></td>
            <td><?php echo $locacao['status']; ?></td>
            <td><?php echo $locacao['data_devolucao']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>
