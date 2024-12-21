<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/transportadoraNunes/modelo/dao/BDPDO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/transportadoraNunes/modelo/vo/UsuarioVO.php';

class UsuarioDAO {

    public static $instance;

    private function __construct() {        
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new UsuarioDAO();

        return self::$instance;
    }

    public function insert(UsuarioVO $usuario) {
        try {
            $sql = "INSERT INTO usuario (nome, email, senha, cpf, fotoPerfil) "
                    . "VALUES (:nome, :email, :senha, :cpf, :fotoPerfil)";
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":email", $usuario->getEmail());
            $p_sql->bindValue(":senha", $usuario->getSenha());
            $p_sql->bindValue(":cpf", $usuario->getCpf());
            $p_sql->bindValue(":fotoPerfil", $usuario->getFotoPerfil());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de salvar: " . $e->getMessage();
        }
    }

    public function update(UsuarioVO $usuario) {
        try {
            $sql = "UPDATE usuario SET nome=:nome, email=:email, senha=:senha, cpf=:cpf, fotoPerfil=:fotoPerfil "
                    . "WHERE id=:id";
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":email", $usuario->getEmail());
            $p_sql->bindValue(":senha", $usuario->getSenha());
            $p_sql->bindValue(":cpf", $usuario->getCpf());
            $p_sql->bindValue(":fotoPerfil", $usuario->getFotoPerfil());
            $p_sql->bindValue(":id", $usuario->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de atualizar: " . $e->getMessage();
        }
    }

    public function delete($id) {
        try {
            $sql = "DELETE FROM usuario WHERE id = :id";
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de deletar: " . $e->getMessage();
        }
    }

    public function getById($id) {
        try {
            $sql = "SELECT * FROM usuario WHERE id = :id";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            return $this->converterLinhaDaBaseDeDadosParaObjeto($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação: " . $e->getMessage();
        }
    }

    private function converterLinhaDaBaseDeDadosParaObjeto($row) {
        $obj = new UsuarioVO();
        $obj->setId($row['id']);
        $obj->setNome($row['nome']);
        $obj->setEmail($row['email']);
        $obj->setSenha($row['senha']);
        $obj->setCpf($row['cpf']);
        $obj->setFotoPerfil($row['fotoPerfil']);
        return $obj;
    }

    public function listAll() {
        try {
            $sql = "SELECT * FROM usuario";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->execute();

            $lista = array();
            $row = $p_sql->fetch(PDO::FETCH_ASSOC);
            while ($row) {
                $lista[] = $this->converterLinhaDaBaseDeDadosParaObjeto($row);
                $row = $p_sql->fetch(PDO::FETCH_ASSOC);
            }
            return $lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar listar todos os usuários: " . $e->getMessage();
        }
    }

    public function listWhere($restanteDoSQL, $arrayDeParametros, $arrayDeValores) {
        try {
            $sql = "SELECT * FROM usuario " . $restanteDoSQL;
            $p_sql = BDPDO::getInstance()->prepare($sql);
            for ($i = 0; $i < sizeof($arrayDeParametros); $i++) {
                $p_sql->bindValue($arrayDeParametros[$i], $arrayDeValores[$i]);
            }
            $p_sql->execute();
            $lista = array();
            $row = $p_sql->fetch(PDO::FETCH_ASSOC);
            while ($row) {
                $lista[] = $this->converterLinhaDaBaseDeDadosParaObjeto($row);
                $row = $p_sql->fetch(PDO::FETCH_ASSOC);
            }
            return $lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar a função de busca personalizada: " . $e->getMessage();
        }
    }
}

?>
