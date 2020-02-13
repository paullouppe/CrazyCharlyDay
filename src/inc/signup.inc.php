<?php

$json = new JsonResponse();


if (isset($_POST['signup-submit'])) {
    session_start();

    require 'dbh.inc.php';

    $username = $_POST['nom'];
    $username = $_POST['prenom'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordrepeat = $_POST['pwd-repeat'];

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
    if (empty($username) || empty($email) || empty($password) || empty($passwordrepeat)) {
        $_SESSION['status'] = "emptyfields";
        $_SESSION['fillid'] = $username;
        $_SESSION['fillmail'] = $email;
        header("Location: ../signup.php");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $_SESSION['status'] = "invalidmailuid";
        header("Location: ../signup.php");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['status'] = "invalidmail";
        $_SESSION['fillid'] = $username;
        header("Location: ../signup.php");
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $_SESSION['status'] = "invaliduid";
        $_SESSION['fillmail'] = $email;
        header("Location: ../signup.php");
        exit();
    } else if ($password !== $passwordrepeat) {
        $_SESSION['status'] = "passwordcheck";
        $_SESSION['fillid'] = $username;
        $_SESSION['fillmail'] = $email;
        header("Location: ../signup.php");
        exit();
    } else if (!$uppercase || !$lowercase || !$number || strlen($password) < 8){
        $_SESSION['status'] = "passwordstrength";
        $_SESSION['fillid'] = $username;
        $_SESSION['fillmail'] = $email;
        header("Location: ../signup.php");
        exit();
    } else {
        $sqluserverify = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $sqlmailverify = "SELECT emailUsers FROM users WHERE emailUsers=?";
        $statementuserverify = mysqli_stmt_init($conn);
        $statementmailverify = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statementuserverify, $sqluserverify)) {
            $_SESSION['status'] = "sqlerror";
            header("Location: ../signup.php");
            exit();
        } elseif (!mysqli_stmt_prepare($statementmailverify, $sqlmailverify)){
            $_SESSION['status'] = "sqlerror";
            header("Location: ../signup.php");
            exit();
        } else {
            //userid check
            mysqli_stmt_bind_param($statementuserverify, "s", $username);
            mysqli_stmt_execute($statementuserverify);
            mysqli_stmt_store_result($statementuserverify);
            $resultCheckuserverify = mysqli_stmt_num_rows($statementuserverify);

            //mail check
            mysqli_stmt_bind_param($statementmailverify, "s", $email);
            mysqli_stmt_execute($statementmailverify);
            mysqli_stmt_store_result($statementmailverify);
            $resultCheckmailverify = mysqli_stmt_num_rows($statementmailverify);
            if ($resultCheckuserverify > 0) {
                $_SESSION['status'] = "usertaken";
                $_SESSION['fillid'] = $username;
                $_SESSION['fillmail'] = $email;
                header("Location: ../signup.php");
                exit();
            } elseif ($resultCheckmailverify > 0){
                $_SESSION['status'] = "mailtaken";
                $_SESSION['fillid'] = $username;
                $_SESSION['fillmail'] = $email;
                header("Location: ../signup.php");
                exit();
            } else {
                //insertion
                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUser) VALUES (?, ?, ?)";
                $statement = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($statement, $sql)) {
                    $_SESSION['status'] = "sqlerror";
                    header("Location: ../signup.php");
                    exit();
                } else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($statement, "sss", $username, $email, $hashedPwd);
                    mysqli_stmt_execute($statement);
                    $_SESSION['status'] = "sucess";
                    $_SESSION['filluid'] = $username;
                    header("Location: ../login.php");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($statement);
    mysqli_close($conn);
}else{
    header("Location: ../signup.php");
    exit();
}