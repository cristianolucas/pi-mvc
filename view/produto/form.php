<form action="?classe=ProdutoController" method="post">
    <input type="hidden" name="acao" value="<?= $acao ?>" >
    <input type="hidden" name="id" value="<?= $produto['id'] ?>" >
    Nome: <input type="text" name="nome" value="<?= $produto['nome'] ?>" required><br>
    Unidade Medida: <input type="text" name="unidade_medida" value="<?= $produto['unidade_medida'] ?>" required><br>
    Categoria: <select required name="categoria">
        <option value="">Selecione uma opção</option>
        <?php
        foreach ($categorias as $categoria) {
                $checked = "";
                if($categoria['id'] == $produto['categoria_id']) {
                    $checked = "selected";
                } else {
                    $checked = "";
                }
            ?> 
            <option <?= $checked ?> value="<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></option>
            <?php
        }
        ?>
    </select>
    <input type="submit" value="<?= $rotuloBotao ?>" required>
</form>