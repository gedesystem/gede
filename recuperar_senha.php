<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">

        <title>Gerenciador de Dados Educacionais</title>
        <link rel="stylesheet" type="text/css" href="css/estilo_login.css"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">


    </head>
    <body>

        <div id="area_login">

            <form method="post" action="login.php">

                <img id="logo" src="imagens/logo_inicio.png" width="400" alt="logo"/>

                <div id="area_login_interna">

                    <br>
                    <p id="nome_sistema">Gerenciador de Dados Educacionais</p>
                    
                    Digite o e-mail utilizado no cadastro.
                    
                    <p><input type="text" class="form-control" name="usuario" placeholder="Email"></p>
                    <br>
                    <div id="botao_entrada" class="btn-group" role="group" aria-label="...">
                        <button type="submit" class="btn btn-default"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Confirmar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                    </div>
                    <br>
                    <br>
                    <p id="outras_opcoes_entrada"><a href="index.php">Voltar a tela de login</a></p>

                </div>

            </form>

        </div>    

    </body>
</html>