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
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Transportadora Nunes</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 text-right">
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Configurações</a></li>
                            <li><a class="dropdown-item" href="#!">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
    
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                              <div class="nav">
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseVeiculos" aria-expanded="false" aria-controls="collapseVeiculos">
                                <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                                Veículos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseVeiculos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="veiculoAddEdit.html">Adicionar</a>
                                    <a class="nav-link" href="veiculoListar.html">Listar</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-target="#collapseMarca" data-bs-toggle="collapse"  aria-expanded="false" aria-controls="collapseUsuario">
                                <div class="sb-nav-link-icon"><i class="fas fa-copyright"></i></div>
                                Marca
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseMarca" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="marcaAddEdit.html">Adicionar</a>
                                    <a class="nav-link" href="marcaList.html">Listar</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-target="#collapseUsuario" data-bs-toggle="collapse"  aria-expanded="false" aria-controls="collapseUsuario">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Usuário
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseUsuario" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="usuarioAddEdit.html">Adicionar</a>
                                    <a class="nav-link" href="usuarioList.html">Listar</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
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
                                    <div class="row">
                                        <div class="col-3">
                                            Placa:
                                            <input type="text" maxlength="8" class="form-control"
                                                   name="placa"/>
                                        </div>
                                        <div class="col-3">
                                            Marca:
                                            <select class="form-control" name="marca">
                                                <option value="1">Fiat</option>
                                                <option value="1">Ford</option>
                                                <option value="1">Chevrolet</option>
                                                <option value="1">Volvo</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            Modelo:
                                            <select class="form-control" name="modelo">
                                                <option>Doblo</option>
                                                <option>F-4000</option>
                                                <option>Onyx</option>
                                                <option>XC40</option>
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
