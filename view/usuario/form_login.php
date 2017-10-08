<form action="?classe=UsuarioController" method="post">
    <input type="hidden" name="acao" value="<?= $acao ?>">
    
    Email: <input type="email" name="email" required><br>
    Senha: <input type="password" name="senha" required><br>
    <input type="submit" value="<?= $rotuloBotao ?>">
</form>