<?php

class Promocao {
    private $dtValidade, $produtoSup;
    
    function __construct($dtValidade, $produtoSup) {
        $this->dtValidade = $dtValidade;
        $this->produtoSup = $produtoSup;
    }
    
    function getProdutoSup() {
        return $this->produtoSup;
    }

    function setProdutoSup($produtoSup) {
        $this->produtoSup = $produtoSup;
    }
    
    function getDtValidade() {
        return $this->dtValidade;
    }

    function setDtValidade($dtValidade) {
        $this->dtValidade = $dtValidade;
    }
}
