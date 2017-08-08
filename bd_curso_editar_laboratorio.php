<?php
require_once('funcoes_uteis.php');

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

$codigo_curso = isset($_POST["codigo_curso"]);
$codigo_laboratorio = isset($_POST["codigo_laboratorio"]);
$fonte = isset($_POST["fonte"]);
$colaborador = isset($_POST["colaborador"]);

conexao();

$sql_atualiza = "UPDATE cursos_laboratorio SET codigo_curso='$codigo_curso', codigo_laboratorio='$codigo_laboratorio',"
        . " fonte='$fonte', colaborador='$colaborador' WHERE id=$Id";

mysql_query($sql_atualiza) or die("Não foi possivel atualizar:  " . mysql_error());

//echo '<img id="home" src="imagens/safebox2.png" width="128" alt="logo"/>';
echo '<h2 color: #6d7679>Registro atualizado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

header("refresh: 2; url=menu_cursos.php");
?>
