<?php

require_once 'dao/ConexaoDAO.php';

/**
 * Description of Localizacao
 *
 * @author Diego
 */
class MercadoDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = ConexaoDAO::getConexao();
    }

    public function inserir(Mercado $mercado) {
        $sql = "insert into mercado (telefone, nome, cnpj) values ('{$mercado->getTelefone()}', '{$mercado->getNome()}', "
                . "'{$mercado->getCnpj()}') returning id";
        $resultado = $this->exc_rquery($sql);
        $linha = pg_fetch_array($resultado);
        $mercado->setId($linha['id']);
    }
    
    public function excluir($id) {
        $sql = "delete from mercado where id = $id";
        $this->exc_rquery($sql);
    }
    
    public function alterar(Mercado $mercado) {
        $sql = "update mercado set telefone='{$mercado->getTelefone()}', nome='{$mercado->getNome()}', cnpj='{$mercado->getCnpj()}' "
        . "where id={$mercado->getId()}";
        $this->exc_rquery($sql);
    }
    
    public function buscar($id) {
        $sql = "select * from mercado where id = $id";
        $resultado = $this->exc_rquery($sql);
        return pg_fetch_array($resultado);
    }
    
    public function listar() {
        $mercados = array();
        $sql = "select * from mercado";
        $resultado = $this->exc_rquery($sql);
        while ($linha = pg_fetch_array($resultado)) {
            array_push($mercados, $linha);
        }
        return $mercados;
    }
            
    function exc_rquery($sql) {
        return pg_query($this->conexao, $sql);
    }

}
