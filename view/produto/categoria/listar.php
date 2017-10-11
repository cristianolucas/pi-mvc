<?php
if ($categorias != null) {
    ?>
    <table border=1>
        <tr><td>Nome</td><td>Descricao</td><td>Alterar</td><td>Excluir</td></tr>
        <?php
        foreach ($categorias as $categoria) {
            ?> 
            <tr>
                <td> <?= $categoria['nome'] ?></td>
                <td> <?= $categoria['descricao'] ?></td>
                <td><a href="?classe=CategoriaController&acao=form_alteracao&id=<?= $categoria['id'] ?>">Alterar</a></td>
                <td><a href="?classe=CategoriaController&acao=excluir&id=<?= $categoria['id'] ?>">Excluir</a></td>
            </tr>
            <?php
        }
    } else {
        echo 'Nenhum registro';
    }
    ?>
</table>  