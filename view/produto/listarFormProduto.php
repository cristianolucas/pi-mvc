<?php
if ($produtos != null) {
    ?>
    <table border=1>
        <tr><td>Nome</td><td>Selecionar</td></tr>
        <?php
        $i = 0;
        foreach ($produtos as $produto) {
            ?> 
            <tr>
                <td> <?= $produto['nome'] ?></td>
                <td><input name="produto" value="<?= $produto['id'] ?>" type="checkbox" id="produto_<?= $i++ ?>" onclick="selectProdutoFormProdutoSupermercado(<?= sizeof($produtos) ?>)"></td>
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
    echo "<a href=?classe=ProdutoSupermercadoController&acao=form&pagina=$pagina_anterior&id=$_GET[id]>Anterior</a>";
}

for ($i = 1; $i <= $quantidade_de_paginas; $i++) {
    if($pagina == $i) {
        echo "<a href=?classe=ProdutoSupermercadoController&acao=form&pagina=$i&id=$_GET[id]><b>$i</b></a>";
    } else {
        echo "<a href=?classe=ProdutoSupermercadoController&acao=form&pagina=$i&id=$_GET[id]>$i</a>";
    }
}


if($pagina < $quantidade_de_paginas) {
    echo "<a href=?classe=ProdutoSupermercadoController&acao=form&pagina=$pagina_posterior&id=$_GET[id]>Proxima</a>";
}

?>