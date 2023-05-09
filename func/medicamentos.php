<?php
    include '../admin/acesso_com_fun.php';
    include '../connection/connect.php'; 

    $lista = $conn->query("SELECT * FROM medicamento");
    $row = $lista->fetch_assoc();

    if(isset($_POST['buscar'])){
        $pesquisa = $_POST['pesquisa'];
    
    // realiza a busca no banco de dados
        $query = "SELECT * FROM medicamento WHERE remedio LIKE '%$pesquisa%'";
        $result = $conn->query($query);
    
    
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
    
    <title>Medicamentos</title>
</head>
<body>
     <!-- barra lateral -->
     <?php include 'menu_fun.php';?>
    <div class="barra fixed-top bg-azul">
    <br> <br>
</div>
    <div style="margin-top: 90px; margin-left: 300px;">
        <h1>Medicamentos</h1>
    </div>
    <!-- fim -->
    <div style="background-color:  #38B6FF; display: flex; margin-left: 300px; margin-top: 70px; width: 80%; border-radius: 20px;">
        <form method="post" style="margin-left: 20px; display: flex;">
            <input type="text" name="pesquisa" id="pesquisa" value="digite o que você quer procurar..." style="background: none; border: none; width: 1415px;">
            <button type="submit" name="buscar" style="background-color:  #38B6FF; border-radius: 20px; padding: 5px; color: white; border: 2px solid black;">Buscar</button>
        </form>
    </div>
    <table style="margin-left: 300px;" class="table table-hover table-condensed tb-opacidade">
        <thead>
            <tr>
                <th>Receita</th>
                <th>Remédio</th>
                <th>Quantidade</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php do { ?>
                    <tr>
                        <td class="hidden">
                            <?php echo $row['id']; ?>
                        </td>
                        <td>
                            <?php echo $row['receita']; ?>
                            <span class="visible-xs"></span>
                            <span class="hidden-xs"></span>
                        </td>
                        <td>
                            <?php echo $row['remedio']; ?>
                        </td>
                        <td>
                            <?php echo $row['qntd_remedio']; ?>
                        </td>
                    </tr>
                <?php } while($row = $result->fetch_assoc()) ?>
            </tr>
        </tbody>
    </table>
</body>
</html>