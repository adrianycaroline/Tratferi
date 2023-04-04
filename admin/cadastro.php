<?php
 include '../connection/connect.php';
 if($_POST){
    if($_Get['acesso']==p){
        // iniciar o cadastro
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $email = $_POST['cpf'];
        $loginRes = $conn->query("insert into pacientes (nome, )");
       $rowLogin = $loginRes->fetch_assoc();
       $numRow = mysqli_num_rows($loginRes);
   
    }else($_Get['acesso']==f){

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
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <title>Cadastro</title>
</head>
<body>
    <section id="fundo_cli" style="display: flex; flex-direction: column;">
        <?php include '../logo_superior.php'?>
        <div id="formbox-cadastro">
            <div class="form-value">
                <form action="prosseguir.php">
                    <h2>Cadastro</h2>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="nome" required>
                        <label for="">Nome</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="email" name="email" required>
                        <label for="">E-mail</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="wallet-outline"></ion-icon>
                        <input type="text" name="cpf" onkeypress="$(this).mask('000.000.000-00');" required>
                        <label for="">CPF</label>
                    </div>
                    <button action="">Prosseguir</button>
                    <div class="register">
                    </div>
                </form>
            </div>
        </div>
        <?php include '../termos_texto.php';?>
    </section>
</body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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
    <script>
        function mostrarSenha2() {
            var senha2 = document.getElementById("senha2");
            if (senha2.type === "password") {
            senha2.type = "text";
            } else {
            senha2.type = "password";
            }
        }
    </script>
</html>