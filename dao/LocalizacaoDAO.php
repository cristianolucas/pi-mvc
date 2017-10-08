<?php

require_once 'dao/ConexaoDAO.php';

/**
 * Description of Localizacao
 *
 * @author Diego
 */
class LocalizacaoDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = ConexaoDAO::getConexao();
    }
    
    function alterar(Localizacao $localizacao) {
        $sql_localizacao = "update localizacao set complemento = '{$localizacao->getComplemento()}', "
        . "numero = {$localizacao->getNumero()} where mercado_id = {$localizacao->getId()};";
        $sql_logradouro = "update logradouro set cep = '{$localizacao->getCep()}', bairro = '{$localizacao->getBairro()}', "
        . "logradouro = '{$localizacao->getLogradouro()}', cidade_id = {$localizacao->getCidade()} where id = {$localizacao->getLogradouroId()};";
        $sql = $sql_localizacao.$sql_logradouro;
        pg_query($this->conexao, $sql);
    }

    function inserir(Localizacao $localizacao) {
        /* INSERÇÃO TABELA LOGRADOURO */
        $sql = "insert into logradouro (cidade_id, logradouro, bairro, cep) values ({$localizacao->getCidade()}, "
        . "'{$localizacao->getLogradouro()}', '{$localizacao->getBairro()}', {$localizacao->getCep()}) returning id;";
        $linha = $this->exec_rquery($sql);
        $localizacao->setLogradouroId($linha['id']);
        
        /* INSERÇÃO TABELA ENDERECO_USUARIO */
        $sql = "insert into localizacao (". 
                (($localizacao->getComplemento() != NULL) ? "complemento, " : "") . 
                 "numero, logradouro_id, mercado_id) values (" . 
                (($localizacao->getComplemento() != NULL) ? "'{$localizacao->getComplemento()}'," : "") . 
                "{$localizacao->getNumero()}, {$localizacao->getLogradouroId()}, {$localizacao->getUsuario()}) returning id;";
        $linha = $this->exec_rquery($sql);
        $localizacao->setId($linha['id']);
    }
    
    function exec_rquery($query) {
        $resultado = pg_query($this->conexao, $query);
        $linha = pg_fetch_array($resultado);
        return $linha;
    }
    
    function buscar($id) {
        $sql = "select localizacao.numero, localizacao.complemento, logradouro.id as logradouro_id, logradouro.bairro, "
                . "logradouro.logradouro, logradouro.cep, cidade.id as cidade_id, uf.id as uf_id from localizacao "
                . "join mercado on mercado.id = localizacao.mercado_id join logradouro on "
                . "localizacao.logradouro_id = logradouro.id join cidade on cidade.id = logradouro.cidade_id join uf on "
                . "uf.id = cidade.uf_id where mercado.id = $id";
        return $this->exec_rquery($sql);
    }
}
