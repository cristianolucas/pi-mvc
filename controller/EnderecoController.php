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
    }

    public function insercao() {
        $enderecoUsuario = new EnderecoUsuario();
        if(isset($_POST['complemento'])) $enderecoUsuario->setComplemento($_POST['complemento']);
        $enderecoUsuario->setNumero($_POST['numero']);
        $enderecoUsuario->setLogradouro($_POST['logradouro']);
        $enderecoUsuario->setCidade($_POST['cidade']);
        $enderecoUsuario->setCep($_POST['cep']);
        $enderecoUsuario->setBairro($_POST['bairro']);
        $enderecoUsuario->setUsuario($_POST['id']);
        $this->dao->inserir($enderecoUsuario);
        $this->form();
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
}
