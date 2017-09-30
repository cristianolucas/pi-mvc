<?php
require_once 'dao/ConexaoDAO.php';
require_once './dao/endereco/UfDAO.php';
require_once './dao/endereco/CidadeDAO.php';
$cep = $_GET['cep'];

function tirarAcentos($string) {
    return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $string);
}

$reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);

$dados['sucesso'] = (string) $reg->resultado;
$dados['rua'] = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
$dados['bairro'] = (string) $reg->bairro;
$dados['cidade'] = (string) $reg->cidade;
$dados['estado'] = (string) $reg->uf;

$uf_id;

?>
Estado: <select name="estado" onchange="attCidade(this.value)">
    <option value="">Selecione um Estado</option>
    <?php
    $ufDAO = new UfDAO();
    $estados = $ufDAO->buscarTodos();
    foreach ($estados as $uf) {
        if($dados['estado'] == $uf['sigla']) {
            $checked = "selected";
            $uf_id = $uf['id'];
        } else {
            $checked = "";
        }
        ?> 
        <option <?= $checked ?> value="<?= $uf['id'] ?>"><?= $uf['nome'] ?></option>
        <?php
    }
    ?>
</select><br>
Cidade: <select name="cidade" id="select_cidade">
    <option value="">Selecione uma Cidade</option>
    <?php
    $cidadeDAO = new CidadeDAO();
    $cidades = $cidadeDAO->buscarTodos($uf_id);
    
    foreach ($cidades as $cidade) {
        $checked = tirarAcentos($dados['cidade']) == $cidade['nome'] ? "selected" : "";
        ?> 
        <option <?= $checked ?> value="<?= $cidade['id'] ?>"><?= $cidade['nome'] ?></option>
        <?php
    }
    ?>
</select><br>
Bairro: <input type="text" name="bairro" <?php  echo $dados['bairro'] == null ? "placeholder=\"Informe seu bairro\"" : "value=\"" . $dados['bairro'] . "\"" ?>>
<br>
Logradouro: <input type="text" name="logradouro" <?php echo $dados['rua'] == ' ' ? "placeholder=\"Informe seu logradouro\"" : "value=\"" . $dados['rua'] . "\""?>>
<br>
Número: <input type="number" name="numero">