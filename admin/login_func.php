<?php
    include '../connection/connect.php';
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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='../CSS/estilo.css'>
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <title>Login</title>
</head>
<body>
    <section id="fundo" style="display: flex; flex-direction: column;">
        <?php include '../logo_superior.php';?>
        <div class="formbox">
            <div class="form-value">
                <form action="">
                    <h2>Login Funcionario</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required>
                        <label for="">Senha</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Lembrar senha <a href="#">Esqueci minha senha :</a></label>
                    </div>
                    <button>Entrar</button>
                    <div class="register">
                        <p>Não tem uma conta?<a href="cadastro.php">Cadastre-se!</a></p>
                    </div>
                </form>
            </div>
        </div>
        <?php include '../termos_texto.php';?>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>