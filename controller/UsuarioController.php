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
        //$this->listar();
    }
    
    private function loadUsuario() {
        $this->usuario = Usuario::getINSTANCE();
        $this->usuario->setNome($_POST['nome']);
        $this->usuario->setEmail($_POST['email']);
        $this->usuario->setSenha($_POST['senha']);
    }


    public function insercao() {
        $this->loadUsuario();
        $this->dao->inserir($this->usuario);
        $this->form();
    }

    public function listar() {
        $usuarios = $this->dao->listar();
        include_once 'visao/usuario/listar.php';
    }

    public function alteracao() {
        $this->loadUsuario();
        $this->dao->alterar($aluno);
        $this->form();
    }

    public function form_alteracao() {
        $acao = 'alteracao';
        $usuario = $this->dao->buscar($_GET['id']);
        $rotuloBotao = "Alterar";
        include_once 'visao/aluno/form.php';
    }

    public function excluir() {
        $this->dao->excluir($_GET['id']);
        $this->form();
    }
}
