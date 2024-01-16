<!-- HTML para exibir a lista de clientes -->
<h2>Lista de Clientes</h2>
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
            <td><?php echo $cliente['id']; ?></td>
            <td><?php echo $cliente['nome_completo']; ?></td>
            <td><?php echo $cliente['email']; ?></td>
            <td><?php echo $cliente['numero_celular']; ?></td>
            <td><?php echo $cliente['endereco']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
