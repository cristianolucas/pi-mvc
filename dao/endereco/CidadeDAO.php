<?php

require_once 'dao/ConexaoDAO.php';

class CidadeDAO {
    private $conexao;

    public function __construct() {
        $this->conexao = ConexaoDAO::getConexao();
    }
    
    function buscarTodos($uf) {
        $cidades = array();
        $sql = "select * from cidade where uf_id = " . $uf;
        $resultado = pg_query($this->conexao, $sql);
        while($cidade = pg_fetch_array($resultado)) {
            array_push($cidades, $cidade);
        }
        return $cidades;
    }
    
    function buscar($id) {
        $sql = "select * from cidade where id = " . $id;
        $resultado = pg_query($this->conexao, $sql);
        return pg_fetch_array($resultado);
    }
}
