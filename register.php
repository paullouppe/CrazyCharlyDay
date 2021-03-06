<!DOCTYPE html>
<?php
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Inscription</title>
        <link href="src/css/styles.css" rel="stylesheet" />
        <link rel="icon" href="./favicon.ico">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Créer un compte</h3></div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputFirstName">Prénom</label><input class="form-control py-4" id="inputFirstName" type="text" placeholder="Entrez votre prénom" name="nom" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputLastName">Nom</label><input class="form-control py-4" id="inputLastName" type="text" placeholder="Entrez votre nom" name="prenom"/></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Entrez votre adresse mail" name="mail" /></div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Mot de passe</label><input class="form-control py-4" id="inputPassword" type="password" placeholder="Entrez votre mot de passe" name="pwd"/></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Confirmez votre mot de passe</label><input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirmez votre mot de passe" name="pwd_repeat"/></div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><input type="button" class="btn btn-primary" id="registersubmitbutton" value="Créer un compte" /></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Vous avez un compte? Connectez vous!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="src/js/scripts.js"></script>
        <script src="src/js/app.js" type="module"></script>
    </body>
</html>
<?php
?>
