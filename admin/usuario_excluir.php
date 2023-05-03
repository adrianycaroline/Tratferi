<?php 
    include '../connection/connect.php';
    $Id = $_GET['id'];
    $conn->query("DELETE p, t, e, end
    FROM funcionario p
    LEFT JOIN tel_func t ON (p.id = t.id_func)
    LEFT JOIN email_func e ON (p.id = e.id_func)
    LEFT JOIN end_func end ON (p.id = end.id_func)
    WHERE p.id = '$Id'");
    header("location: funcionarios_arquivados.php");
?>