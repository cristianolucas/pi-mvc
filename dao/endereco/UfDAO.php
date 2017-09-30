<?php

require_once 'dao/ConexaoDAO.php';

class UfDAO {
    
    private $conexao;

    public function __construct() {
        $this->conexao = ConexaoDAO::getConexao();
    }
    
    function buscarTodos() {
        $ufs = array();
        $sql = "select * from uf";
        $resultado = pg_query($this->conexao, $sql);
        while($uf = pg_fetch_array($resultado)) {
            array_push($ufs, $uf);
        }
        return $ufs;
    }
    
    function buscar($id) {
        $sql = "select * from uf where id = " . $id;
        $resultado = pg_query($this->conexao, $sql);
        return pg_fetch_array($resultado);
    }
}
