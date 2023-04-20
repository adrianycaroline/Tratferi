<?php 
    include '../admin/acesso_com_fun.php';
    include '../connection/connect.php';
    $lista = $conn->query("SELECT * FROM funcionario where ativo = 1");
    $row = $lista->fetch_assoc();
    $rows = $lista->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Lista de Funcionarios Ativos</title>
</head>
<body class="fundo_areas">
    <main class="container">
        <br>
        <h2 class="text-center">Lista de Funcionarios Ativos</h2>
        <table class="table table-hover table-condensed tb-opacidade">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Nivel</th>
                <th>CPF</th>
                <th>Cargo</th>
                <th>Salario</th>
                <th>Periodo</th>
                <th>
                    <a href="../admin/cadastrar_funcionario.php" target="_self" class="btn btn-block btn-primary btn-xs" role="button">
                        <ion-icon name="add-circle-outline"></ion-icon>
                        <span class="hidden-xs">ADICIONAR</span>
                    </a>
                </th>
            </thead>
            <tbody>
                <?php do {?>
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['nome'];?></td>
                        <td><?php echo $row['adm'];?></td>
                        <td><?php echo $row['cpf'];?></td>
                        <td><?php echo $row['cargo'];?></td>
                        <td><?php echo $row['salario'];?></td>
                        <td><?php echo $row['periodo'];?></td>
                        <td>
                            <a href="usuarios_atualiza.php?id_usuario=<?php echo $row['id']; ?>" role="button" class="btn btn-warning btn-block btn-xs"> 
                                <ion-icon name="refresh-outline"></ion-icon>
                                <span class="hidden-xs">ALTERAR</span>
                            </a>
                            <button 
                                data-nome="<?php echo $row['nome']; ?>" 
                                data-id="<?php echo $row['id']; ?>"
                                class="delete btn btn-xs btn-block btn-danger">
                                <ion-icon name="trash-outline"></ion-icon>
                                <span class="hidden-xs">EXCLUIR</span>
                            </button>
                        </td>
                    </tr>
                <?php }while($row = $lista->fetch_assoc())?>
            </tbody>
        </table>
    </main>
</body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>