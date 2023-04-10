<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    // segurança digital...
    
    // verificar se o usuário está logado na sessão
    if(($_SESSION['login'] != "tratferiFun")  &&  ($_SESSION['login'] != "tratferiAdm")){
        // se não existir, redirecionamos a sessão por segurança
        header('location: ../admin/login_func.php');
        exit;
    }
?>
