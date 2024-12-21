<?php
require_once $_SERVER['DOCUMENT_ROOT'] .
        '/transportadoraNunes/modelo/vo/VeiculoVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] .
        '/transportadoraNunes/modelo/dao/VeiculoDAO.php';

if (isset($_POST['chassi'])){
    $objVeiculo = new VeiculoVO();
    $objVeiculo->setAno($_POST['ano']);
    $objVeiculo->setChassi($_POST['chassi']);
    $objVeiculo->setCombustivel($_POST['combustivel']);
    $objVeiculo->setIdMarca($_POST['marca']);
    $objVeiculo->setModelo($_POST['modelo']);
    $objVeiculo->setPlaca($_POST['placa']);

    if (isset($_POST['id'])){
        $objVeiculo->setId($_POST['id']);
        VeiculoDAO::getInstance()->update($objVeiculo);
    }
    else{
        VeiculoDAO::getInstance()->insert($objVeiculo);
    }
//    echo "<script> 
//            alert('Salvo com sucesso!');
//            window.location.href='../veiculoList.php';
//          </script>";
}
else if (isset($_GET["idRemover"])){
     VeiculoDAO::getInstance()->delete($_GET["idRemover"]);
     echo "<script> 
            alert('Deletado com sucesso!');
            window.location.href='../veiculoList.php';
          </script>";
}