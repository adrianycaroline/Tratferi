<?php
    include '../admin/acesso_com_fun.php';
    include '../connection/connect.php'; 

    $lista = $conn->query("SELECT * FROM medicamento");
    $row = $lista->fetch_assoc();
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
    <!-- Links do data Table -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
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
    <div style="margin-left: 300px; margin-top: 70px;">
        <table class="table table-hover table-condensed tb-opacidade" id="tabela_medicamentos">
            <thead style="background-color: #38B6FF;"> 
                <tr>
                    <th hidden>ID</th>
                    <th>Nome</th>
                    <th>Remédio</th>
                    <th>Dosagem</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php do { ?>
                    <tr>
                        <td hidden>
                            <?php echo $row['id']; ?>
                        </td>
                        <td>
                            <?php echo $row['nome']; ?>
                            <span class="visible-xs"></span>
                            <span class="hidden-xs"></span>
                        </td>
                        <td>
                            <?php echo $row['remedio']; ?>
                        </td>
                        <td>
                            <?php echo $row['dosagem']; ?>
                        </td>
                        <td>
                            <?php echo $row['descricao']; ?>
                        </td>
                    </tr>
                <?php } while($row = $lista->fetch_assoc()) ?>
            </tbody>
        </table>

    </div>
</body>
<script>
    // Script para buscar o que for pesquisado (ele também já coloca o input de pesquisa e etc...)
    $('#tabela_medicamentos').DataTable({
        "language":  {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json"
        }
    });
</script>
</html>