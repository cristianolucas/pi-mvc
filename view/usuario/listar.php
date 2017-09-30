<?php
if ($usuarios != null) {
    ?>
    <table border=1>
        <tr><td>Nome</td><td>Alterar</td><td>Excluir</td></tr>
        <?php
        foreach ($usuarios as $usuario) {
            ?> 
            <tr>
                <td> <?= $usuario['nome'] ?></td>
                <td><a href="?classe=UsuarioController&acao=form_alteracao&id=<?= $usuario['id']?>">Alterar</a></td>
                <td><a href="?classe=UsuarioController&acao=excluir&id=<?= $usuario['id']?>">Excluir</a></td>
            </tr>
            <?php
        }
    } else {
        echo 'Nenhum registro';
    }
    ?>
</table>  