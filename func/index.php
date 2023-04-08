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
    <title>Área do Funcionário - <?php echo($_SESSION['nome']); ?></title>
</head>
<body class="fundo_areas" onload="atualizarHoras()">
    <?php 
        include '../func/menu_fun.php';
    ?>
</body>
<script src="../js/script.js"></script>
</html>