<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conteudo Perfil Adm</title>
</head>
<body style="text-align: right;">
    <div ng-switch="opcao">
        <div ng-switch-when="ConfigPerfil">
            <h1>Cachorros</h1>
            <p>Bem-vindo a um mundo de caes.</p>
        </div>

        <div ng-switch-when="PrefEmail">
            <h1>Gatos</h1>
            <p>Bem-vindo a um mundo de gatos.</p>
        </div>

        <div ng-switch-when="SenhaSegu">
            <h1>Passaros</h1>
            <p>Bem-vindo a um mundo de passaros.</p>
        </div>

        <div ng-switch-when="Telefone">
            <h1>Passaros</h1>
            <p>Bem-vindo a um mundo de passaros.</p>
        </div>

        <div ng-switch-when="RecuAdicio">
            <h1>Passaros</h1>
            <p>Bem-vindo a um mundo de passaros.</p>
        </div>

        <!-- fim da área de seleção de conteúdo  -->
    </div>
</body>
</html>