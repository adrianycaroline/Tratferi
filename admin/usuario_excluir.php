<?php 
    include '../connection/connect.php';
    $conn->query("delete from funcionario where id = ".$_GET['id']);
    header("location: listar_funcionarios.php");
?>