<?php 
    session_name('tratferi');
    session_start();
    session_destroy();
    header('location: ../admin/login_cliente.php');
    exit;
?>