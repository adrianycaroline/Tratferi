<?php
include '../admin/acesso_com_fun.php';
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
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <title>Alterar Consulta</title>
</head>
<body class="fundo_areas">
<div class="barra fixed-top" style="background-color: #38B6FF;">
        <br><br>
 </div>
 <br><br>
<div class="container mt-4 d-flex justify-content-center">
        <div class="card" style="width: 50%;">
            <h1 class="card-header text-center" style="color: #38B6FF;">Alterar consulta</h1>
            <div class="card-body">
                <!-- Formulário de Cadastro de Funcionário -->
                <form class="container" style="display: flex; justify-content: flex-start; flex-direction: column;" action="../func/gerar_consultas.php" method="post" name="form_funcionario_cadastro" enctype="multipart/form-data" onsubmit="return validaForm() && validaFormPeriodo()">
                    <div class="form-row" style="display: flex; justify-content: center; flex-direction: column;">
                        <div class="form-group">
                            <label for="nome">Nome do paciente</label>
                            <input type="text" name="nome" maxlength="50" class="form-control" id="nome" placeholder="Digite o nome do paciente completo " required>
                        </div>
                        <br>
                    </div>
                    <div class="form-row" style="display: flex; justify-content: center; flex-direction: column;">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" maxlength="50" class="form-control" id="cpf" placeholder="Digite o cpf do paciente" onkeypress="$(this).mask('000.000.000-00');"  required>
                        </div>
                        <br>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="descricao">Descriçâo</label>
                            <textarea type="text" name="comentario_contato" cols="30" rows="5" aria-describedby="basic-addon1" class="form-control" required></textarea>
                        </div>
                        <br>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="pf_resp">Profissional responsável</label>
                            <input type="text" name="pf_resp" class="form-control" id="pf_resp" required>
                        </div>
                        <br>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="horario">Horário</label>
                            <input type="text" name="horario" class="form-control" id="horario" required>
                        </div>
                        <br>
                    </div>
                    <div class="form-group ">
                            <label for="data">Data</label>
                            <input type="date" name="data" class="form-control" id="data" required>
                    </div>
                    <br>
                    <label class="text-center">Prioridade:</label>
                    <br>
                    <div class="btn-group d-flex gap-2" role="group" aria-label="Basic mixed styles example">
                        <button type="button" onclick="botao_grave()" class="btn btn-danger">Muito Grave</button>
                        <button type="button" onclick="botao_urgente()" class="btn" style="background-color: #ffa500;">Urgente</button>
                        <button type="button" onclick="botao_moderado()" class="btn" style="background-color: #ffff00;">Moderado</button>
                        <button type="button" onclick="botao_menos_grave()" class="btn" style="background-color: #66CDAA; color: #000;">Menos grave</button>
                        <button type="button" onclick="botao_leve()" class="btn" style="background-color: #38B6FF;">Leve</button>
                    </div>
                    <?php echo $_SESSION['button'];?>
                    <br>
                    <button class="btn" type="submit" style="background-color: #38B6FF;">Alterar consulta</button>
                </form>
            </div>
        </div>
    </div>
    <!-- --------------------- -->
        <?php include 'menu_cadastrar.php';?>
        <script>
                   function  botao_grave() {
                        $_SESSION['button'] = "grave";
                    }
                    function botao_urgente() {
                        $_SESSION['button'] = "urgente";
                    }
                    function botao_moderado() {
                        $_SESSION['button'] = "moderado";
                    }
                    function botao_menos_grave() {
                        $_SESSION['button'] = "menos_grave";
                    }
                    function botao_leve() {
                        $_SESSION['button'] = "leve";
                    } 
        </script>
</body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Links para jquery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</html>