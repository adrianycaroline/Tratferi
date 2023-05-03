<?php
 include '../connection/connect.php'; 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="container">
    <!-- barra lateral -->
    <div id="escondido">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-azul"  style="position: fixed; top: 0; left: 0; bottom: 0; width: 280px; z-index: 9999;">
            <div>
                <figure style="display: flex;">
                    <img src="../images/logoPesq.png" alt="Logo Tratferi" width="75vw"> 
                    <a href="../index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none" style="font-size: 32pt;">
                        Tratferi
                    </a> 
                </figure>
            </div>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="../func/index.php" class="nav-link" aria-current="page">
                        <img src="../images/dashboard.svg" alt="" width="20vw">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="../func/cadastrar_paciente.php" class="nav-link">
                        <img src="../images/usuarios.svg" alt="" width="20vw">
                        Cadastrar Pacientes
                    </a>
                </li>
                <li>
                    <a href="pacientes_lista.php" class="nav-link">
                        <img src="../images/usuarios.svg" alt="" width="20vw">
                        Pacientes Ativos
                    </a>
                </li>
            </ul>
            <hr>
           
        </div>
    </div>
   
    <!-- fim -->
<div class="barra fixed-top bg-azul">
    <br> <br>
</div>
<br><br><br>
<h1 style="margin-left: 270px;">Consultas</h1>
    <div style="display: flex;">
        <div class="border-bottom border-2 border-dark" style="width: 100%; margin-left: 270px;"></div>
    </div>
    <br>
<div style="background-color: #DCDCDC; display: flex; margin-left: 200px; width: 90%; border-radius: 20px;">
    <table class="table table-borderless container w-50" style="margin-left: 50px; margin-top: 15px;">
        <thead>
            <tr style="background-color: #38B6FF;">
                <th scope="row" style="color: #fff;">Status</th>
                <th scope="col" style="color: #fff;">Data</th>
                <th scope="col" style="color: #fff;">Horario</th>
                <th scope="col" style="color: #fff;">Ação</th>
            </tr>
        </thead>
        <tbody style="background-color: #fff;">
            <tr >
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td>
                    <button class="btn" style="background-color: #38B6FF;" role="button">
                        <span>Editar.</span>
                    </button>
                </td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td colspan="2"></td>
                <td >
                    <button class="btn btn-danger" role="button">
                        <span>Excluir</span>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
    <div>
    <table class="table table-borderless container w-50" style="margin-right: 70px; margin-top: 15px; border-radius: 20px;">
        <thead>
            <tr style="background-color: #38B6FF; font-weight: none;">
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th scope="row" style="color: #fff;">Descrição</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody style="background-color: #fff;">
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<br>
<div style="background-color: #DCDCDC; display: flex; margin-left: 200px; width: 90%; border-radius: 20px;">
    <table class="table table-borderless container w-50" style="margin-left: 50px; margin-top: 15px;">
        <thead>
            <tr style="background-color: #38B6FF;">
                <th scope="row" style="color: #fff;">Status</th>
                <th scope="col" style="color: #fff;">Data</th>
                <th scope="col" style="color: #fff;">Horario</th>
                <th scope="col" style="color: #fff;">Ação</th>
            </tr>
        </thead>
        <tbody style="background-color: #fff;">
            <tr >
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td>
                    <button class="btn" style="background-color: #38B6FF;" role="button">
                        <span>Editar.</span>
                    </button>
                </td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td colspan="2"></td>
                <td >
                    <button class="btn btn-danger" role="button">
                        <span>Excluir</span>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
    <div>
    <table class="table table-borderless container w-50" style="margin-right: 70px; margin-top: 15px; border-radius: 20px;">
        <thead>
            <tr style="background-color: #38B6FF; font-weight: none;">
            <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th scope="row" style="color: #fff;">Descrição</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody style="background-color: #fff;">
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</body>
</html>
