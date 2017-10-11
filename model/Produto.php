<?php

/**
 *
 * @author Diego
 */
class Produto {
    private $id, $nome, $unidedeMedida, $categoria;
    
    function __construct($nome, $unidedeMedida, $categoria) {
        $this->nome = $nome;
        $this->unidedeMedida = $unidedeMedida;
        $this->categoria = $categoria;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    function getCategoria() {
        return $this->categoria;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
    
    function getNome() {
        return $this->nome;
    }

    function getUnidedeMedida() {
        return $this->unidedeMedida;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setUnidedeMedida($unidedeMedida) {
        $this->unidedeMedida = $unidedeMedida;
    }
}
