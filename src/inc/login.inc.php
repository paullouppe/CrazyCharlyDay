<?php

require_once 'JsonResponse.php';

$json = new JsonResponse();

if( isset($_POST['mail']) && isset($_POST['pwd'])){
    session_start();
    require 'dbh.inc.php';

    $mail = $_POST['mail'];
    $password = $_POST['pwd'];


    //sanitizing
    $username = filter_var($mail, FILTER_SANITIZE_STRING);


    if (empty($mailuid) || empty($password)){
        //erreur emptyfields
        $json->addError("emptyfields");
        echo $json->getJson();
    }else{
        //seulement le uid
        $sql = "SELECT * FROM user WHERE mail=?;";
        $statement = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statement, $sql)){
            //sqlerror
            $json->addError("sqlerror");
            echo $json->getJson();
        }else{
            mysqli_stmt_bind_param($statement, "s", $mail);
            mysqli_stmt_execute($statement);
            $result = mysqli_stmt_get_result($statement);
            if ($row = mysqli_fetch_assoc($result)){
                $pwdcheck = password_verify($password, $row['pwd']);
                if ($pwdcheck == false){
                   //error wrong password
                    $json->addError("wrongpassword");
                    echo $json->getJson();
                }elseif ($pwdcheck == true){
                    session_start();
                    $_SESSION['userId'] = $row['idUser'];
                    header("Location : ../../index.html");
                    $json->addSucess();
                    return $json->getJson();
                }else{
                    //unhandeled
                    $json->addError("unheandeled");
                    echo $json->getJson();
                }
            }else{
                //nouser
                $json->addError("nouser");
                echo $json->getJson();
            }
        }

    }


}else{
    //error cant access
    $json->addError("cant access");
    echo $json->getJson();
}

