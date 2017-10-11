<?php
if ($produtos != null) {
    ?>
    <table border=1>
        <tr><td>Nome</td><td>Unidade Medida</td><td>Categoria</td><td>Alterar</td><td>Excluir</td></tr>
        <?php
        foreach ($produtos as $produto) {
            ?> 
            <tr>
                <td> <?= $produto['nome'] ?></td>
                <td> <?= $produto['unidade_medida'] ?></td>
                <td> <?= $produto['categoria'] ?></td>
                <td><a href="?classe=ProdutoController&acao=form_alteracao&id=<?= $produto['id'] ?>">Alterar</a></td>
                <td><a href="?classe=ProdutoController&acao=excluir&id=<?= $produto['id'] ?>">Excluir</a></td>
            </tr>
            <?php
        }
    } else {
        echo 'Nenhum registro';
    }
    ?>
</table>  