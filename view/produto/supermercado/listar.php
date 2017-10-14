<?php
if ($produtos != null) {
    ?>
    <table border=1>
        <tr><td>Poduto</td><td>Preço</td></tr>
        <?php
        foreach ($produtos as $produto) {
            ?> 
            <tr>
                <td> <?= $produto['produto'] ?></td>
                <td>R$<?= $produto['preco'] ?></td>
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
    echo "<a href=?classe=MercadoController&acao=perfil&id=$_GET[id]&pagina=$pagina_anterior>Anterior</a>";
}

for ($i = 1; $i <= $quantidade_de_paginas; $i++) {
    if($pagina == $i) {
        echo "<a href=?classe=MercadoController&acao=perfil&id=$_GET[id]&pagina=$i><b>$i</b></a>";
    } else {
        echo "<a href=?classe=MercadoController&acao=perfil&id=$_GET[id]&pagina=$i>$i</a>";
    }
}


if($pagina < $quantidade_de_paginas) {
    echo "<a href=?classe=MercadoController&acao=perfil&id=$_GET[id]&pagina=$pagina_posterior>Proxima</a>";
}

?>