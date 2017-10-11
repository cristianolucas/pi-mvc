<?php

require_once 'dao/ConexaoDAO.php';

class CategoriaDAO {

    private $conexao;

    function __construct() {
        $this->conexao = ConexaoDAO::getConexao();
    }

    public function inserir(Categoria $categoria) {
        $sql = "insert into categoria(nome, descricao) values('{$categoria->getCategoria_nome()}', '{$categoria->getDescricao()}')";
        $this->query($sql);
    }

    public function alterar(Categoria $categoria) {
        $sql = "update categoria set nome = '{$categoria->getCategoria_nome()}', descricao = '{$categoria->getDescricao()}' where id= {$categoria->getId()}";
        $this->query($sql);
    }

    public function listar() {
        $categorias = array();
        $sql = "select * from categoria";
        $resultado = $this->query($sql);
        while($linha = pg_fetch_array($resultado)) {
            array_push($categorias, $linha);
        }
        return $categorias;
    }
    
    public function excluir($id) {
        $sql = "delete from categoria where id = $id";
        $this->query($sql);
    }
    
    public function buscar($id) {
        $sql = "select * from categoria where id = $id";
        $resultado = $this->query($sql);
        return pg_fetch_array($resultado);
    }

    public function query($sql) {
        return pg_query($this->conexao, $sql);
    }

}
