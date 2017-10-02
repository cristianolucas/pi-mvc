<?php

class EnderecoUsuario {

    private $id;
    private $complemento;
    private $numero;
    private $logradouro;
    private $bairro;
    private $cep;
    private $cidade;
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

    function getLogradouro() {
        return $this->logradouro;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCep() {
        return $this->cep;
    }

    function getCidade() {
        return $this->cidade;
    }

    function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
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
