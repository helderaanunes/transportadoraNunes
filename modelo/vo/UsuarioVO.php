<?php
class UsuarioVO {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $cpf;
    private $fotoPerfil;
    
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getFotoPerfil() {
        return $this->fotoPerfil;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setFotoPerfil($foto) {
        $this->fotoPerfil = $foto;
    }
    
}
?>