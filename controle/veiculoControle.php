<?php
require_once $_SERVER['DOCUMENT_ROOT'] .
        '/transportadoraNunes/modelo/vo/VeiculoVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] .
        '/transportadoraNunes/modelo/dao/VeiculoDAO.php';
$objVeiculo = new VeiculoVO();
$objVeiculo->setAno($_POST['ano']);
$objVeiculo->setChassi($_POST['chassi']);
$objVeiculo->setCombustivel($_POST['combustivel']);
$objVeiculo->setIdMarca($_POST['marca']);
$objVeiculo->setModelo($_POST['modelo']);
$objVeiculo->setPlaca($_POST['placa']);

VeiculoDAO::getInstance()->insert($objVeiculo);

echo "<script> 
        alert('Salvo com sucesso!');
        window.location.href='../veiculoList.php';
      </script>";