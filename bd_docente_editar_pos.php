<?php
require_once('funcoes_uteis.php');

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

//Isset dos atributos
//$exemplo = isset($_POST["exemplo"]);

$titulacao = isset($_POST["nPosGraduacaoDocente"]) ? $_POST["nPosGraduacaoDocente"] : "";
$data = isset($_POST["nData"]);
$fonte = isset($_POST["nFonte"]) ? $_POST["nFonte"] : "";
$observacoes = isset($_POST["nObservacao"]) ? $_POST["nObservacao"] : "";

conexao();

//Criar o comando sql
$sql_atualiza = "UPDATE docentes_pos_graduacao SET data='$data', titulacao='$titulacao', fonte='$fonte', observacoes='$observacoes' WHERE id='$Id'";

mysql_query($sql_atualiza) or die("Não foi possivel atualizar:  " . mysql_error());

echo '<h2 color: #6d7679>Registro atualizado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

//Criar o caminho do redirecionamento 
header("refresh: 2; url=modulo_professores.php");
?>