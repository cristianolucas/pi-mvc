<?php

require_once 'dao/ConexaoDAO.php';

class EnderecoUsuDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = ConexaoDAO::getConexao();
    }
    
    function alterar(EnderecoUsuario $endereco) {
        $sql_endereco_usuario = "update endereco_usuario set complemento = '{$endereco->getComplemento()}', "
        . "numero = {$endereco->getNumero()} where usuario_id = {$endereco->getId()};";
        $sql_logradouro = "update logradouro set cep = '{$endereco->getCep()}', bairro = '{$endereco->getBairro()}', "
        . "logradouro = '{$endereco->getLogradouro()}', cidade_id = {$endereco->getCidade()} where id = {$endereco->getLogradouro()};";
        $sql = $sql_endereco_usuario.$sql_logradouro;
        pg_query($this->conexao, $sql);
    }

    function inserir(EnderecoUsuario $endereco) {
        /* INSERÇÃO TABELA LOGRADOURO */
        $sql = "insert into logradouro (cidade_id, logradouro, bairro, cep) values ({$endereco->getCidade()}, "
        . "'{$endereco->getLogradouro()}', '{$endereco->getBairro()}', {$endereco->getCep()}) returning id;";
        $linha = $this->exec_rquery($sql);
        $endereco->setLogradouroId($linha['id']);
        
        /* INSERÇÃO TABELA ENDERECO_USUARIO */
        $sql = "insert into endereco_usuario (". 
                (($endereco->getComplemento() != NULL) ? "complemento, " : "") . 
                 "numero, logradouro_id, usuario_id) values (" . 
                (($endereco->getComplemento() != NULL) ? "'{$endereco->getComplemento()}'," : "") . 
                "{$endereco->getNumero()}, {$endereco->getLogradouroId()}, {$endereco->getUsuario()}) returning id;";
        $linha = $this->exec_rquery($sql);
        $endereco->setId($linha['id']);
    }
    
    function exec_rquery($query) {
        $resultado = pg_query($this->conexao, $query);
        $linha = pg_fetch_array($resultado);
        return $linha;
    }
    
    function buscar($id) {
        $sql = "select endereco_usuario.numero, endereco_usuario.complemento, logradouro.id as logradouro_id, logradouro.bairro, "
                . "logradouro.logradouro, logradouro.cep, cidade.id as cidade_id, uf.id as uf_id from endereco_usuario "
                . "join usuario on usuario.id = endereco_usuario.usuario_id join logradouro on "
                . "endereco_usuario.logradouro_id = logradouro.id join cidade on cidade.id = logradouro.cidade_id join uf on "
                . "uf.id = cidade.uf_id where usuario.id = $id";
        return $this->exec_rquery($sql);
    }
}
