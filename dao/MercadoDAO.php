<?php

require_once 'dao/ConexaoDAO.php';

/**
 *
 * @author Diego
 */
class MercadoDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = ConexaoDAO::getConexao();
    }

    public function getPercentualAvaliacao($mercado) {
        $sql = "select round(avg(avaliacao), 1) from usuario_mercado where mercado_id = $mercado";
        $resultado = $this->exc_rquery($sql);
        $linha = pg_fetch_array($resultado);
        return $linha[0];
    }
    
    public function getAvaliacao($mercado, $usuario) {
        if(pg_num_rows(pg_query($this->conexao, "select * from usuario_mercado where mercado_id = $mercado and usuario_id = $usuario")) > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function avaliar($mercado, $usuario, $avaliacao) {
        $sql = "insert into usuario_mercado (usuario_id, mercado_id, avaliacao) values ($usuario, $mercado, $avaliacao)";
        pg_query($this->conexao, $sql);
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
    
    function buscarLocalizacao($id) {
        $sql = "select mercado_id from localizacao where mercado_id = $id";
        $resultado = pg_query($this->conexao, $sql);
        if (pg_num_rows($resultado) >= 1)
            return true;
        else
            return false;
    }
            
    function exc_rquery($sql) {
        return pg_query($this->conexao, $sql);
    }

}
