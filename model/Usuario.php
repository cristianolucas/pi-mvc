<?php

class Usuario {

    private $id, $nome, $email, $senha;
    private static $INSTANCE = null;

    private function __construct() { }

    static function getINSTANCE() {
        if (self::$INSTANCE == NULL)
            self::$INSTANCE = new Usuario();
        return self::$INSTANCE;
    }
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }
    
}
