<?php

require_once('funcoes_gerais.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

$codigo_curso = $_POST["codigo_curso"];
$nome = $_POST["nome"];
$grau = $_POST["grau"];
$modalidade = $_POST["modalidade"];
$nivel_academico = $_POST["nivel_academico"];
$tipo_ingresso = $_POST["tipo_ingresso"];
$carga_horaria = $_POST["carga_horaria"];
$inicio_funcionamento = $_POST["inicio_funcionamento"];
$data_autorizacao = $_POST["data_autorizacao"];
$situacao_emec = $_POST["situacao_emec"];


conexao();

$sql_atualiza = "UPDATE cursos_dados_cadastrais SET codigo_curso='$CodigoCurso', nome='$Nome', grau='$GrauAcademico', modalidade='$Modalidade',"
        . " carga_horaria='$CargaHoraria', inicio_funcionamento='$Inicio',"
        . "situacao_emec='$SituacaoEMEC' WHERE id=$Id";
mysql_query($sql_atualiza) or die("Não foi possivel atualizar:  " . mysql_error());

//echo '<img id="home" src="imagens/safebox2.png" width="128" alt="logo"/>';
echo '<h2 color: #6d7679>Registro atualizado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

header("refresh: 2; url=menu_cursos.php");
?>