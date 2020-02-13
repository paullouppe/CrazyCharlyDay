<?php
require 'dbh.inc.php';
$json = array();
$sql = "Select * from User";
$statement = mysqli_stmt_init($conn);
mysqli_stmt_prepare($statement, $sql);
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);

while ($row = mysqli_fetch_assoc($result)){
    $sql2 = "SELECT count(*) FROM estasigne where idUser = ?";
    $statement2 = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement2, $sql2);
    mysqli_stmt_bind_param($statement2, "s", $row["idUser"]);
    mysqli_stmt_execute($statement2);
    $result2 = mysqli_stmt_get_result($statement2);
    $c = 0;
    while ($row2 = mysqli_fetch_assoc($result2)){$c;}
    $json[]= array($row["prenom"],$c,$c,$c);
}

$x = json_encode($json);

echo $x;