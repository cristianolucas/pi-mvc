<?php

class Promocao {
    private $id, $dtValidade;
    
    function __construct($id, $dtValidade) {
        $this->id = $id;
        $this->dtValidade = $dtValidade;
    }
    
    function getId() {
        return $this->id;
    }

    function getDtValidade() {
        return $this->dtValidade;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDtValidade($dtValidade) {
        $this->dtValidade = $dtValidade;
    }
}
