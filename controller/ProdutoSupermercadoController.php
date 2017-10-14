<?php

include_once 'dao/ProdutoSupermercadoDAO.php';
include_once 'model/ProdutoSupermercado.php';

/**
 *
 * @author Diego
 */
class ProdutoSupermercadoController {
    private $dao;
    
    function __construct() {
        $this->dao = new ProdutoSupermercadoDAO();
    }

    function form() {
        $produtoController = new ProdutoController();
        $acao = 'insercao';
        $produto = null;
        $rotuloBotao = "Inserir";
        include_once 'view/produto/supermercado/form.php';
    }

    public function insercao() {
        $produto = new ProdutoSupermercado($_POST['preco'], $_POST['mercado'], $_POST['produto']);
        $this->dao->inserir($produto);
        $this->form();
    }

    public function listar() {
        if(isset($_GET['pagina'])) {
            $pagina = $_GET['pagina'];
        } else {
            $pagina = 1;
        }
        $quantidade_de_registros = $this->dao->quantidade();
        $quantidade_de_paginas = ceil($quantidade_de_registros / 10);
        $offset = ($pagina * 10) - 10;
        $produtos = $this->dao->listar($offset, $_GET['id']);
        include_once 'view/produto/supermercado/listar.php';
    }

    public function alteracao() {
        $produto = new ProdutoSupermercado($_POST['preco'], $_POST['mercado'], $_POST['produto']);
        $produto->setId($_POST['id']);
        $this->dao->alterar($produto);
        $this->form();
    }

    public function form_alteracao() {
        $alterar = true;
        $acao = 'alteracao';
        $produto = $this->dao->buscar($_GET['id']);
        $rotuloBotao = "Alterar";
        include_once 'view/produto/supermercado/form.php';
    }

    public function excluir() {
        $this->dao->excluir($_GET['id']);
        $this->form();
    }
}
