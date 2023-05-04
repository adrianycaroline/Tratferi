<?php
include '../admin/acesso_com_fun.php';
include '../connection/connect.php'; 
//informaões da consulta
$lista = $conn->query("select * from consulta where status = 'Ativa'");
$row = $lista->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Consultas</title>
</head>
<body class="">
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
                    <a href="../func/index.php" class="nav-link text-white" aria-current="page">
                        <img src="../images/dashboard.svg" alt="" width="20vw">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="../func/cadastrar_paciente.php" class="nav-link text-white">
                        <img src="../images/usuarios.svg" alt="" width="20vw">
                        Cadastrar Pacientes
                    </a>
                </li>
                <li>
                    <a href="pacientes_lista.php" class="nav-link text-white">
                        <img src="../images/usuarios.svg" alt="" width="20vw">
                        Pacientes Ativos
                    </a>
                </li>
                <br>
                <!-- Botão de Voltar -->
            <div style="color: white;">
                <a href="index.php" class="text-light" style="text-decoration: none; border: 1px solid white; border-radius: 20px; padding: 5px;">Voltar</a>
            </div>
            </ul>
            <hr>
            
            <div class="dropdown">
                <img src="../fotos_usuarios/<?php echo $_SESSION['Imagem']; ?>" alt="Foto de Perfil - <?php echo $_SESSION['nome']?>" width="32" height="32" class="rounded-circle me-2">
                <strong><a style="text-decoration: none; color: white;"><?php echo $_SESSION['nome'];?></a></strong>
                <button class="dropdown-toggle bg-azul border-0" style="color: white;"  type="button" id="dropdownMenuFunc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>
                <div class="dropdown-menu func" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="perfil/config_perfil_func.php"><ion-icon name="person-outline"></ion-icon>Perfil</a>
                    <a class="dropdown-item" href="../admin/logout_Fun.php"><ion-icon name="exit-outline"></ion-icon>Sair</a>
                </div>
            </div>
        </div>
    </div>
   
    <!-- fim -->
<div class="barra fixed-top bg-azul">
    <br> <br>
</div>
<br><br><br>
<h1 style="margin-left: 950px; color: #1d5f96;">Consultas</h1>

    <div style="display: flex;">
        <div class="border-bottom border-2 border-dark" style="width: 83%; margin-left: 300px;"></div>
    </div>
    <br>
<a href="gerar_consultas.php" target="_self" class="btn btn-block btn-xs" style="background-color: #38B6FF; margin-left: 300px;" role="button">
    <ion-icon name="add-circle-outline"></ion-icon>
    <span class="hidden-xs">ADICIONAR NOVA CONSULTA</span>
</a>
<br><br><br>
<div style="background-color: #DCDCDC; display: flex;  width: 62%; margin-left: 500px; border-radius: 20px;">
    <table class="table table-borderless container w-50" style="margin-left: 70px; margin-top: 15px;">
        <thead>
            <tr style="background-color: #38B6FF;" class="text-center">
                <th scope="row" style="color: #fff;">Status</th>
                <th scope="col" style="color: #fff;">Data</th>
                <th scope="col" style="color: #fff;">Horario</th>
                <th scope="col" style="color: #fff;">Profissional</th>
                <th scope="col" style="color: #fff;">Paciente</th>
                <th class="hidden" scope="col" style="color: #fff;">CPF</th>
                <th scope="col" style="color: #fff;">Ação</th>
            </tr>
        </thead>
        <tbody style="background-color: #fff;">
        <?php if($lista){
            do { 
                //informaões do funcionário
                $idFunc = $row['id_func'];
                $listaFunc = $conn->query("select * from funcionario where id ='$idFunc'");
                $rowFunc = $listaFunc->fetch_assoc();
                
                //informaões do paciente
                $idPac = $row['id_paci'];
                $listaFunc = $conn->query("select * from paciente where id ='$idPac'");
                $rowPac = $listaFunc->fetch_assoc();
            ?>
            <tr>
                <th scope="row"><?php echo $row['status'];?></th>
                <td><?php echo $row['data_consulta'];?></td>
                <td><?php echo $row['horario_consulta'];?></td>
                <td><?php echo $rowFunc['nome'];?></td>
                <td><?php echo $rowPac['nome'];?></td>
                <td><?php echo $rowPac['cpf'];?></td>
                <td>
                    <button class="btn" style="background-color: #38B6FF;" role="button">
                        <span>Alterar</span>
                    </button>
                </td>
            </tr>
            <?php }while($row = $lista->fetch_assoc());?>
            <?php }?>
        </tbody>
    </table>
    <div>
    <table class="table table-borderless container w-50" style="margin-right: 80px; margin-top: 15px; border-radius: 20px;">
        <thead>
        <tr style="background-color: #38B6FF; font-weight: none;" class="text-center">
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
        <?php if($lista) {
            //informaões da consulta
            $lista = $conn->query("select * from consulta where status = 'Ativa'");
            $row = $lista->fetch_assoc();
        do {    
        ?>
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
                <td><?php echo $row['descricao'];?></td>
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
        <?php }while($row = $lista->fetch_assoc());?>
        <?php }?>
        </tbody>
    </table>
</div>
</div>
<br>
</body>
</html>
