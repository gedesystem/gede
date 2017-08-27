<?php
require_once('funcoes_uteis.php');

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

$data = isset($_POST["nData"]);
$observacoes = isset($_POST["nObservacao"]) ? $_POST["nObservacao"] : "";
$fonte = isset($_POST["nFonte"]) ? $_POST["nFonte"] : "";

conexao();

$sql_atualiza = "UPDATE docentes_ensino_curso_ead SET data='$data', observacoes='$observacoes', fonte='$fonte' WHERE id_curso_ead=$Id";

mysql_query($sql_atualiza) or die("Não foi possivel atualizar:  " . mysql_error());

//echo '<img id="home" src="imagens/safebox2.png" width="128" alt="logo"/>';
echo '<h2 color: #6d7679>Registro atualizado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

header("refresh: 2; url=modulo_professores.php");
?>
