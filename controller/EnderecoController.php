<?php

include_once 'dao/EnderecoUsuDAO.php';
include_once 'model/EnderecoUsuario.php';

class EnderecoController {
    
    private $dao;
    private $endereco;
    
    function __construct() {
        $this->dao = new EnderecoUsuDAO();
    }

    function form() {
        $acao = 'insercao';
        $endereco = null;
        $rotuloBotao = "Inserir";
        include_once 'view/usuario/endereco/form.php';
        //$this->listar();
    }

    public function insercao() {
        $enderecoUsuario = new EnderecoUsuario();
        if(isset($_POST['numero'])) $enderecoUsuario->setNumero($_POST['numero']);
        if(isset($_POST['complemento'])) $enderecoUsuario->setComplemento($_POST['complemento']);
        $this->dao->inserir($usuario);
        $this->form();
    }
    //ATENÇÃO
    public function listar() {
        $usuarios = $this->dao->listar();
        include_once 'view/usuario/listar.php';
    }

    public function alteracao() {
        $enderecoUsuario = new EnderecoUsuario();
        if(isset($_POST['numero'])) $enderecoUsuario->setNumero($_POST['numero']);
        if(isset($_POST['complemento'])) $enderecoUsuario->setComplemento($_POST['complemento']);
        $enderecoUsuario->setId($_POST['id']);
        $this->dao->alterar($enderecoUsuario);
        $this->form();
    }

    public function form_alteracao() {
        $acao = 'alteracao';
        $usuario = $this->dao->buscar($_GET['id']);
        $rotuloBotao = "Alterar";
        include_once 'view/usuario/form.php';
    }

    public function excluir() {
        $this->dao->excluir($_GET['id']);
        $this->form();
    }
}
