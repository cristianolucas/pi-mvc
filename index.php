<?php

ini_set("display_errors", TRUE);
include_once './controller/UsuarioController.php';

?>
<a href="?classe=UsuarioController&acao=form">Inserir</a>    
<?php

if (isset($_GET['classe'])) {
    $classe = $_GET['classe'];
    $classeControler = new $classe();
    if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];
        $classeControler->$acao();
    } elseif (isset($_POST['acao'])) {
        $acao = $_POST['acao'];
        $classeControler->$acao();
    }
}
?>