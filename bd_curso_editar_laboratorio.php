<?php
require_once('funcoes_uteis.php');

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

$codigo_laboratorio = isset($_POST["nCodigoLaboratorio"]);
$fonte = isset($_POST["nFonte"]);

conexao();

$sql_atualiza = "UPDATE cursos_laboratorio SET codigo_laboratorio='$codigo_laboratorio',"
        . " fonte='$fonte' WHERE codigo_curso=$Id";

mysql_query($sql_atualiza) or die("Não foi possivel atualizar:  " . mysql_error());

//echo '<img id="home" src="imagens/safebox2.png" width="128" alt="logo"/>';
echo '<h2 color: #6d7679>Registro atualizado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

header("refresh: 2; url=modulo_cursos.php");
?>
