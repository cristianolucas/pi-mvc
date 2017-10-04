<form action="?classe=UsuarioController" method="post" name="formUsuario" id="formUsuario">
    <input type="hidden" name="acao" value="<?= $acao ?>" >
    <input type="hidden" name="id" value="<?= $usuario['id'] ?>" >
    Nome: <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required><br>
    Email: <input type="email" name="email" value="<?= $usuario['email'] ?>" required><br>
    Senha: <input type="password" name="senha" value="<?= $usuario['senha'] ?>" required><br>
    <?php
    if ($acao == "insercao") {
        ?>
        Confirmar Senha: <input type="password" name=conf_senha" id="senha"><br>
        <input type="submit" value="<?= $rotuloBotao ?>" required>
    <?php } else {
        ?>
        <input type="submit" value="<?= $rotuloBotao ?>"><br><br>
        <a href="?classe=EnderecoController&acao=form&id=<?= $usuario['id'] ?>"><h2>Endereço</h2></a>
        <?php
    }
    ?>
</form>