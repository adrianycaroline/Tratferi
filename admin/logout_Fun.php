<?php 
    session_name('tratferiFun' || 'tratferiAdm');
    session_start();
    session_destroy();
    header('location: ../admin/login_func.php');
    exit;
?>