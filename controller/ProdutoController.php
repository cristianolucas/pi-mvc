<?php

include_once 'dao/ProdutoDAO.php';
include_once 'dao/CategoriaDAO.php';
include_once 'model/Produto.php';

/**
 *
 * @author Diego
 */
class ProdutoController {
    private $dao;
    
    function __construct() {
        $this->dao = new ProdutoDAO();
    }

    function form() {
        $acao = 'insercao';
        $produto = null;
        $rotuloBotao = "Inserir";
        $categoria = new CategoriaDAO();
        $categorias = $categoria->listar();
        include_once 'view/produto/form.php';
        $this->listar(0);
    }

    public function insercao() {
        $produto = new Produto($_POST['nome'], $_POST['unidade_medida'], $_POST['categoria']);
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
        $produtos = $this->dao->listar($offset);
        include_once 'view/produto/listar.php';
    }
    
    public function listarFormProduto() {
        if(isset($_GET['pagina'])) {
            $pagina = $_GET['pagina'];
        } else {
            $pagina = 1;
        }
        $quantidade_de_registros = $this->dao->quantidade();
        $quantidade_de_paginas = ceil($quantidade_de_registros / 10);
        $offset = ($pagina * 10) - 10;
        $produtos = $this->dao->listar($offset);
        include_once 'view/produto/listarFormProduto.php';
    }

    public function alteracao() {
        $produto = new Produto($_POST['nome'], $_POST['unidade_medida'], $_POST['categoria']);
        $produto->setId($_POST['id']);
        $this->dao->alterar($produto);
        $this->form();
    }

    public function form_alteracao() {
        $alterar = true;
        $acao = 'alteracao';
        $produto = $this->dao->buscar($_GET['id']);
        $categoria = new CategoriaDAO();
        $categorias = $categoria->listar();
        $rotuloBotao = "Alterar";
        include_once 'view/produto/form.php';
    }

    public function excluir() {
        $this->dao->excluir($_GET['id']);
        $this->form();
    }
}
