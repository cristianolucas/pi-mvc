<?php

include_once 'dao/CategoriaDAO.php';
include_once 'model/Categoria.php';

/**
 *
 * @author Diego
 */
class CategoriaController {
    private $dao;
    
    function __construct() {
        $this->dao = new CategoriaDAO();
    }

    function form() {
        $alterar = false;
        $acao = 'insercao';
        $categoria = null;
        $rotuloBotao = "Inserir";
        include_once 'view/produto/categoria/form.php';
        $this->listar();
    }

    public function insercao() {
        $categoria = new Categoria($_POST['nome'], $_POST['descricao']);
        $this->dao->inserir($categoria);
        $this->form();
    }

    public function listar() {
        $categorias = $this->dao->listar();
        include_once 'view/produto/categoria/listar.php';
    }

    public function alteracao() {
        $categoria = new Categoria($_POST['nome'], $_POST['descricao']);
        $categoria->setId($_POST['id']);
        $this->dao->alterar($categoria);
        $this->form();
    }

    public function form_alteracao() {
        $alterar = true;
        $acao = 'alteracao';
        $categoria = $this->dao->buscar($_GET['id']);
        $rotuloBotao = "Alterar";
        include_once 'view/produto/categoria/form.php';
    }

    public function excluir() {
        $this->dao->excluir($_GET['id']);
        $this->form();
    }
}
