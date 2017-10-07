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
        ?>
        <a href="?classe=UsuarioController&acao=form">Pessoa</a> | 
        <a href="?classe=MercadoController&acao=form">Mercado</a>
        <?php
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