<?php
require_once 'dao/ConexaoDAO.php';
require_once './dao/endereco/CidadeDAO.php';

$uf = $_GET['uf'];

?>
<select name="cidade" id="select_cidade">
    <option value="">Selecione uma Cidade</option>
    <?php
    $cidadeDAO = new CidadeDAO();
    $cidades = $cidadeDAO->buscarTodos($uf);
    foreach ($cidades as $cidade) {
        ?> 
        <option value="<?= $cidade['id'] ?>"><?= $cidade['nome'] ?></option>
        <?php
    }
    ?>
</select><br>
Bairro: <input type="text" name="bairro" <?php  echo $dados['bairro'] == null ? "placeholder=\"Informe seu bairro\"" : "value=\"" . $dados['bairro'] . "\"" ?>>
<br>
Logradouro: <input type="text" name="logradouro" <?php echo $dados['rua'] == ' ' ? "placeholder=\"Informe seu logradouro\"" : "value=\"" . $dados['rua'] . "\""?>>
<br>
Número: <input type="number" name="numero">