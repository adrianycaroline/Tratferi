<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='../CSS/estilo.css'>
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <title>Cadastro</title>
</head>
<body>
   <section id="fundo_cli" style="display: flex; flex-direction: column;">
    <?php include '../logo_superior.php'?>
    <div class="formbox ">
        <div class="form-value">
            <form action="">
            <h2 class="text-center mb-3">Esqueci minha senha</h2>
                    <div class="inputbox">
                    <div class="container-fluid mt-4">
	<div class="row justify-content-center">
		<div class="col-md-6 col-lg-4">
		<p class="text-center">Digite seu endereço de email abaixo para redefinir sua senha.</p>
			<form>
				<div class="form-group">
					<label for="email">Endereço de email:</label>
					<input type="email" class="form-control" id="email" placeholder="Digite seu email" required>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Redefinir senha</button>
			</form>
			<p class="mt-3 text-center"><a href="login_cliente.php">Voltar para o login</a></p>
		</div>
	</div>
</div>
</div>
</body>
</html>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>