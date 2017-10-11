<?php

include_once 'dao/PromocaoDAO.php';
include_once 'model/Promocao.php';

/**
 *
 * @author Diego
 */
class PromocaoController {
    private $dao;
    
    function __construct() {
        $this->dao = new PromocaoDAO();
    }

    function form() {
        $alterar = false;
        $acao = 'insercao';
        $promocao = null;
        $rotuloBotao = "Inserir";
        include_once 'view/mercado/form_promocao.php';
        $this->listar();
    }

    public function insercao() {
        $promocao = new Promocao($_POST['dtValidade'], $_POST['produto']);
        $this->dao->inserir($promocao);
        $this->form();
    }

    public function listar() {
        $promocoes = $this->dao->listar();
        include_once 'view/mercado/listar_promocoes.php';
    }

    public function alteracao() {
        $promocao = new Promocao($_POST['dtValidade'], $_POST['produto']);
        $this->dao->alterar($promocao);
        $this->form();
    }

    public function form_alteracao() {
        $alterar = true;
        $acao = 'alteracao';
        $promocao = $this->dao->buscar($_GET['produto_id']);
        $rotuloBotao = "Alterar";
        include_once 'view/mercado/form_promocao.php';
    }

    public function excluir() {
        $this->dao->excluir($_GET['produto_id']);
        $this->form();
    }
}
