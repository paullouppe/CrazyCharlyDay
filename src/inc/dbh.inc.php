<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "crazycharlyday";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

function getConn(){
    return $this->conn;
}

if (!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

