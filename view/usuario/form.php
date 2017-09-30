<form action="?classe=UsuarioController" method="post">
    <input type="hidden" name="acao" value="<?= $acao ?>" >
    <input type="hidden" name="id" value="<?= $usuario['id'] ?>" >
    Nome: <input type="text" name="nome" value="<?= $usuario['nome'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $usuario['email'] ?>"><br>
    Senha: <input type="password" name="senha" value="<?= $usuario['senha'] ?>"><br>
    <?php
    if ($acao == "insercao") {
        ?>
        Confirmar Senha: <input type="password" name=conf_senha"><br>
        <?php
    }
    ?>
    <input type="submit" value="<?= $rotuloBotao ?>">
</form>