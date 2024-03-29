<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/estilo.css">
    <title>Contato</title>
</head>
    <body>
        <?php
        $senha = $cpf_tratado;

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

require 'lib/vendor/autoload.php';

        $mail = new PHPMailer(true);

        try {
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'tratferi_site@outlook.com';
            $mail->Password = 'Trat@123';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('tratferi_site@outlook.com', 'Atendimento TratFeri'); // site
            $mail->addAddress($email, ''); //ADM
            
            $mail->isHTML(true);                                 
            $mail->Subject = "Cadastro TratFeri";
            $mail->Body = "Seu cadastro foi realizado com sucesso! Sua senha para primeiro acesso é: $senha.<br>".
            "Após o primeiro login você deverá alterar sua senha.";

            $mail->send(); ?>

        <?php } catch (Exception $e) { ?>
            <!-- se não funcionar  -->
            <h3 class="texto_contato">E-mail não enviado com sucesso! Tente novamente</h3>
        <?php }?>
    </body>
</html>
