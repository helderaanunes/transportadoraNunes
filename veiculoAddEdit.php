<?php
include 'autenticacao.php';
require_once $_SERVER['DOCUMENT_ROOT'] .
        '/transportadoraNunes/modelo/vo/VeiculoVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] .
        '/transportadoraNunes/modelo/dao/VeiculoDAO.php';

$obj = NULL;
if (isset($_GET['id'])){
    $obj = VeiculoDAO::getInstance()->getById($_GET['id']);
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include "cabecalho.php"; ?>
        <div id="layoutSidenav">
           <?php include "menu.php"; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Veículos</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Veículos</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fa-regular fa-square-plus"></i>
                                Adicionar Veículo
                            </div>
                            <div class="card-body">
                                <form method="POST" action="controle/veiculoControle.php">
                                    <?php
                                        if($obj!=NULL){
                                    echo "<input type='hidden' name='id' value='".$obj->getId()."'/>";
                                        }
                                    ?>
                                    
                                    <div class="row">
                                        <div class="col-3">
                                            Placa:
                                            <input type="text" maxlength="8" class="form-control"
                                                   name="placa" value="<?php echo $obj==NULL?"":$obj->getPlaca() ?>"/>
                                        </div>
                                        <div class="col-3">
                                            Marca:
                                            <select class="form-control" name="marca">
                                                <?php 
                                                require_once $_SERVER['DOCUMENT_ROOT'] .
                                                    '/transportadoraNunes/modelo/dao/MarcaDAO.php';
                                                $lista = MarcaDAO::getInstance()->listAll();
                                                foreach ($lista as $marca){
                                                    echo "<option value='".$marca->getId()."' >".$marca->getNome()."</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            Modelo:
                                            <select class="form-control" name="modelo">
                                                <option <?php echo $obj!=NULL && $obj->getModelo()=="Doblo"?"selected='selected'":""; ?> value="Doblo">Doblo</option>
                                                <option <?php echo $obj!=NULL && $obj->getModelo()=="F-4000"?"selected='selected'":""; ?> value="F-4000">F-4000</option>
                                                <option <?php echo $obj!=NULL && $obj->getModelo()=="Onix"?"selected='selected'":""; ?> value="Onix">Onix</option>
                                                <option <?php echo $obj!=NULL && $obj->getModelo()=="XC40"?"selected='selected'":""; ?> value="XC40">XC40</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            Ano
                                            <input type="year" class="form-control" name="ano"/>  
                                        </div>
                                        <div class="col-3">
                                            Chassi
                                            <input type="text" class="form-control" name="chassi" />  
                                        </div>
                                        <div class="col-3">
                                            Combustível
                                            <select class="form-control" name="combustivel">
                                                <option>Etanol</option>
                                                <option>Gasolina</option>
                                                <option>Flex</option>
                                                <option>Diesel</option>
                                                <option>Elétrico</option>
                                                <option>Gás</option>
                                            </select>
                                        </div>
                                        <div class="row mt-4 ">
                                            <div class="col-2">
                                            <input type="submit" value="Salvar" class="btn btn-outline-success"/>
                                            </div>
                                            <div class="col-2">
                                                <input type="reset" value="Limpar" class="btn btn-outline-secondary"/>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
