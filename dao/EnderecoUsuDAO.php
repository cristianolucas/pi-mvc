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
}
