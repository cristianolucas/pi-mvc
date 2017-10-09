<?php

include_once 'model/Logradouro.php';

/**
 *
 * @author Diego
 */
class Localizacao extends Logradouro{
    private $id;
    private $complemento;
    private $numero;
    private $usuario;
    private $nome;

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
    
    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }
}
