<?php
include("topo_pagina.php");

require_once('funcoes_uteis.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$id = $_POST["id"];

conexao();

$sql_seleciona = "SELECT * FROM gede_usuarios WHERE id_gede = '" . $id . "'";
$resultado = seleciona($sql_seleciona);


$res = mysql_fetch_assoc($resultado);
?>

<section>

    <h2 class="Titulo">Informações do cooperador</h2> 

    <HR NOSHADE SIZE="4">

    <p>Nome: <span style="color: #737373"> <?php echo($res['nome']); ?></span></p>

    <p>Usuário: <span style="color: #737373"> <?php echo($res['usuario']); ?> </span></p>

    <p>Tipo: <span style="color: #737373"> <?php echo($res['tipo']); ?> </span></p>

    <p>E-mail: <span style="color: #737373"> <?php echo($res['e_mail']); ?> </span></p>

    <p>Senha: <span style="color: #737373"> <?php echo($res['senha']); ?> </span></p>

    <HR NOSHADE SIZE="4">
    
    <button type="button" class="btn btn-default" onclick="location.href = 'modulo_cooperadores.php'">Voltar</button>
</section>

<?php include("fim_pagina.php"); ?>
