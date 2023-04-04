<!DOCTYPE html>
<html lang="pt-BR">
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
    <title>Prosseguir</title>
</head>
<body>
<section id="fundo_cli" style="display: flex; flex-direction: column;">
        <?php include '../logo_superior.php'?>
        <div id="formbox-cadastro">
            <div class="form-value">
                <form action="cod_verificacao.php">
                    <h2>Crie uma Senha</h2>
                    <div class="inputbox show-password">
                        <input type="password" name="password" id="senha" required>
                        <label for="">Senha</label>
                        <ion-icon name="eye-outline" type="button" style="cursor: pointer;" onclick="mostrarSenha()"></ion-icon>
                    </div>
                    <div class="inputbox show-password">    
                        <input type="password" name="password" id="senha2" required>
                        <label for="">Confirmar senha</label>
                        <ion-icon name="eye-outline" type="button" style="cursor: pointer;" onclick="mostrarSenha2()"></ion-icon>
                    </div>
                    <button >Prosseguir</button>
                    <div class="register">
                    </div>
                </form>
            </div>
        </div>
        <?php include '../termos_texto.php';?>
    </section>
    
</body>
<script>
    document.querySelector('button').addEventListener('click', function(event) {
    var senha1 = document.getElementById('senha').value;
    var senha2 = document.getElementById('senha2').value;
    if (senha1 !== senha2) {
        event.preventDefault();
        alert('As senhas não são iguais.');
    }
});
function mostrarSenha() {
            var senha = document.getElementById("senha");
            if (senha.type === "password") {
            senha.type = "text";
            } else {
            senha.type = "password";
            }
        }
function mostrarSenha2() {
            var senha = document.getElementById("senha2");
            if (senha.type === "password") {
            senha.type = "text";
            } else {
            senha.type = "password";
            }
}
</script>
</html>