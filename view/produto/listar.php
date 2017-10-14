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
<?php
$pagina_posterior = $pagina + 1;
$pagina_anterior = $pagina - 1;

if($pagina > 1) {
    echo "<a href=?classe=ProdutoController&acao=form&pagina=$pagina_anterior>Anterior</a>";
}

for ($i = 1; $i <= $quantidade_de_paginas; $i++) {
    if($pagina == $i) {
        echo "<a href=?classe=ProdutoController&acao=form&pagina=$i><b>$i</b></a>";
    } else {
        echo "<a href=?classe=ProdutoController&acao=form&pagina=$i>$i</a>";
    }
}


if($pagina < $quantidade_de_paginas) {
    echo "<a href=?classe=ProdutoController&acao=form&pagina=$pagina_posterior>Proxima</a>";
}

?>