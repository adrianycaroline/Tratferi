<?php
    if(!isset($_SESSION)){
        session_start();
    }
    // segurança digital...
    
    // verificar se o usuário está logado na sessão
    if($_SESSION['login'] != "tratferi") {
        // se não existir, redirecionamos a sessão por segurança
        header('location: ../admin/login_cliente.php');
        exit;
    }
?>