<?php 
    include '../connection/connect.php';
    $conn->query("delete from funcionario where id = ".$_GET['id']);
    header("location: funcionarios_arquivados.php");
?>