<?php 
    include '../admin/acesso_com_fun.php';
    include '../connection/connect.php'; 

    if ($_POST){
        $nome = $_POST['nome'];
        $remedio = $_POST['remedio'];
        $dosagem = $_POST['dosagem'];
        $descricao = $_POST['descricao'];

        $insert_med = "INSERT INTO medicamento (nome, remedio, dosagem, descricao)
        VALUES ('$nome','$remedio','$dosagem','$descricao')";

        $resultado = $conn->query($insert_med);
        if($resultado){
            header('location: medicamentos.php?cad=s');
        }else{
            header('location: medicamentos.php?cad=n');
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Cadastrar Medicamento</title>
</head>
<body class="fundo_areas">
    <?php include 'menu_fun.php';?>
<div class="barra fixed-top bg-azul" >
        <br><br>
 </div>
 <br><br>
    <div class="container mt-4 d-flex justify-content-center">
        <div class="card" style="width: 50%;">
            <h1 class="card-header text-center" style="color: #38B6FF;">Cadastrar Novo Medicamento</h1>
            <div class="card-body">
                <!-- Formulário de Cadastro de Funcionário -->
                <form class="container" style="display: flex; justify-content: flex-start; flex-direction: column;" action="cadastra_medicamento.php" method="post" name="form_medicamento_cadastro" enctype="multipart/form-data">
                    <div class="form-row" style="display: flex; justify-content: center; flex-direction: column;">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" maxlength="50" class="form-control" id="nome" placeholder="Digite o nome do medicamento" required>
                        </div>
                        <br>
                    </div>
                    <div class="form-row" style="display: flex; justify-content: center; flex-direction: column;">
                        <div class="form-group">
                            <label for="remedio">Remédio</label>
                            <input type="text" name="remedio" maxlength="50" class="form-control" id="remedio" placeholder="Digite o remedio cadastrado" required>
                        </div>
                        <br>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="dosagem">Dosagem</label>
                            <input type="text" name="dosagem" class="form-control" id="dosagem" required>
                        </div>
                        <br>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="descricao">Descriçâo</label>
                            <textarea type="text" name="descricao" cols="30" rows="5" aria-describedby="basic-addon1" class="form-control" required></textarea>
                        </div>
                        <br>
                    </div>
                    <br>
                    <button class="btn" type="submit" style="background-color: #38B6FF;">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>