<form action="?classe=MercadoController" method="post">
    <input type="hidden" name="acao" value="<?= $acao ?>" >
    <input type="hidden" name="id" value="<?= $mercado['id'] ?>" >
    Nome: <input type="text" name="nome" value="<?= $mercado['nome'] ?>" required><br>
    Telefone: <input type="text" name="telefone" value="<?= $mercado['telefone'] ?>" required><br>
    CNPJ: <input type="text" name="cnpj" value="<?= $mercado['cnpj'] ?>" required><br>
    <input type="submit" value="<?= $rotuloBotao ?>" required>
</form>