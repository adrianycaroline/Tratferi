<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela de Login</title>

  <!-- Importando CSS do Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <!-- Importando JS do Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <!-- CSS customizado -->
  <style>
    body {
        background: url('../images/FUNDO_VERIFICA.png') no-repeat;  
        background-size: cover;
    }
    .card {
      width: 400px;
    }
  </style>
</head>
<body>
    <?php include '../logo_superior.php';?>
<div class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex align-items-center justify-content-center" style="height: 100vh">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="mb-0">Escolha uma opção:</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="login_cliente.php" class="btn btn-primary btn-block">Sou Paciente</a>
                            </div>
                            <div class="col-sm-6">
                                <a href="login_func.php" class="btn btn-primary btn-block">Sou Funcionário</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
