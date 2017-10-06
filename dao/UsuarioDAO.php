<?php

require_once 'dao/ConexaoDAO.php';

class UsuarioDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = ConexaoDAO::getConexao();
    }

    function buscarEndereco($id) {
        $sql = "select usuario_id from endereco_usuario where usuario_id = $id";
        $resultado = pg_query($this->conexao, $sql);
        if (pg_num_rows($resultado) >= 1)
            return true;
        else
            return false;
    }

    function inserir(Usuario $usuario) {
        $sql = "insert into usuario (nome, email, senha) values ('{$usuario->getNome()}', '{$usuario->getEmail()}', '{$usuario->getSenha()}') returning id;";
        $resultado = pg_query($this->conexao, $sql);
        $linha = pg_fetch_array($resultado);
        $usuario->setId($linha['id']);
    }

    function alterar(Usuario $usuario) {
        $sql = "update usuario set nome='{$usuario->getNome()}', email='{$usuario->getEmail()}', senha='{$usuario->getSenha()}'"
                . "where id={$usuario->getId()}";
        pg_query($this->conexao, $sql);
    }

    function excluir($id) {        
        $sql_logradouro = "delete from logradouro where id=(select logradouro_id from endereco_usuario where usuario_id=$id);";
        $sql_endereco = "delete from endereco_usuario where usuario_id = $id;";
        $sql_usuario = "delete from usuario where id = $id";
        $sql = $sql_logradouro.$sql_endereco.$sql_usuario;
        pg_query($this->conexao, $sql);
    }

    function listar() {
        $usuarios = array();
        $sql = "select * from usuario";
        $resultado = pg_query($this->conexao, $sql);
        while ($usuario = pg_fetch_array($resultado)) {
            array_push($usuarios, $usuario);
        }
        return $usuarios;
    }

    function buscar($id) {
        $sql = "select * from usuario where id = " . $id;
        $resultado = pg_query($this->conexao, $sql);
        return pg_fetch_array($resultado);
    }

}
