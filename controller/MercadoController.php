<?php

include_once 'dao/MercadoDAO.php';
include_once 'model/Mercado.php';

class MercadoController {
    private $dao;
    
    function __construct() {
        $this->dao = new MercadoDAO();
    }

    function form() {
        $acao = 'insercao';
        $mercado = null;
        $rotuloBotao = "Inserir";
        include_once 'view/mercado/form.php';
        $this->listar();
    }

    public function insercao() {
        $mercado = new Mercado($_POST['nome'], $_POST['telefone'], $_POST['cnpj']);
        $this->dao->inserir($mercado);
        $this->form();
    }

    public function listar() {
        $mercados = $this->dao->listar();
        include_once 'view/mercado/listar.php';
    }

    public function alteracao() {
        $mercado = new Mercado($_POST['nome'], $_POST['telefone'], $_POST['cnpj']);
        $mercado->setId($_POST['id']);
        $this->dao->alterar($mercado);
        $this->form();
    }

    public function form_alteracao() {
        $acao = 'alteracao';
        $mercado = $this->dao->buscar($_GET['id']);
        $rotuloBotao = "Alterar";
        include_once 'view/mercado/form.php';
    }

    public function excluir() {
        $this->dao->excluir($_GET['id']);
        $this->form();
    }
}
