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
                                    <a class="nav-link" href="veiculoAddEdit.php">Adicionar</a>
                                    <a class="nav-link" href="veiculoList.php">Listar</a>
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