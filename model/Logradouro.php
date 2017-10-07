<?php

class Logradouro {
    private $logradouro;
    private $logradouroId;
    private $bairro;
    private $cep;
    private $cidade;
    
    function getLogradouroId() {
        return $this->logradouroId;
    }

    function setLogradouroId($logradouroId) {
        $this->logradouroId = $logradouroId;
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
}
