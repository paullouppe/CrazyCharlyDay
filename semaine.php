<!DOCTYPE html>
<?php
session_start();
require 'src/inc/dbh.inc.php';
require 'src/inc/administrateur.php';
if (isset($_SESSION['userId'])){
    if (isset($_SESSION['grade']) && $_SESSION['grade'] == "admin"){


?>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Semaine</title>
    <link rel="icon" href="./favicon.ico">
    <link href="src/css/styles.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
          crossorigin="anonymous"/>
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
        <!--<div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>-->
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
                    <div class="sb-sidenav-menu-heading">Core</div>
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
                                            class="nav-link" href="register.php">Inscription</a></nav>
                            </div>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                 data-parent="#sidenavAccordionPages">
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Connecté(e) en tant que:</div>
                <?php
                echo $_SESSION['prenom'];
                ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Co Board Admin</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Co Board</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Lundi</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white " >Crénaux de 18h à 19h</p>
                                <?php
                                echo calculercreneau("Lundi", 18, $conn);
                                ?>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white ">Crénaux de 19h à 20h</p>
                                <?php
                                echo calculercreneau("Lundi", 19, $conn);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Mardi</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Mercredi</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white " ">Crénaux de 10h à 11h</p>
                                <?php
                                echo calculercreneau("Mercredi", 10, $conn);
                                ?>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white ">Crénaux de 11h à 12h</p>
                                <?php
                                echo calculercreneau("Mercredi", 11, $conn);
                                ?>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white " >Crénaux de 18h à 19h</p>
                                <?php
                                echo calculercreneau("Mercredi", 18, $conn);
                                ?>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white ">Crénaux de 19h à 20h</p>
                                <?php
                                echo calculercreneau("Mercredi", 19, $conn);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Jeudi</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Vendredi</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white " >Crénaux de 18h à 19h</p>
                                <?php
                                echo calculercreneau("Vendredi", 18, $conn);
                                ?>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white " >Crénaux de 19h à 20h</p>
                                <?php
                                echo calculercreneau("Vendredi", 19, $conn);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Samedi</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white " >Crénaux de 10h à 11h</p>
                                <?php
                                echo calculercreneau("Samedi", 10, $conn);
                                ?>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white " >Crénaux de 11h à 12h</p>
                                <?php
                                echo calculercreneau("Samedi", 11, $conn);
                                ?>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white " >Crénaux de 13h à 14h</p>
                                <?php
                                echo calculercreneau("Samedi", 13, $conn);
                                ?>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white " >Crénaux de 14h à 15h</p>
                                <?php
                                echo calculercreneau("Samedi", 14, $conn);
                                ?>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white " >Crénaux de 15h à 16h</p>
                                <?php
                                echo calculercreneau("Samedi", 15, $conn);
                                ?>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white " >Crénaux de 16h à 17h</p>
                                <?php
                                echo calculercreneau("Samedi", 16, $conn);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Dimanche</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white " >Crénaux de 10h à 11h</p>
                                <?php
                                echo calculercreneau("Dimanche", 10, $conn);
                                ?>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white " >Crénaux de 11h à 12h</p>
                                <?php
                                echo calculercreneau("Dimanche", 11, $conn);
                                ?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="src/assets/demo/chart-area-demo.js"></script>
<script src="src/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="src/assets/demo/datatables-demo.js"></script>
</body>
</html>
<?php
}else{
        ?>







    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>Semaine</title>
        <link rel="icon" href="./favicon.ico">
        <link href="src/css/styles.css" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
              crossorigin="anonymous"/>
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
            <!--<div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>-->
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
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php"
                        >
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Co Board (admin)</a
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
                                                class="nav-link" href="register.php">Inscription</a></nav>
                                </div>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                     data-parent="#sidenavAccordionPages">
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Connecté(e) en tant que:</div>
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
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Lundi</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white " href="semaine.php">Crénaux de 18h à 19h</a>
                                    <?php
                                     echo calculercreneau("Lundi", 18, $conn);
                                    ?>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white " href="semaine.php">Crénaux de 19h à 20h</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Mardi</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Mercredi</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white " href="semaine.php">Crénaux de 10h à 11h</a>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white " href="semaine.php">Crénaux de 11h à 12h</a>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white " href="semaine.php">Crénaux de 18h à 19h</a>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white " href="semaine.php">Crénaux de 19h à 20h</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Jeudi</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Vendredi</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white " href="semaine.php">Crénaux de 18h à 19h</a>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white " href="semaine.php">Crénaux de 19h à 20h</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Samedi</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white " href="semaine.php">Crénaux de 10h à 11h</a>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white " href="semaine.php">Crénaux de 11h à 12h</a>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white " href="semaine.php">Crénaux de 13h à 14h</a>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white " href="semaine.php">Crénaux de 14h à 15h</a>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white " href="semaine.php">Crénaux de 15h à 16h</a>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white " href="semaine.php">Crénaux de 16h à 17h</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Dimanche</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white " href="semaine.php">Crénaux de 10h à 11h</a>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white " href="semaine.php">Crénaux de 11h à 12h</a>
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
}
else{
    header('Location: ./login.php');
    exit();
}
?>
