<?php
session_start();
if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
}
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">

        <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />

        <link rel="icon" type="image/ico" href="imagens/favicon.ico" />

        <title>Gerenciador de Dados Educacionais</title>

        <link rel="stylesheet" type="text/css" href="css/estilo_padrao.css"/>
        <link rel="stylesheet" type="text/css" href="css/estilo_home.css"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">

    </head>

    <body>
        <div class="container-fluid" id="principal">

            <div class="row">

                <nav class="col-md-2" id="barraLateral" style="height: 1500px;">

                    <aside class="span3 sidebar">

                        <ul id="menu" class="nav affix">

                            <li>
                                <img id="logo" src="imagens/logo.jpg" width="140" />
                            </li>

                            <li>
                                <a href="home.php">Módulos</a>
                            </li>

                            <li>
                                <a href="modulo_historico.php">Histórico avançado</a>
                            </li>

                            <li>
                                <a href="modulo_censo.php">Censos Educacional</a>
                            </li>

                            <li>
                                <a href="modulo_estatisticas.php">Estatísticas</a>
                            </li>

                            <li>
                                <HR NOSHADE SIZE="6" class="separador_menu">
                            </li>

                            <li>
                                <a href="modulo_migracao.php">
                                    <img id="home" src="imagens/migra.png" width="20"/> Migração de dados
                                </a>
                            </li>

                            <li>
                                <a href="modulo_pessoas.php">
                                    <img id="home" src="imagens/users.png" width="20"/> Pessoas
                                </a>
                            </li>


                            <li>
                                <HR NOSHADE SIZE="6" class="separador_menu">
                            </li>

                            <li>
                                <a href="">
                                    <img id="home" src="imagens/ajuda.png" width="20"/> Ajuda
                                </a>
                            </li>

                        </ul>

                    </aside>

                </nav>

                <div class="col-md-10" id="conteudo">

                    <nav class="barra_superior">

                        <ul >

                            <li>
                                <a href="modulo_cooperadores.php"> <?php echo $_SESSION['nome']; ?> </a>
                            </li>

                            <li>
                                <a href="logout.php">
                                    <img id="home" src="imagens/logout.png" width="30" alt="Sair"/>
                                </a>
                            </li>

                        </ul>

                    </nav>
