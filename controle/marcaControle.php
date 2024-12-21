<?php
require_once $_SERVER['DOCUMENT_ROOT'] .
        '/transportadoraNunes/modelo/vo/MarcaVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] .
        '/transportadoraNunes/modelo/dao/MarcaDAO.php';

if (isset($_POST['chassi'])){
    $objMarca = new MarcaVO();
    $objMarca->setAno($_POST['nome']);
    
    if (isset($_POST['id'])){
        $objMarca->setId($_POST['id']);
        MarcaDAO::getInstance()->update($objMarca);
    }
    else{
        MarcaDAO::getInstance()->insert($objMarca);
    }
    echo "<script> 
            alert('Salvo com sucesso!');
            window.location.href='../marcaList.php';
          </script>";
}
else if (isset($_GET["idRemover"])){
     MarcaDAO::getInstance()->delete($_GET["idRemover"]);
     echo "<script> 
            alert('Deletado com sucesso!');
            window.location.href='../marcaList.php';
          </script>";
}