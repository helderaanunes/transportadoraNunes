<?php

class VeiculoVO {
    private $id;
    private $modelo;
    private $placa;
    private $ano;
    private $chassi;
    private $combustivel;
    private $idMarca;
    
    function getId() {
        return $this->id;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getPlaca() {
        return $this->placa;
    }

    function getAno() {
        return $this->ano;
    }

    function getChassi() {
        return $this->chassi;
    }

    function getCombustivel() {
        return $this->combustivel;
    }

    function getIdMarca() {
        return $this->idMarca;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setPlaca($placa) {
        $this->placa = $placa;
    }

    function setAno($ano) {
        $this->ano = $ano;
    }

    function setChassi($chassi) {
        $this->chassi = $chassi;
    }

    function setCombustivel($combustivel) {
        $this->combustivel = $combustivel;
    }

    function setIdMarca($idMarca) {
        $this->idMarca = $idMarca;
    }


}
