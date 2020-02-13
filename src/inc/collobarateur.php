<?php
require 'dbh.inc.php';


function calculercreneaucollab($jour, $debut, $conn){
    $sqlidbesoin = "SELECT * from besoin inner join creneau on creneau.idCreneau = besoin.idCreneau where creneau.jour = ? and creneau.jour = ?;";
    $statementidbesoin = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statementidbesoin, $sqlidbesoin)){
        //sqlerror
        return'sql erreur';
    }else{
        mysqli_stmt_bind_param($statementidbesoin, "si", $jour, $debut);
        mysqli_stmt_execute($statementidbesoin);
        mysqli_stmt_store_result($statementidbesoin);
        $nbidbesoin = mysqli_stmt_num_rows($statementidbesoin);

        if ($nbidbesoin == 0){
            return "";
        }elseif ($nbidbesoin == 1){
            $resultbesoin = mysqli_stmt_get_result($statementidbesoin);
            $row = mysqli_fetch_assoc($resultbesoin);
            $idbesoin = $row['id'];
            $idcreneau = $row['idcreneau'];

            $sqliduserdubesoin = "SELECT estasigne.idUser from estasigne where estasigne.idBesoin = ? and estasigne.idCreneau = ?;";
            $statementuserbesoin = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($statementuserbesoin, $sqliduserdubesoin)){
                //sqlerror
            }else{
                mysqli_stmt_bind_param($statementuserbesoin, "ii", $idbesoin, $idcreneau);
                mysqli_stmt_execute($statementuserbesoin);
                mysqli_stmt_store_result($statementuserbesoin);
                $nbbb = mysqli_stmt_num_rows($statementuserbesoin);
                if ($nbbb == 0) {
                    $sqlnombesoin = "SELECT nom from besoin where besoin.id = ?;";
                    $statementnombesoin = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($statementnombesoin, $sqlnombesoin)) {
                        //sqlerror
                        return 'sql erreur';
                    } else {
                        mysqli_stmt_bind_param($sqlnombesoin, "i", $idbesoin);
                        $result = mysqli_stmt_get_result($conn);
                        $row = mysqli_fetch_assoc($result);
                        $besoin = $row['pwd'];
                        return "<a class=\"small text-white \" >$besoin</a><a class=\"small text-white \" href=\"inscrire.php\">s'ajouter</a>";
                    }
                }
                else{
                    $sqlidUser = "SELECT idUser from estassigne where estassigne.idCreneau = ?;";
                    $statementidUser = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($statementidUser, $sqlidUser)) {
                        //sqlerror
                        return 'sql erreur';
                    } else {
                    }
                        mysqli_stmt_bind_param($sqlidUser, "i", $idcreneau);
                        $result = mysqli_stmt_get_result($conn);
                        $row = mysqli_fetch_assoc($result);
                        $id = $row['pwd'];
                        if($id==$_SESSION['userId'])
                             return "<a class=\"small text-white \" href=\"inscrire.php\">se retirer</a>";
                        else
                            return"";
                }
            }
        }

    }

}
