<?php

class Mercado {

    private $id, $telefone, $nome, $cnpj;
    
    function __construct($nome, $telefone, $cnpj) {
        $this->telefone = $telefone;
        $this->nome = $nome;
        $this->cnpj = $cnpj;
    }
    
    function getId() {
        return $this->id;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getNome() {
        return $this->nome;
    }

    function getCnpj() {
        return $this->cnpj;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }
}
