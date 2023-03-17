<?php
include '../conn/connect.php';
 // iniciar a verificação do login
if($_POST){
    $login = $_POST['login_usuario'];
    $senha = md5($_POST['senha_usuario']);
    $loginRes = $conn->query("select * from tbusuarios where login_usuario = '$login' and senha_usuario = '$senha'");
    $rowLogin = $loginRes->fetch_assoc();
    $numRow = mysqli_num_rows($loginRes);
    // se a sessão não existir 
    if(!isset($_SESSION)){
        $sessionAntiga = session_name('chulettaaa');
        session_start();
        $session_name_new = session_name();
    }
    if ($numRow>0){
        $_SESSION['login_usuario'] = $login;
        $_SESSION['login_usuario'] = $rowLogin['nivel_usuario'];
        $_SESSION['nome_da_sessao'] = session_name();
        if($rowLogin['nivel_usuario'] =='func'){
            echo "<script>window.open('index.php','_self')</script>";
            
        }  
    else{
    echo "<script>window.open('../client/index.php?cliente=".$login."','_self')</script>";
    }
    }else{
    echo "<script>window.open('invasor.php','_self')</script>";      
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="30;URL=../index.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/2495680ceb.js" crossorigin="anonymous"></script>
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/estilo.css" type="text/css">
    <title>Login</title>
</head>

<body>
    <main>
        
    </main>
</body>
    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>


</html>