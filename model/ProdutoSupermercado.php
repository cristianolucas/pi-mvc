<?php

/**
 *
 * @author Diego
 */
class ProdutoSupermercado {
    private $preco, $id, $mercado;
    
    function __construct($preco, $mercado) {
        $this->preco = $preco;
        $this->mercado = $mercado;
    }
    
    function getPreco() {
        return $this->preco;
    }

    function getId() {
        return $this->id;
    }

    function getMercado() {
        return $this->mercado;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMercado($mercado) {
        $this->mercado = $mercado;
    }
}
