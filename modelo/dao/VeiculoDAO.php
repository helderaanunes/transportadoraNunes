<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/transportadoraNunes/modelo/dao/BDPDO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/transportadoraNunes/modelo/vo/VeiculoVO.php';

class VeiculoDAO {

    public static $instance;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new VeiculoDAO();

        return self::$instance;
    }

    public function insert(VeiculoVO $veiculo) {
        try {
            $sql = "INSERT INTO veiculo (idMarca,placa,modelo,ano, chassi, combustivel)"
                    . "VALUES "
                    . "(:idMarca,:placa,:modelo,:ano, :chassi, :combustivel)";
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":idMarca", $veiculo->getIdMarca());
            $p_sql->bindValue(":placa", $veiculo->getPlaca());
            $p_sql->bindValue(":modelo", $veiculo->getModelo());
            $p_sql->bindValue(":ano", $veiculo->getAno());
            $p_sql->bindValue(":chassi", $veiculo->getChassi());
            $p_sql->bindValue(":combustivel", $veiculo->getCombustivel());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de salvar" . $e->getMessage();
        }
    }

    public function update($veiculo) {
        try {
            $sql = "UPDATE veiculo SET nome=:nome, placa=:placa,"
                    . "idMarca=:idMarca, modelo=:modelo, chassi=:chassi, combustivel=:combustivel  "
                    . "where id=:id";
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $veiculo->getNome());
            $p_sql->bindValue(":idMarca", $veiculo->getIdMarca());
            $p_sql->bindValue(":placa", $veiculo->getPlaca());
            $p_sql->bindValue(":modelo", ($veiculo->getModelo()));
            $p_sql->bindValue(":chassi", ($veiculo->getChassi()));
            $p_sql->bindValue(":combustivel", ($veiculo->getCombustivel()));
            $p_sql->bindValue(":id", $veiculo->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de atualizar" . $e->getMessage();
        }
    }

    public function delete($id) {
        try {
            $sql = "delete from veiculo where id = :id";
            //perceba que na linha abaixo vai precisar de um import
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao executar a função de deletar --" . $e->getMessage();
        }
    }

    public function getById($id) {
        try {
            $sql = "SELECT * FROM veiculo WHERE id = :id";
            $p_sql = BDPDO::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            return $this->converterLinhaDaBaseDeDadosParaObjeto($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
        }
    }

    private function converterLinhaDaBaseDeDadosParaObjeto($row) {
        $obj = new VeiculoVO();
        $obj->setId($row['id']);
        $obj->setIdMarca($row['idMarca']);
        $obj->setPlaca($row['placa']);
        $obj->setModelo($row['modelo']);
        $obj->setAno($row['ano']);
        $obj->setChassi($row['chassi']);
        $obj->setCombustivel($row['combustivel']);
        return $obj;
    }

    public function listAll() {
        try {
            $sql = "SELECT * FROM veiculo ";
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
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
        }
    }

    public function listWhere($restanteDoSQL, $arrayDeParametros, $arrayDeValores) {
        try {
            $sql = "SELECT * FROM veiculo " . $restanteDoSQL;
            $p_sql = BDPDO::getInstance()->prepare($sql);
            for ($i = 0; $i < sizeof($arrayDeParametros); $i++) {
                $p_sql->bindValue($arrayDeParametros[$i], $arrayDeValores [$i]);
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
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.".$e->getMessage();
        }
    }

}

?>