<?php
require_once('funcoes_uteis.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$id_gede = $_POST["id_gede"];
$codCurso = $_POST["nCodCurso"];

$sql_inserir = "INSERT INTO `vinculo_docentes`(`codigo_curso`, `id_docente`) VALUES ('$codCurso', '$id_gede')";

conexao();
mysql_query($sql_inserir) or die(" Não foi possivel inserir o registro no banco: " . mysql_errno());

$data = DateTime::createFromFormat('d/m/Y', $_POST["nData"])->format('Y-m-d');
$classe = $_POST["nClasse"];
$departamento = $_POST["nDep"];;

$sql_inserir = "INSERT INTO `vinculo_docentes_ies`(`departamento`, `classe`, `data`, `id_docente`)
    VALUES ('$departamento', '$classe', '$data', '$id_gede')";

mysql_query($sql_inserir) or die(" Não foi possivel inserir o registro no banco: " . mysql_errno());

echo '<h2 color: #6d7679>Registro salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

header("refresh: 2; url=modulo_professores.php");
 ?>
