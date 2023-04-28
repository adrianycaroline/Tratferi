<?php
 include '../connection/connect.php'; 
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
<body class="fundo_areas">
<div class="barra fixed-top" style="background-color: #38B6FF;">
        <br> <br>
 </div>
 <br><br>
<div class="container mt-4 d-flex justify-content-center">
        <div class="card" style="width: 50%;">
            <h1 class="card-header text-center" style="color: #38B6FF;">Gerar nova consulta</h1>
            <div class="card-body">
                <!-- Formulário de Cadastro de Funcionário -->
                <form class="container" style="display: flex; justify-content: flex-start; flex-direction: column;" action="../func/cadastrar_paciente.php" method="post" name="form_funcionario_cadastro" enctype="multipart/form-data" onsubmit="return validaForm() && validaFormPeriodo()">
                    <div class="form-row" style="display: flex; justify-content: center; flex-direction: column;">
                        <div class="form-group">
                            <label for="nome">Nome do paciente</label>
                            <input type="text" name="nome" maxlength="50" class="form-control" id="nome" placeholder="Digite o nome do paciente completo " required>
                        </div>
                        <br>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="card_SUS">Descriçâo</label>
                            <input type="text" name="card_SUS" class="form-control" id="card_SUS"required>
                        </div>
                        <br>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="cpf">Profissional esponsável</label>
                            <input type="text" name="cpf" class="form-control" id="cpf" required>
                        </div>
                        <br>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="rg">Horário</label>
                            <input type="text" name="rg" class="form-control" id="rg" required>
                        </div>
                        <br>
                    </div>
                    <div class="form-group ">
                            <label for="data_nasc">Data</label>
                            <input type="date" name="datac" class="form-control" id="data" required>
                    </div>
                    <br>
                    <label class="text-center">Prioridade:</label>
                    <br>
                    <button class="btn" type="submit" style="background-color: #38B6FF;">Agendar consulta</button>
                </form>
            </div>
        </div>
    </div>
    <!-- --------------------- -->
        <?php include 'menu_cadastrar.php';?>
</body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>