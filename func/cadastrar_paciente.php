<?php
 include '../connection/connect.php';
 if($_POST){
        // iniciar o cadastro
        $nome = $_POST['nome'];
        $data = $_POST['data_nasc'];
        // $now_format = $data->format('Y-m-d');
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $sus = $_POST['card_sus'];
        $hashcode = "TRAT-".uniqid()."-".mb_strimwidth($cpf,0,3);
        if($sus == ""){
        $loginRes = $conn->query("insert into paciente (nome, data_nasc, cpf, rg, card_SUS, imagem, hash) values('$nome', '$data', '$cpf', '$rg', 'null', 'null', '$hashcode')");
        echo "<script>window.open('pacientes_lista.php?cadastro=s','_self')</script>"; 
        }
        elseif($sus != ""){
        $loginRes = $conn->query("insert into paciente (nome, data_nasc, cpf, rg, card_SUS, imagem, hash) values('$nome', '$data', '$cpf', '$rg', '$sus', 'null', '$hashcode')");
        echo "<script>window.open('pacientes_lista.php?cadastro=s','_self')</script>";
    }
}      
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="200;URL= ../index.php">
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
        <div id="formbox-cadastro" class="sombra">
            <div class="form-value">
                <form action="cadastrar_paciente.php" method="post">
                    <h2>Cadastro</h2>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="nome" required>
                        <label for="">Nome</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="date" name="data_nasc" required>
                        <label for="">Data de Nascimento</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="wallet-outline"></ion-icon>
                        <input type="text" name="cpf" onkeypress="$(this).mask('000.000.000-00');" required>
                        <label for="">CPF</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="text" name="rg" onkeypress="$(this).mask('00.000.000-0');" required>
                        <label for="">RG</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="text" name="card_sus">
                        <label for="">Cartão SUS</label>
                    </div>
                    <button type="submit">Prosseguir</button>
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