<form action="?classe=LocalizacaoController" method="post">
    <input type="hidden" name="acao" value="<?= $acao ?>" >
    <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
    CEP: <input type="number" name="cep" onblur="attEndereco(this.value)" value="<?= $localizacao['cep'] ?>">
    <div id="div_endereco">
        <?php if ($alterar) { ?>
            Estado: <select name="estado" onchange="attCidade(this.value)">
                <?php
                foreach ($ufs as $uf) {
                    if ($uf['id'] == $localizacao['uf_id'])
                        $selected = "selected";
                    else
                        $selected = "";
                    ?>
                    <option <?= $selected ?> value="<?= $uf['id'] ?>"><?= $uf['nome'] ?></option>
                    <?php
                }
                ?>
            </select><br>
            Cidade: <select name="cidade" id="select_cidade">
                <?php
                foreach ($cidades as $cidade) {
                    if ($cidade['id'] == $localizacao['cidade_id'])
                        $selected = "selected";
                    else
                        $selected = "";
                    ?>
                    <option <?= $selected ?> value="<?= $cidade['id'] ?>"><?= $cidade['nome'] ?></option>
                    <?php
                }
                ?>
            </select><br>
            Bairro: <input type="text"  name="bairro" value="<?= $localizacao['bairro'] ?>"><br>
            
            Logradouro: <input type="text"  name="logradouro" value="<?= $localizacao['logradouro'] ?>"><br>
            <input type="hidden" name="logradouro_id" value="<?= $localizacao['logradouro_id'] ?>" >
            Número: <input type="number" name="numero" value="<?= $localizacao['numero'] ?>"><br>
            Complemento: <input type="text" name="complemento" value="<?= $localizacao['complemento'] ?>"><br>
        <?php } else { ?>

            Estado: <select name="estado" disabled>
                <option>Informe seu CEP</option>
            </select><br>
            Cidade: <select name="cidade" disabled>
                <option>Informe seu CEP</option>
            </select><br>
            Bairro: <input type="text"  name="bairro" disabled value="Informe seu cep"><br>
            Logradouro: <input type="text"  name="logradouro" disabled value="Informe seu logradouro"><br>
            Número: <input type="number" name="numero" disabled><br>
            Complemento: <input type="text" name="complemento" disabled><br>

        <?php } ?>
    </div>
    <input type="submit" value="<?= $rotuloBotao ?>">
</form>