<?php

require_once('funcoes_gerais.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

$nome = isset($_POST["nNome"]);
$grau = isset($_POST["nGrau"]) ? $_POST["nGrau"] : "";
$modalidade = isset($_POST["nModalidade"]) ? $_POST["nModalidade"] : "";
$nivel_academico = isset($_POST["nNivel"]) ? $_POST["nNivel"] : "";
$tipo_ingresso = isset($_POST["nIngresso"]) ? $_POST["nIngresso"] : "";
$carga_horaria = isset($_POST["nCargaHoraria"]) ? $_POST["nCargaHoraria"] : "";
$inicio_funcionamento = isset($_POST["nInicio"]) ? $_POST["nInicio"] : "";
$data_autorizacao = isset($_POST["nAutorizacao"]) ? $_POST["nAutorizacao"] : "";
$situacao_emec = isset($_POST["nEMEC"]) ? $_POST["nEMEC"] : "";
$gratuito = isset($_POST["nGratuito"]) ? $_POST["nGratuito"] : "";
$fonte = isset($_POST["nFonte"]) ? $_POST["nFonte"] : "";


conexao();

$sql_atualiza = "UPDATE cursos_dados_cadastrais SET nome='$nome', grau='$grau', modalidade='$modalidade', nivel_academico='$nivel_academico', tipo_ingresso='$tipo_ingresso', "
        . " carga_horaria='$carga_horaria', inicio_funcionamento='$inicio_funcionamento', data_autorizacao='$data_autorizacao', "
        . "situacao_emec='$situacao_emec', gratuito='$gratuito', fonte='$fonte' WHERE codigo_curso=$Id";
mysql_query($sql_atualiza) or die("Não foi possivel atualizar:  " . mysql_error());

//echo '<img id="home" src="imagens/safebox2.png" width="128" alt="logo"/>';
echo '<h2 color: #6d7679>Registro atualizado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

header("refresh: 2; url=modulo_cursos.php");
?>