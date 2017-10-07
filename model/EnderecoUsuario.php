<?php

include_once 'model/Logradouro.php';

class EnderecoUsuario extends Logradouro {

    private $id;
    private $complemento;
    private $numero;
    private $usuario;

    function __construct() {
        
    }
        
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function getNumero() {
        return $this->numero;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }
    
    function getComplemento() {
        return $this->complemento;
    }

    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }
}
