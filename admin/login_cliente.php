<?php
 include '../connection/connect.php';
       // iniciar a verificação do login
       if($_POST){
         $cpf = $_POST['cpf'];
         $senha = $_POST['password'];
         $loginRes = $conn->query("SELECT paciente.cpf as cpf, Login_paci.senha as senha FROM Login_paci
         inner join paciente ON(Login_paci.id_paci = paciente.id) where cpf = '$cpf' and senha = '$senha'");
        $rowLogin = $loginRes->fetch_assoc();
        $numRow = mysqli_num_rows($loginRes);
        // se a sessão existir ou não

         if(!isset($_SESSION)){
             $sessaoAntiga = session_name('usuario');
             session_start();
             $session_name_new = session_name();
        }
        if ($numRow>0){
            $_SESSION['cpf'] = $cpf;
            $_SESSION['nome_da_sessao'] = session_name();
            if($rowLogin['cpf'] == $cpf){
                echo "<script>window.open('../client/index.php','_self')</script>";
            } else {
            echo "<script>window.open('../admin/login_cliente.php','_self')</script>"; 
        }
        } else{
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    
    <title>Login</title>
</head>
<body>
    <section id="fundo_cli" style="display: flex; flex-direction: column;">
        <?php include '../logo_superior.php';?>

        <div class="formbox">
            <div class="form-value">
                <form action="login_cliente.php" method="post">
                    <h2>Login Paciente</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="cpf" onkeypress="$(this).mask('000.000.000-00');" required>
                        <label for="">CPF</label>
                    </div>
                    <div class="inputbox show-password">
                        <input type="password" name="password" id="senha" required>
                        <label for="">Senha</label>
                        <ion-icon name="eye-outline" type="button" style="cursor: pointer;" onclick="mostrarSenha()"></ion-icon>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Lembrar senha <a href="recuperacao.php">Esqueci minha senha :</a></label>
                    </div>
                    <button>Entrar</button>
                    <div class="register">
                        <p>Não tem uma conta?<a href="cadastro.php?acesso=c">Cadastre-se!</a></p>
                    </div>
                </form>
            </div>
        </div>
        <?php include '../termos_texto.php';?>
    </section>
</body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
        function mostrarSenha() {
            var senha = document.getElementById("senha");
            if (senha.type === "password") {
            senha.type = "text";
            } else {
            senha.type = "password";
            }
        }
    </script>
</html>