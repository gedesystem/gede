<?php
require_once('funcoes_uteis.php');

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

//Isset dos atributos
//$exemplo = isset($_POST["exemplo"]);

$codigo_curso = isset($_POST["nCodigo"]);
$nome = isset($_POST["nNome"]);
//tabela no BD não possui campo Código OCDE
$grau = isset($_POST["nGrau"]);
$modalidade = isset($_POST["nModalidade"]);
$nivel_academico = isset($_POST["nNivel"]);
$tipo_ingresso = isset($_POST["nIngresso"]);
$carga_horaria = isset($_POST["nCargaHoraria"]) ? $_POST["nCargaHoraria"] : "";
$inicio_funcionamento = isset($_POST["nInicioFuncionamento"]) ? $_POST["nInicioFuncionamento"] : "";
$data_autorizacao = isset($_POST["nAutorizacao"]) ? $_POST["nAutorizacao"] : "";
$situacao_emec = isset($_POST["nSituacao"]);
$gratuito = isset($_POST["nGratuito"]);


conexao();

//Criar o comando sql
$sql_atualiza = "INSERT INTO curso_dados_cadastrais (codigo_curso, nome, grau, modalidade, nivel_academico, tipo_ingresso, carga_horaria, "
        . "inicio_funcionamento, data_autorizacao, situacao_emec, gratuito) VALUES ('" . $codigo_curso . "', '" . $nome . "', '" 
        . $grau . "', '" . $modalidade . "', '" . $nivel_academico . "', '" . $tipo_ingresso . "', '" . $carga_horaria . "', "
        . "'" . $inicio_funcionamento . "', '" . $data_autorizacao . "', '" . $situacao_emec . "', '" . $gratuito . "')";

mysql_query($sql_atualiza) or die("Não foi possivel adicionar:  " . mysql_error());

echo '<h2 color: #6d7679>Registro adicionado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 2 segundos...</h3>';

//Criar o caminho do redirecionamento 
header("refresh: 2; url=modulo_cursos.php");
?>