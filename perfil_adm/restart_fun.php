<?php

    // Salva os dados da sessão que serão restaurados
    $RecuperaID = $_SESSION['Id'];
    $RecuperaNome = $_SESSION['nome'];
    $RecuperaCpf = $_SESSION['Cpf'];
    $RecuperaIMG = $_SESSION['Imagem'];
    $RecuperaADM = $_SESSION['adm'];
    
    session_reset(); // Redefine a sessão para o seu estado anterior
    $_SESSION['Id'] = $RecuperaID;
    $_SESSION['nome'] = $RecuperaNome;
    $_SESSION['Cpf'] = $RecuperaCpf;
    $_SESSION['Imagem'] = $RecuperaIMG;
    $_SESSION['adm'] = $RecuperaADM;
    
    // Redireciona para a página de configuração do perfil
    header('location: config_perfil.php');
?>
