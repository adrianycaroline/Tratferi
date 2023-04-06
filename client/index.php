<?php 
    include '../admin/acesso_com.php';
    if(!isset($_GET["acesso"])){
        header('location: ../admin/verifica.php');
        exit;
    }
?>