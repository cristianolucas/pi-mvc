<?php

require_once 'dao/ConexaoDAO.php';

class EnderecoUsuDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = ConexaoDAO::getConexao();
    }

    function inserir(EnderecoUsuario $endereco) {
        /* INSERÇÃO TABELA LOGRADOURO */
        $sql = "insert into logradouro (cidade_id, logradouro, bairro, cep) values ({$endereco->getCidade()}, "
        . "'{$endereco->getLogradouro()}', '{$endereco->getBairro()}', {$endereco->getCep()}) returning id;";
        $linha = $this->exec_rquery($sql);
        $logradouro_id = $linha['id'];
        
        /* INSERÇÃO TABELA ENDERECO_USUARIO */
        $sql = "insert into endereco_usuario (". 
                (($endereco->getComplemento() != NULL) ? "complemento, " : "") . 
                 "numero, logradouro_id, usuario_id) values (" . 
                (($endereco->getComplemento() != NULL) ? "'{$endereco->getComplemento()}'," : "") . 
                "{$endereco->getNumero()}, $logradouro_id, {$endereco->getUsuario()}) returning id;";
        $linha = $this->exec_rquery($sql);
        $endereco->setId($linha['id']);
    }
    
    function exec_rquery($query) {
        $resultado = pg_query($this->conexao, $query);
        $linha = pg_fetch_array($resultado);
        return $linha;
    }
    
    function buscar($id) {
        $sql = "select endereco_usuario.numero, endereco_usuario.complemento, logradouro.bairro, logradouro.logradouro, logradouro.cep, cidade.id as cidade_id, uf.id as uf_id from endereco_usuario join usuario on usuario.id = endereco_usuario.usuario_id join logradouro on endereco_usuario.logradouro_id = logradouro.id join cidade on cidade.id = logradouro.cidade_id join uf on uf.id = cidade.uf_id where usuario.id = $id";
        return $this->exec_rquery($sql);
    }
}
