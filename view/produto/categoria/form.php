<form action="?classe=CategoriaController" method="post">
    <input type="hidden" name="acao" value="<?= $acao ?>" >
    <input type="hidden" name="id" value="<?= $categoria['id'] ?>" >
    Nome: <input type="text" name="nome" value="<?= $categoria['nome'] ?>" required><br>
    Descricao: <input type="text" name="descricao" value="<?= $categoria['descricao'] ?>" required><br>
    <input type="submit" value="<?= $rotuloBotao ?>" required>
</form>