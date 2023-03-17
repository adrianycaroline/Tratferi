<?php

$host = "localhost";
$database = "tratferi";
$user = "root";
$pass = "";
$charset = "utf8";
$port = "3306";

$conn = new mysqli($host, $user, $pass, $database, $port);
mysqli_set_charset($conn, $charset);

if($conn->connect_error){
    echo "Atenção ERRO: " . $conn->connect_error;
}

?>