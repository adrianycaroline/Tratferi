<?php 
    session_name('tratferiFun');
    session_start();
    session_destroy();
    header('location: ../index.php');
    exit;
?>