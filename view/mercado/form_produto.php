<form action="?classe=PromocaoController" method="post">
    <input type="hidden" name="acao" value="<?= $acao ?>" >
    <input type="hidden" name="id" value="<?= $produto['id'] ?>" >


    <table border=1>
        <tr><td>Produto</td></tr>
        <?php
        foreach ($produtos as $valor) {
        echo "<tr><td>$valor[nome]</td>";
        echo "<td><a href=?classe=EstadoCivilController&acao=form_alteracao&id=$valor[id]>Alterar</a></td>";
        echo "<td><a href=?classe=EstadoCivilController&acao=exclusao&id=$valor[id]>Excluir</a></td></tr>";
        }
        ?>
        </table>


        <input type = "submit" value = "<?= $rotuloBotao ?>" required>
        </form>