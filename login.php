<?php

session_start();

require_once('funcoes_uteis.php');

$login = $_POST['usuario'];
$senha = $_POST['senha'];

conexao();

$sql = "SELECT usuario, senha, nome FROM gede_usuarios WHERE usuario='$login' AND senha='$senha'";

$result = mysql_query($sql);

if (mysql_num_rows($result) > 0) {
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    header('location:home.php');
} else {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index_2.php');
}
?>