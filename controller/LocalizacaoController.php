<?php

include_once 'model/Localizacao.php';
include_once 'dao/LocalizacaoDAO.php';
include_once 'dao/endereco/UfDAO.php';
include_once 'dao/endereco/CidadeDAO.php';

/**
 *
 * @author Diego
 */
class LocalizacaoController {

    private $dao;

    function __construct() {
        $this->dao = new LocalizacaoDAO();
    }

    function form() {
        $alterar = false;
        $acao = 'insercao';
        $localizacao = null;
        $rotuloBotao = "Inserir";
        include_once 'view/mercado/localizacao/form.php';
    }

    public function insercao() {
        $localizacao = $this->setUsuario();
        $this->dao->inserir($localizacao);
        $this->form();
        header("Location: ?classe=MercadoController&acao=form");
    }

    public function alteracao() {
        $localizacao = $this->setUsuario();
        $this->dao->alterar($localizacao);
        $this->form();
        header("Location: ?classe=MercadoController&acao=form");
    }

    function setUsuario() {
        $localizacao = new Localizacao();
        $localizacao->setNumero($_POST['numero']);
        $localizacao->setLogradouro($_POST['logradouro']);
        if (isset($_POST['logradouro_id']))
            $localizacao->setLogradouroId($_POST['logradouro_id']);
        if (isset($_POST['complemento']))
            $localizacao->setComplemento($_POST['complemento']);
        $localizacao->setCidade($_POST['cidade']);
        $localizacao->setCep($_POST['cep']);
        $localizacao->setBairro($_POST['bairro']);
        $localizacao->setMercado($_POST['id']);
        $localizacao->setId($_POST['id']);
        return $localizacao;
    }

    public function form_alteracao() {
        $alterar = true;
        $acao = 'alteracao';
        $localizacao = $this->dao->buscar($_GET['id']);
        $rotuloBotao = "Alterar";
        $obj_uf = new UfDAO();
        $ufs = $obj_uf->buscarTodos();
        $obj_cid = new CidadeDAO();
        $cidades = $obj_cid->buscarTodos($localizacao['uf_id']);
        $selected = "";
        include_once 'view/mercado/localizacao/form.php';
    }
}
