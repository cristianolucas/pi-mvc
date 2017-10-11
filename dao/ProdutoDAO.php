<?php

require_once 'dao/ConexaoDAO.php';

/**
 *
 * @author Diego
 */
class ProdutoDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = ConexaoDAO::getConexao();
    }
    
    function alterar(Produto $produto) {
        $sql = "update produto set nome = '{$produto->getNome()}', "
        . "unidade_medida = '{$produto->getUnidedeMedida()}', categoria_id = {$produto->getCategoria()} where id = {$produto->getId()};";
        pg_query($this->conexao, $sql);
    }

    function inserir(Produto $produto) {
        $sql = "insert into produto (nome, unidade_medida, categoria_id) values ('{$produto->getNome()}', "
        . "'{$produto->getUnidedeMedida()}', {$produto->getCategoria()}) returning id;";
        $linha = $this->exec_rquery($sql);
        $produto->setId($linha['id']);
    }
    
    function exec_rquery($query) {
        $resultado = pg_query($this->conexao, $query);
        $linha = pg_fetch_array($resultado);
        return $linha;
    }
    
    public function listar() {
        $produtos = array();
        $sql = "select produto.*, categoria.nome as categoria from produto join categoria on categoria.id = produto.categoria_id";
        $resultado = pg_query($this->conexao, $sql);
        while ($linha = pg_fetch_array($resultado)) {
            array_push($produtos, $linha);
        }
        return $produtos;
    }
    
    public function excluir($id) {
        $sql = "delete from produto where id = $id";
        pg_query($this->conexao, $sql);
    }
    
    function buscar($id) {
        $sql = "select produto.*, categoria.nome as categoria, categoria.id as categoria_id from produto join categoria on categoria.id = produto.categoria_id where produto.id = $id";
        return $this->exec_rquery($sql);
    }
}
