<h1>Mercado <?= $mercado['nome'] ?></h1>

<h2>Localização</h2>

<table>
    <tr><td>Complemento:</td><td><?= $localizacao['complemento'] ?></td></tr>
    <tr><td>Numero:</td><td><?= $localizacao['numero'] ?></td></tr>
    <tr><td>Logradouro:</td><td><?= $localizacao['logradouro'] ?></td></tr>
    <tr><td>Bairro:</td><td><?= $localizacao['bairro'] ?></td></tr>
    <tr><td>CEP:</td><td><?= $localizacao['cep'] ?></td></tr>
</table>

<h2>Produtos</h2>

<button onclick="adicionarProdutoMercado(<?= $_GET['id'] ?>)">Adicionar</button> 
<?php $produtos->listar(); ?>
