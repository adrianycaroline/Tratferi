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
<body>
<div class="barra fixed-top" style="background-color: #38B6FF;">
    <br> <br>
</div>
<br><br><br><br><br>
<div style="background-color: #DCDCDC; display: flex;">
    <table class="table table-borderless container w-25 bg-secudary" style="margin-left: 350px;">
        <thead>
            <tr class="bg-azul">
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
        <table class="table table-borderless container w-25" style="margin-left: 350px;">
            <thead>
                <tr class="bg-azul">
                    <th scope="row" style="color: #fff;">Descrição</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<div style=" margin-left: 280px; display: flex;">
    <table class="table">
        <thead>
            <tr style="background-color: #38B6FF;">
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
    <div>
        aaaaaaaaaaa
    </div>
</div>
</body>
<?php include 'menu_cadastrar.php';?>
</html>
