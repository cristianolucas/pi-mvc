<?php
if ($mercados != null) {
    ?>
    <table border=1>
        <tr><td>Nome</td><td>Alterar</td><td>Excluir</td></tr>
        <?php
        foreach ($mercados as $mercado) {
            ?> 
            <tr>
                <td> <?= $mercado['nome'] ?></td>
                <td><a href="?classe=MercadoController&acao=form_alteracao&id=<?= $mercado['id']?>">Alterar</a></td>
                <td><a href="?classe=MercadoController&acao=excluir&id=<?= $mercado['id']?>">Excluir</a></td>
            </tr>
            <?php
        }
    } else {
        echo 'Nenhum registro';
    }
    ?>
</table>  