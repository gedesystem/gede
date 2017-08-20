<?php
require_once('funcoes_uteis.php');

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$matricula_uefs = $_POST["id"];

//Isset dos atributos
//$exemplo = isset($_POST["exemplo"]);

$remuneracao = isset($_POST["nRemuneracao"]);
$inicio = isset($_POST["nInicio"]);
$fim = isset($_POST["nFim"]);
$observacao = isset($_POST["nObservacao"]) ? $_POST["nObservacao"] : "";

conexao();

//Criar o comando sql
$sql_atualiza = "INSERT INTO aluno_monitoria (matricula_uefs, remuneracao, inicio, fim, observacao) "
        . "VALUES ('" . $matricula_uefs . "', '" . $remuneracao . "', "
        . "'" . $inicio . "', '" . $fim . "', '" . $observacao . "')";

mysql_query($sql_atualiza) or die("Não foi possivel adicionar:  " . mysql_error());

echo '<h2 color: #6d7679>Registro adicionado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 2 segundos...</h3>';

//Criar o caminho do redirecionamento 
header("refresh: 2; url=modulo_alunos.php");
?>