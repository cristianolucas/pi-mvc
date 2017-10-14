<form action="?classe=ProdutoSupermercadoController&id=<?= $_GET['id'] ?>" method="post">
    <input type="hidden" name="acao" value="<?= $acao ?>" >
    <input type="hidden" name="mercado" value="<?= $_GET['id'] ?>" >
    <?php $produtoController->listarFormProduto(); ?>
    <br>Preço: <input type="number" name="preco">
    <br><input type="submit" value="<?= $rotuloBotao ?>" required>
</form>