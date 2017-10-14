<?php
if ($mercados != null) {
    ?>
    <table border=1>
        <tr><td>Nome</td><td>Excluir</td><?php if (UsuarioController::logado()) { ?><td>Avaliar</td><?php } ?><td>Percentual</td><td>Perfil</td></tr>
        <?php
        foreach ($mercados as $mercado) {
            ?> 
            <tr>
                <td> <?= $mercado['nome'] ?></td>
                <td><a href="?classe=MercadoController&acao=excluir&id=<?= $mercado['id'] ?>">Excluir</a></td>
                <!-- COLUNA AVALIAR MERCADO CASO O USUARIO ESTEJA LOGADO -->
                <?php if (UsuarioController::logado()) { ?><td><a href="#" onclick="janelaAvaliarMercado(<?= $mercado['id'] ?>, <?= $_SESSION['id'] ?>)">Avaliar</a></td><?php } ?>
                <td><?= MercadoController::getAvaliacao($mercado['id']) ?>%</td>
                <td><a href="?classe=MercadoController&acao=perfil&id=<?= $mercado['id'] ?>">Perfil</a></td>
            </tr>
            <?php
        }
    } else {
        echo 'Nenhum registro';
    }
    ?>
</table>  