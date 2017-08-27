<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">

        <title>Gerenciador de Dados Educacionais</title>
        <link rel="stylesheet" type="text/css" href="css/estilo_login.css"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <script src="js/recuperar_senha.js"></script>

    </head>
    <body>

        <div id="area_login">

            <form method="post" id='recuperarSenha' action="email_recuperar_senha.php" >
            <!-- onsubmit="event.preventDefault(); recuperarSenha()"> -->

                <img id="logo" src="imagens/logo_inicio.png" width="400" alt="logo"/>

                <div id="area_login_interna">

                    <br>
                    <p id="nome_sistema">Gerenciador de Dados Educacionais</p>

                    Digite o e-mail utilizado no cadastro.

                    <p><input type="text" class="form-control" id='usuario' name="usuario" placeholder="Email"></p>
                    <br>
                    <div id="botao_entrada" class="btn-group" role="group" aria-label="...">
                        <button type="button" class="btn btn-default" onclick="recuperarSenha()"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Confirmar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                    </div>
                    <div id="loader" style="display:none" class="loaderDiv">
                        <br>
                        Aguarde enquanto o sistema recupera sua senha...
                        <br><br>
                        <div class="loader2"></div>
                        <br>
                    </div>
                    <br>
                    <br>
                    <p id="outras_opcoes_entrada"><a href="index.php">Voltar a tela de login</a></p>

                </div>

            </form>

        </div>

    </body>
    <style>

    .loaderDiv {
        text-align:center;
        margin: 0 auto;
    }

    .loader2 {
      border: 8px solid #f3f3f3;
      border-radius: 50%;
      border-top: 8px solid #FFA500;
      width: 60px;
      height: 60px;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite;
      margin: 0 auto;
    }

    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    </style>
</html>
