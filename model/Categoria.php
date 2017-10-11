<?php

class Categoria {

    private $categoria_nome;
    private $descricao;

    function __construct($categoria_nome, $descricao) {
        $this->categoria_nome = $categoria_nome;
        $this->descricao = $descricao;
    }

    function getCategoria_nome() {
        return $this->categoria_nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setCategoria_nome($categoria_nome) {
        $this->categoria_nome = $categoria_nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
        
    }

}
