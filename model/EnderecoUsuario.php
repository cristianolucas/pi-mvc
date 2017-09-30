<?php

class EnderecoUsuario {

    private $complemento;
    private $numero;

    function __construct() {
        
    }

    function getComplemento() {
        return $this->complemento;
    }

    function getNumero() {
        return $this->numero;
    }

    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }
}
