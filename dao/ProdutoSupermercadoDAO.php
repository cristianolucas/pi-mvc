<?php

require_once 'dao/ConexaoDAO.php';

/**
 *
 * @author Diego
 */
class ProdutoSupermercadoDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = ConexaoDAO::getConexao();
    }
    
    function alterar(ProdutoSupermercado $produto) {
        $sql = "update produto_mer set preco = '{$produto->getPreco()}', "
        . "produto_id = '{$produto->getProduto()}', mercado_id = {$produto->getMercado()} where id = {$produto->getId()};";
        pg_query($this->conexao, $sql);
    }

    function inserir(ProdutoSupermercado $produto) {
        $sql = "insert into produto_mer (preco, produto_id, mercado_id) values ('{$produto->getPreco()}', "
        . "{$produto->getProduto()}, {$produto->getMercado()}) returning id;";
        $linha = $this->exec_rquery($sql);
        $produto->setId($linha['id']);
    }
    
    function exec_rquery($query) {
        $resultado = pg_query($this->conexao, $query);
        $linha = pg_fetch_array($resultado);
        return $linha;
    }
    
    public function listar($offset, $mercado) {
        $produtos = array();
        $sql = "select produto_mer.preco, produto.nome as produto, produto.unidade_medida as unidade_medida, categoria.nome as categoria "
                . "from produto_mer join produto on produto.id = produto_mer.produto_id join categoria on categoria.id = produto.categoria_id "
                . "where produto_mer.mercado_id=$mercado limit 10 offset $offset";
        $resultado = pg_query($this->conexao, $sql);
        while ($linha = pg_fetch_array($resultado)) {
            array_push($produtos, $linha);
        }
        return $produtos;
    }
    
    public function excluir($id) {
        $sql = "delete from produto_mer where id = $id";
        pg_query($this->conexao, $sql);
    }
    
    function buscar($id) {
        $sql = "select produto_mer.preco, produto.nome as produto, produto.unidade_medida as unidade_medida, categoria.nome as categoria "
                . "from produto_mer join produto on produto.id = produto_mer.produto_id join categoria on categoria.id = produto.categoria_id"
                . "where produto_mer.id = $id";
        return $this->exec_rquery($sql);
    }
    
    public function quantidade() {
        $sql = "select * from produto_mer";
        $resultado = pg_query($this->conexao, $sql);
        return pg_num_rows($resultado);
    }
}
