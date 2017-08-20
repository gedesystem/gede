<?php
require_once('funcoes_uteis.php');

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

//Isset dos atributos
//$exemplo = isset($_POST["exemplo"]);

$codigo_laboratorio = isset($_POST["nCodigo"]);
$observacoes = isset($_POST["nObservacao"]);

conexao();

//Criar o comando sql
$sql_atualiza = "INSERT INTO cursos_laboratorio (codigo_curso, codigo_laboratorio, observacoes) VALUES ('" .$Id . "', "
        . "'" . $codigo_laboratorio . "', '" . $observacoes . "')";

mysql_query($sql_atualiza) or die("Não foi possivel adicionar:  " . mysql_error());

echo '<h2 color: #6d7679>Registro adicionado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 2 segundos...</h3>';

//Criar o caminho do redirecionamento 
header("refresh: 2; url=COLOCAR O CAMINHO AQU");
?>