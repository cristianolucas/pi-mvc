<?php

require_once 'dao/ConexaoDAO.php';

class PromocaoDAO {
    private $conexao;

    public function __construct() {
        $this->conexao = ConexaoDAO::getConexao();
    }
    
    public function inserir(Promocao $promocao) {
        $sql = "insert into promocao (dtValidade, produto_id) values ('{$promocao->getDtValidade()}', {$promocao->getProdutoSup()})";
        $resultado = pg_query($this->conexao, $sql);
        $linha = pg_fetch_array($resultado);
        $promocao->setId($linha['id']);
    }
    
    public function buscar($id) {
        $sql = "select * from promocao where produto_id = $id";
        $resultado = pg_query($this->conexao, $sql);
        return pg_fetch_array($resultado);
    }
    
    public function excluir($id) {
        $sql = "delete from promocao where produto_id = $id";
        pg_query($this->conexao, $sql);
    }
    
    public function alterar(Promocao $promocao) {
        $sql = "update promocao set dtValidade = '{$promocao->getDtValidade()}' where produto_id = {$promocao->getProdutoSup()}";
        pg_query($this->conexao, $sql);
    }
}