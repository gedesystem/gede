<?php
require_once('funcoes_uteis.php');

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

//Isset dos atributos
//$exemplo = isset($_POST["exemplo"]);


conexao();

//Criar o comando sql
$sql_excluir = "DELETE FROM aluno_estagio WHERE id = '" . $Id . "'";

mysql_query($sql_excluir) or die("Não foi possivel excluir:  " . mysql_error());

echo '<h2 color: #6d7679>Registro deletado com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 2 segundos...</h3>';

//Criar o caminho do redirecionamento 
header("refresh: 2; url=modulo_alunos.php");
?>