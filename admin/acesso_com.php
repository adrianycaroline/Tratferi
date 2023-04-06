<?php 
    session_name('usuario');
    if(!isset($_SESSION)){
        session_start();
    }
    // segurança digital...
    
    // verificar se o usuário está logado na sessão
    if($_SESSION['login'] != "tratferi") {
        // se não existir, redirecionamos a sessão por segurança
        header('location: ../admin/verifica.php');
        exit;
    }

    $nome_da_sessao = session_name();
    if(!isset($_SESSION['nome_da_sessao'])
        or ($_SESSION['nome_da_sessao']!=$nome_da_sessao))
     {
        session_destroy();
        header('location: ../admin/verifica.php');
        exit;
    }
?>
