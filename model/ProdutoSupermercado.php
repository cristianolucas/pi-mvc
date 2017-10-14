<?php

/**
 *
 * @author Diego
 */
class ProdutoSupermercado {
    private $preco, $id, $mercado, $produto;
    
    function __construct($preco, $mercado, $produto) {
        $this->preco = $preco;
        $this->mercado = $mercado;
        $this->produto = $produto;
    }
    
    function getProduto() {
        return $this->produto;
    }

    function setProduto($produto) {
        $this->produto = $produto;
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
