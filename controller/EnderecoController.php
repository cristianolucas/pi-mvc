<?php

include_once 'model/EnderecoUsuario.php';
include_once 'dao/EnderecoUsuDAO.php';
include_once 'dao/endereco/UfDAO.php';
include_once 'dao/endereco/CidadeDAO.php';

class EnderecoController {

    private $dao;

    function __construct() {
        $this->dao = new EnderecoUsuDAO();
    }

    function form() {
        $alterar = false;
        $acao = 'insercao';
        $endereco = null;
        $rotuloBotao = "Inserir";
        include_once 'view/usuario/endereco/form.php';
    }

    public function insercao() {
        $enderecoUsuario = $this->setUsuario();
        $this->dao->inserir($enderecoUsuario);
        $this->form();
        header("Location: ?classe=UsuarioController&acao=form");
    }

    public function alteracao() {
        $enderecoUsuario = $this->setUsuario();
        $this->dao->alterar($enderecoUsuario);
        $this->form();
        header("Location: ?classe=UsuarioController&acao=form");
    }

    function setUsuario() {
        $endereco = new EnderecoUsuario();
        if (isset($_POST['complemento']))
            $endereco->setComplemento($_POST['complemento']);
        $endereco->setNumero($_POST['numero']);
        $endereco->setLogradouro($_POST['logradouro']);
        if (isset($_POST['logradouro_id']))
            $endereco->setLogradouro($_POST['logradouro_id']);
        $endereco->setCidade($_POST['cidade']);
        $endereco->setCep($_POST['cep']);
        $endereco->setBairro($_POST['bairro']);
        $endereco->setUsuario($_POST['id']);
        $endereco->setId($_POST['id']);
        return $endereco;
    }

    public function form_alteracao() {
        $alterar = true;
        $acao = 'alteracao';
        $endereco = $this->dao->buscar($_GET['id']);
        $rotuloBotao = "Alterar";
        $obj_uf = new UfDAO();
        $ufs = $obj_uf->buscarTodos();
        $obj_cid = new CidadeDAO();
        $cidades = $obj_cid->buscarTodos($endereco['uf_id']);
        $selected = "";
        include_once 'view/usuario/endereco/form.php';
    }

}
