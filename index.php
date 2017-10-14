<!DOCTYPE html>
<html>
    <head>
        <script src="js/js.js"></script>
    </head>
    <body>
        <?php
        ini_set("display_errors", TRUE);
        include_once 'controller/UsuarioController.php';
        include_once 'controller/EnderecoController.php';
        include_once 'controller/MercadoController.php';
        include_once 'controller/LocalizacaoController.php';
        include_once 'controller/CategoriaController.php';
        include_once 'controller/ProdutoController.php';
        include_once 'controller/ProdutoSupermercadoController.php';
        if (UsuarioController::logado()) {
            ?>
            <a href="?classe=UsuarioController&acao=deslogar">Sair</a> | 
            <a href="?classe=UsuarioController&acao=listar">Listar</a> | 
            <a href="?classe=MercadoController&acao=form">Mercados</a> |
            <a href="?classe=CategoriaController&acao=form">Categoria</a> |
            <a href="?classe=ProdutoController&acao=form">Produto</a> |
            <?php
        } else {
            ?>
            <a href="?classe=UsuarioController&acao=form">Cadastrar</a> | 
            <a href="?classe=UsuarioController&acao=form_login">Logar</a>
            <?php
        }
        if (isset($_GET['classe'])) {
            $classe = $_GET['classe'];
            $classeController = new $classe();
            if (isset($_GET['acao'])) {
                $acao = $_GET['acao'];
                $classeController->$acao();
            } elseif (isset($_POST['acao'])) {
                $acao = $_POST['acao'];
                $classeController->$acao();
            }
        }
        ?>
    </body>
</html>