<?php
require_once 'dao/ConexaoDAO.php';
require_once 'dao/endereco/CidadeDAO.php';

$uf = $_GET['uf'];
?>
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