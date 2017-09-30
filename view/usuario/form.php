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
        <input type="submit" value="<?= $rotuloBotao ?>">
    <?php } else {
        ?>
        <input type="submit" value="<?= $rotuloBotao ?>"><br><br>
        <a href="?classe=EnderecoController&acao=form"><h2>Endereço</h2></a>
        <?php
    }
    ?>
</form>