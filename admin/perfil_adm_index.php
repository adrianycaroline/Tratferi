<?php 
    include '../admin/acesso_com_fun.php';
    include '../connection/connect.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Configurações de Perfil - <?php echo $_SESSION['nome']; ?></title>
</head>
<body>
    <!-- Inicio do Menu lateral -->
    <?php include '../admin/perfil_adm_menu.php';?>
    <!-- Final do Menu Lateral -->
</body>
</html>