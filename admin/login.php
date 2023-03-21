<?php 
    include '../connection/connect.php';
      // iniciar a verificação do login
      if($_POST){
        $email = $_POST['email'];
        $senha = md5($_POST['senha_usuario']);
        $loginRes = $conn->query("select * from tbusuarios where login_usuario = '$login' and senha_usuario = '$senha'");
        $rowLogin = $loginRes->fetch_assoc();
        $numRow = mysqli_num_rows($loginRes);
        // se a sessão não existir
        if(!isset($_SESSION)){
            $sessaoAntiga = session_name('chulettaaa');
            session_start();
            $session_name_new = session_name();
        }
        if($numRow>0){
            $_SESSION['login_usuario'] = $login;
            $_SESSION['nivel_usuario'] = $rowLogin['nivel_usuario'];
            $_SESSION['nome_da_sessao'] = session_name();
            if($rowLogin['nivel_usuario']=='sup'){
                echo "<script>window.open('index.php','_self')</script>";
            }else{
                echo "<script>window.open('../cliente/index.php?cliente=".$login."','_self')</script>";
            }
        }else{
            echo "<script>window.open('invasor.php','_self')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='../CSS/estilo.css'>
    <title>teste</title>
</head>
<body>
    <section>
        <div class="formbox">
            <div class="form-value">
                <form action="">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" required>
                        <label for="">E-mail</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="">Senha</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Lembrar senha <a href="#">Esqueci minha senha :</a></label>
                      
                    </div>
                    <button>Entrar</button>
                    <div class="register">
                        <p>Não tem uma conta?<a href="#">Cadastre-se!</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>