<?php

include_once 'dao/UsuarioDAO.php';
include_once 'model/Usuario.php';

/**
 * Description of Localizacao
 *
 * @author Diego
 */
session_start();

class UsuarioController {

    private $dao;

    function __construct() {
        $this->dao = new UsuarioDAO();
    }

    function form() {
        $acao = 'insercao';
        $usuario = null;
        $rotuloBotao = "Inserir";
        include_once 'view/usuario/form.php';
        $this->listar();
    }

    public function insercao() {
        $usuario = new Usuario($_POST['nome'], $_POST['email'], $_POST['senha']);
        $this->dao->inserir($usuario);
        $this->form();
    }

    public function listar() {
        $usuarios = $this->dao->listar();
        include_once 'view/usuario/listar.php';
    }

    public function alteracao() {
        $usuario = new Usuario($_POST['nome'], $_POST['email'], $_POST['senha']);
        $usuario->setId($_POST['id']);
        $this->dao->alterar($usuario);
        $this->form();
    }

    function deslogar() {
        session_destroy();
        header("Location: ?classe=UsuarioController");
    }

    public static function logado() {
        $return = false;
        if (isset($_SESSION['logado'])) {
            if ($_SESSION['logado'] === "sim") {
                $return = true;
            }
        }
        return $return;
    }

    public function login() {
        $usuario = $this->dao->buscar_login($_POST['email'], $_POST['senha']);
        if ($usuario === false) {
            $_SESSION['logado'] = false;
        } else {
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['senha'] = $usuario['senha'];
            $_SESSION['logado'] = "sim";
            header("Location: ?classe=UsuarioController&acao=listar&id=$_SESSION[id]");
        }
    }

    public function form_login() {
        $acao = 'login';
        $rotuloBotao = "Login";
        include_once 'view/usuario/form_login.php';
    }

    public function form_alteracao() {
        $acao = 'alteracao';
        $endereco = $this->dao->buscarEndereco($_GET['id']);
        $usuario = $this->dao->buscar($_GET['id']);
        $rotuloBotao = "Alterar";
        include_once 'view/usuario/form.php';
    }

    public function excluir() {
        $this->dao->excluir($_GET['id']);
        $this->form();
    }

}
