<?php
require_once('funcoes_uteis.php');

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

//Isset dos atributos
//$exemplo = isset($_POST["exemplo"]);

$tipo_docente_temporario = isset($_POST["nVisitante"]) ? $_POST["nVisitante"] : "";
$tipo_vinculo = isset($_POST["nTipo"]) ? $_POST["nTipo"] : "";
$data = isset($_POST["nData"]);
$termino = isset($_POST["nDataFim"]) ? $_POST["nDataFim"] : "";
$fonte = isset($_POST["nFonte"]) ? $_POST["nFonte"] : "";
$observacoes = isset($_POST["nObservacao"]) ? $_POST["nObservacao"] : "";

conexao();

//Criar o comando sql
$sql_atualiza = "UPDATE docentes_temporarios SET tipo_docente_temporario='$tipo_docente_temporario', tipo_vinculo='$tipo_vinculo', inicio='$data', fim='$termino', fonte='$fonte', observacoes='$observacoes' WHERE id='$Id'";

mysql_query($sql_atualiza) or die("Não foi possivel atualizar:  " . mysql_error());

echo '<h2 color: #6d7679>Registro atualizado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

//Criar o caminho do redirecionamento 
header("refresh: 2; url=modulo_professores.php");
?>