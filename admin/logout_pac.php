<?php 
    session_name('tratferi');
    session_start();
    session_destroy();
    header('location: ../index.php');
    exit;
?>