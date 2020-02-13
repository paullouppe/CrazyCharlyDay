<?php

require_once 'JsonResponse.php';

$json = new JsonResponse();


if (isset($_POST['nom'])) {
    session_start();
    require 'dbh.inc.php';

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordrepeat = $_POST['pwd-repeat'];
    $grade = "";

    //sanitizing
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    //un peu hardcore quand même
    //$specialChars = preg_match('@[^\w]@', $password);

    //errors
    if (empty($prenom) || empty($nom) || empty($email) || empty($password) || empty($passwordrepeat)) {
        $json->addError("emptyfields");
        echo $json->getJson();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $json->addError("invalidmailuid");
        echo $json->getJson();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $json->addError("invalidmail");
        echo $json->getJson();
    } else if ($password !== $passwordrepeat) {
        $json->addError("passwordcheck");
        echo $json->getJson();
    } else if (!$uppercase || !$lowercase || !$number || strlen($password) < 8){
        $json->addError("passwordstrength");
        echo $json->getJson();
    } else {
        $sqlmailverify = "SELECT mail FROM user WHERE mail=?";
        $statementmailverify = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statementmailverify, $sqlmailverify)){
            $json->addError("sqlerror");
            echo $json->getJson();
        } else {

            //mail check
            mysqli_stmt_bind_param($statementmailverify, "s", $email);
            mysqli_stmt_execute($statementmailverify);
            mysqli_stmt_store_result($statementmailverify);
            $resultCheckmailverify = mysqli_stmt_num_rows($statementmailverify);
            if ($resultCheckmailverify > 0){
                $json->addError("mailtaken");
                echo $json->getJson();
            } else {
                //insertion
                $sql = "INSERT INTO user (prenom, nom, mail, pwd, grade) VALUES (?, ?, ?, ?, ?)";
                $statement = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($statement, $sql)) {
                    $json->addError("sqlerror");
                    echo $json->getJson();
                } else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($statement, "sssss", $prenom, $nom, $email, $hashedPwd, $grade);
                    mysqli_stmt_execute($statement);
                    $json->addSucess();
                    echo $json->getJson();
                }
            }
        }
    }
    mysqli_stmt_close($statement);
    mysqli_close($conn);
}else{
    $json->addError("cant access");
    echo $json->getJson();
}