<?php
require 'dbh.inc.php';


function calculercreneau($jour, $debut, $conn){
    $sqlidbesoin = "SELECT * from besoin inner join creneau on creneau.idCreneau = besoin.idCreneau where creneau.jour = ? and creneau.jour = ?;";
    $statementidbesoin = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statementidbesoin, $sqlidbesoin)){
        //sqlerror
        return'oui';
    }else{
        mysqli_stmt_bind_param($statementidbesoin, "si", $jour, $debut);
        mysqli_stmt_execute($statementidbesoin);
        mysqli_stmt_store_result($statementidbesoin);
        $nbidbesoin = mysqli_stmt_num_rows($statementidbesoin);

        if ($nbidbesoin == 0){
            return "<a class=\"bg-secondary text-white \" href=\"ajouterbesoin.php\">Ajouter besoin</a>";
        }elseif ($nbidbesoin == 1){
            $resultbesoin = mysqli_stmt_get_result($statementidbesoin);
            $row = mysqli_fetch_assoc($resultbesoin);
            $idbesoin = $row['id'];
            $idcreneau = $row['idcreneau'];

            $sqliduserdubesoin = "SELECT idUser from estasigne where estasigne.idBesoin = ? and estasigne.idCreneau = ?;";
            $statementuserbesoin = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($statementuserbesoin, $sqliduserdubesoin)){
                //sqlerror
            }else{
                mysqli_stmt_bind_param($statementuserbesoin, "ii", $idbesoin, $idcreneau);
                mysqli_stmt_execute($statementuserbesoin);
                mysqli_stmt_store_result($statementuserbesoin);
                $nbuserpourcebesoin = mysqli_stmt_num_rows($statementuserbesoin);
                if ($nbuserpourcebesoin == 0){
                    $sqlnombesoin = "select nom from besoin where idBesoin = ?";
                    $statementnombesoin = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($statementnombesoin, $sqlnombesoin)){
                        //sqlerror
                    }else {
                        mysqli_stmt_bind_param($statementnombesoin, "i", $idbesoin);
                        mysqli_stmt_execute($statementnombesoin);
                        $resultnombesoin = mysqli_stmt_get_result($statementnombesoin);
                        $row = mysqli_fetch_assoc($resultnombesoin);
                        $nombesoin = $row['nom'];
                        return "<p>".$nombesoin."</p><a class=\"small text-white \" href=\"modifierbesoin.php\">Ajouter besoin</a>";
                    }
                }
                else{
                    $sqlnombesoin = "select nom from besoin where idBesoin = ?";
                    $statementnombesoin = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($statementnombesoin, $sqlnombesoin)){
                        //sqlerror
                    }else {
                        mysqli_stmt_bind_param($statementnombesoin, "i", $idbesoin);
                        mysqli_stmt_execute($statementnombesoin);
                        $resultnombesoin = mysqli_stmt_get_result($statementnombesoin);
                        $row = mysqli_fetch_assoc($resultnombesoin);
                        $nombesoin = $row['nom'];
                        return "<p>".$nombesoin."nom personne qui s'en occupe</p>";
                    }
                }
            }
        }

    }

}
