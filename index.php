<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['userId'])){
?>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Acceuil Grande Épicerie Générale</title>
    <link href="src/css/styles.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
          crossorigin="anonymous"/>
    <link rel="icon" href="./favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
            crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i>
    </button
    >
    <a class="navbar-brand" href="index.php">Grande Épicerie Générale</a><!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">Paramètres</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="src/inc/logout.inc.php">Déconnexion</a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="index.php"
                    >
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Co Board</a
                    >
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                       aria-expanded="false" aria-controls="collapseLayouts"
                    >
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Affichages
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                        >
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                         data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="layout-static.php">Static
                                Navigation</a><a class="nav-link" href="layout-sidenav-light.php">Light Sidenav</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                       aria-expanded="false" aria-controls="collapsePages"
                    >
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Pages
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                        >
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                         data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse"
                               data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
                            >Authentification
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                >
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                 data-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link"
                                                                           href="login.php">Connexion</a><a
                                        class="nav-link" href="register.php">Inscription</a>
                            </div>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                 data-parent="#sidenavAccordionPages">
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Connecté(é) en tant que :</div>
                <?php
                    echo $_SESSION['prenom'];
                ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Co Board</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Co Board</li>
                </ol>
                <div class="card bg-dark">
                    <div class="card-title text-center text-white">Cycle 1</div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4 ml-3">
                                <div class="card-body">Semaine A</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="semaine.php">Détails</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Semaine B</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="semaine.php">Détails</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Semaine C</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="semaine.php">Détails</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4 mr-3">
                                <div class="card-body">Semaine D</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="semaine.php">Détails</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-2 ">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Exemple</div>
                            <div class="card-body">
                                <canvas id="myAreaChart" width="100%" height="40"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Exemple</div>
                            <div class="card-body">
                                <canvas id="myBarChart" width="100%" height="40"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 ml-auto mr-auto">
                        <div class="card-header"><svg class="svg-inline--fa fa-table fa-w-16 mr-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="table" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zM224 416H64v-96h160v96zm0-160H64v-96h160v96zm224 160H288v-96h160v96zm0-160H288v-96h160v96z"></path></svg><!-- <i class="fas fa-table mr-1"></i> -->Permanences réalisées</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row"><div class="col-sm-12 col-md-6">
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="dataTable_filter" class="dataTables_filter"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTable" role="grid" aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                                                <thead>
                                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 188.35px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Prenom</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 315.7px;" aria-label="Position: activate to sort column ascending">Obligation</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 137.15px;" aria-label="Office: activate to sort column ascending">Caissier titulaire</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 65.8333px;" aria-label="Age: activate to sort column ascending">Caissier suppléant</th></tr>
                                                </thead>
                                                <tfoot>
                                                <tr><th rowspan="1" colspan="1">Prenom</th><th rowspan="1" colspan="1">Obligation</th><th rowspan="1" colspan="1">Caissier Titulaire</th><th rowspan="1" colspan="1"> Caissier Suppléant</th></tr>
                                                </tfoot>
                                                <tbody id = tableauPermRea>
                                                <tr><th></th><th></th><th></th><th></th></tr>

                                                </tbody>
                                            </table>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; CrazyCharlyDay 2020</div>
                    <div>
                        <a href="#">Politique de confidentialité</a>
                        &middot;
                        <a href="#">Termes &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="src/js/scripts.js"></script>
<script src="src/js/app.js" type="module"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="src/assets/demo/chart-area-demo.js"></script>
<script src="src/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="src/assets/demo/datatables-demo.js"></script>
</body>
</html>
<?php
}
else{
    header('Location: ./login.php');
    exit();
}
?>
