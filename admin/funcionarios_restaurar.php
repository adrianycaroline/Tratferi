<?php 
    include '../connection/connect.php';
    $conn->query("update funcionario set ativo = 1 where id = ".$_GET['id']);
    header("location: funcionarios_arquivados.php");
?>