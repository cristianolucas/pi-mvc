<form action="?classe=PromocaoController" method="post">
    <input type="hidden" name="acao" value="<?= $acao ?>" >
    <input type="hidden" name="produto_id" value="<?= $promocao['produto_id'] ?>" >
    Data de Validade: <input type="date" name="dtValidade" value="<?= $promocao['dtValidade'] ?>" required><br>
    <input type="submit" value="<?= $rotuloBotao ?>" required>
</form>