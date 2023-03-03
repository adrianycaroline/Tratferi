<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="50;URL=../index.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/2495680ceb.js" crossorigin="anonymous"></script>
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../CSS/estilo.css" type="text/css">
    
    <title>TratFeri - Cadastro</title>
</head>

<body>
    <main class="container">
        <section>
            <article>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <h1 class="breadcrumb text-info text-center">Faça Seu Cadastro</h1>
                        <div class="thumbnail">
                            <p class="text-info text-center" role="alert">
                                <i class="fas fa-users fa-10x"></i>
                                <img src="../images/logo.png" alt="" class="text-info text-rigth">
                            </p>
                            <br>
                            <div class="alert alert-info" role="alert">
                                <form action="cadastro.php" name="form_login" id="form_login" method="POST" enctype="multipart/form-data">
                                    <label for="nome_usuario_reserva">Nome Completo:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" name="nome" id="nome_usuario_reserva" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu nome completo.">
                                    </p>
                                    <label for="cpf_usuario_reserva">Data de Nascimento:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="date" name="data_nascimento" id="cpf_usuario_reserva" class="form-control" autofocus required autocomplete="off" placeholder="Digite sua data de nascimento.">
                                    </p>
                                    <label for="cpf_usuario_reserva">CPF:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" name="cpf" id="cpf_usuario_reserva" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu CPF">
                                    </p>
                                    <label for="email_usuario_reserva">E-mail:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="email" name="email" id="email_usuario_reserva" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu nome e-mail">
                                    </p>
                                    <label for="senha_usuario_reserva">Senha:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-qrcode text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="password" name="senha" id="senha_usuario_reserva" class="form-control" required autocomplete="off" placeholder="Digite sua senha.">
                                    </p>
                                    <p class="text-right">
                                        <input type="submit" value="Fazer Cadastro" class="btn btn-primary">
                                    </p>
                                </form>
                                <a href="login.php">
                                    <h5 class="text-center">
                                        <br>
                                        Clique aqui para voltar para a página de login
                                    </h5>
                                </a>
                                <p class="text-center">
                                    <small>
                                        <br>
                                        Caso não faça o cadastro em 50 segundos será redirecionado automaticamente para página inicial.
                                    </small>
                                </p>
                            </div><!-- fecha alert -->
                        </div><!-- fecha thumbnail -->
                    </div><!-- fecha dimensionamento -->
                </div><!-- fecha row -->
            </article>
        </section>
    </main>
     <!-- Link arquivos Bootstrap js -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>