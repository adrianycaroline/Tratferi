<?php
   include '../connection/connect.php';

    //Iniciar a verificação do login
      if($_POST){
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];
        $loginRes = $conn->query("SELECT funcionario.id as id, funcionario.imagem as imagem, 
        funcionario.nome as nome, funcionario.cpf as cpf, funcionario.adm as adm, Login_func.senha as senha 
        FROM Login_func
        inner join funcionario ON (Login_func.id_func = funcionario.id) where cpf = '$cpf' AND senha = '$senha'");
        $rowLogin = $loginRes->fetch_assoc();
        $numRow = mysqli_num_rows($loginRes);
        // se a sessão existir ou não
        if ($numRow>0){
            // Criação das variáveis globais
            $_SESSION['cpf'] = $login;
            session_start();
            $_SESSION['Id'] = $rowLogin['id'];
            $_SESSION['nome'] = $rowLogin['nome'];
            $_SESSION['Cpf'] = $rowLogin['cpf'];
            $_SESSION['Imagem'] = $rowLogin['imagem'];
            // Verifica se o funcionario é Administrador ou não
            if($rowLogin['adm'] =='adm'){
                $_SESSION['login'] = "tratferiAdm";
                echo "<script>window.open('../admin/index.php','_self')</script>";
            }  
            else if($rowLogin['adm'] == 'func'){
                $_SESSION['login'] = "tratferiFun";
                echo "<script>window.open('../func/index.php?funcionario=".$login."','_self')</script>";
            }
            //Caso não retorne informação do banco
        }else{
            echo "<script>alert('Senha ou CPF incorretos!');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="30;URL= ../index.php">
    <link rel="stylesheet" href='../CSS/estilo.css'>
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <title>Login Funcionario</title>
</head>
<body>
    <section id="fundo" style="display: flex; flex-direction: column;">
        <?php include '../logo_superior.php';?>
        <div class="formbox">
            <div class="form-value">
                <form action="login_func.php" method="post">
                    <h2>Login Funcionario</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="cpf" placeholder="Digite o seu CPF..." id="cpf" onkeypress="$(this).mask('000.000.000-00');" required>
                        <label for="">CPF</label>
                    </div>
                    <div class="inputbox show-password">
                        <input type="password" name="senha" placeholder="Digite a sua Senha..." id="senha" required>
                        <label for="">Senha</label>
                        <ion-icon name="eye-outline" type="button" style="cursor: pointer;" onclick="mostrarSenha()"></ion-icon>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Lembrar senha <a href="recuperacao.php">Esqueci minha senha :</a></label>
                    </div>
                    <button id="loginBtn">Entrar</button>
                </form>
            </div>
        </div>
        <?php include '../termos_texto.php';?>
    </section>
</body>
    <!-- Links para a Biblioteca de icones do Ionic Icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- links para bootstrap e o onkeypress funcionar -->
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