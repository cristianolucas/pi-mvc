<?php

require_once 'dao/ConexaoDAO.php';

class CategoriaDAO {

    private $conexao;

    function __construct() {
        $this->conexao = ConexaoDAO::getConexao();
    }

    public function inserir($nome, $descricao) {
        $sql = "insert into categoria(nome, descricao) values($nome,$descricao)";
        pg_query($sql, $this->conexao);
    }
    
    public function alterar($id,$nome,$descricao){
        $sql="insert into categoria($nome,$descricao) where id=$id";
        $this->query($sql);
        
    }

    public function listar(){
        $sql = "select * from categoria";
        
        $linha = pg_fetch_array($result);
    }

        public function query($sql) {
        return $linha = pg_query($sql, $this->conexao);
    }

}
