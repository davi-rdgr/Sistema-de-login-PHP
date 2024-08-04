<?php

$host = "localhost";
$user = "root";
$pass = "";
$bd = "senhas";

$mysqli = new mysqli($host, $user, $pass, $bd);

if($mysqli->connect_errno) {
    echo "Coneção falha" . $mysqli->connect_errno;
    exit();
}

?>