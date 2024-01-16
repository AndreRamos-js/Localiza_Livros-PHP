<!-- HTML para exibir a lista de clientes -->
<h2>Lista de Clientes</h2>

<?php if (empty($clientes)) : ?>
    <p>Não há clientes cadastrados.</p>
<?php else : ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome Completo</th>
            <th>Email</th>
            <th>Número Celular</th>
            <th>Endereço</th>
        </tr>
        <?php foreach ($clientes as $cliente) : ?>
            <tr>
                <td><?php echo htmlentities($cliente['id']); ?></td>
                <td><?php echo htmlentities($cliente['nome_completo']); ?></td>
                <td><?php echo htmlentities($cliente['email']); ?></td>
                <td><?php echo htmlentities($cliente['numero_celular']); ?></td>
                <td><?php echo htmlentities($cliente['endereco']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
