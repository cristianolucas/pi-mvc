<?php

include_once 'dao/MercadoDAO.php';
include_once 'model/Mercado.php';
include_once 'controller/ProdutoSupermercadoController.php';

/**
 *
 * @author Diego
 */
class MercadoController {
    private $dao;
    
    function __construct() {
        $this->dao = new MercadoDAO();
    }
    
    public function getAvaliacao($mercado) {
        return $this->dao->getPercentualAvaliacao($mercado);
    }

    public function avaliar() {
        if($this->dao->getAvaliacao($_GET['mercado'], $_GET['usuario'])) {
            echo "<br>Você já avaliou este mercado!";
        } else {
            $this->dao->avaliar($_GET['mercado'], $_GET['usuario'], $_GET['avaliacao']);
        }
    }
    
    function form() {
        $alterar = false;
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
        $alterar = true;
        $acao = 'alteracao';
        $mercado = $this->dao->buscar($_GET['id']);
        $localizacao = $this->dao->buscarLocalizacao($_GET['id']);
        $rotuloBotao = "Alterar";
        include_once 'view/mercado/form.php';
    }

    public function excluir() {
        $this->dao->excluir($_GET['id']);
        $this->form();
    }
    
    public function perfil() {
        $mercado = $this->dao->buscar($_GET['id']);
        $localizacao = $this->dao->getLocalizacao($_GET['id']);
        $produtos = new ProdutoSupermercadoController();
        include_once 'view/mercado/perfil.php';
    }
}
