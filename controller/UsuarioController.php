<?php

include_once 'dao/UsuarioDAO.php';
include_once 'model/Usuario.php';

class UsuarioController {
    
    private $dao;
    private $usuario;
    
    function __construct() {
        $this->dao = new UsuarioDAO();
    }

    function form() {
        $acao = 'insercao';
        $usuario = null;
        $rotuloBotao = "Inserir";
        include_once 'view/usuario/form.php';
        $this->listar();
    }

    public function insercao() {
        $usuario = new Usuario($_POST['nome'], $_POST['email'], $_POST['senha']);
        $this->dao->inserir($usuario);
        $this->form();
    }

    public function listar() {
        $usuarios = $this->dao->listar();
        include_once 'view/usuario/listar.php';
    }

    public function alteracao() {
        $usuario = new Usuario($_POST['nome'], $_POST['email'], $_POST['senha']);
        $usuario->setId($_POST['id']);
        $this->dao->alterar($usuario);
        $this->form();
    }

    public function form_alteracao() {
        $acao = 'alteracao';
        $endereco = $this->dao->buscarEndereco($_GET['id']);
        $usuario = $this->dao->buscar($_GET['id']);
        $rotuloBotao = "Alterar";
        include_once 'view/usuario/form.php';
    }

    public function excluir() {
        $this->dao->excluir($_GET['id']);
        $this->form();
    }
}
