<?php
require_once('funcoes_uteis.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$matricula_uefs = $_POST["matricula_uefs"];
$data = DateTime::createFromFormat('d/m/Y', $_POST["nData"])->format('Y-m-d');
$titulacao = $_POST["nPosGraduacaoDocente"];
$obs = $_POST["nObs"];

$sql_inserir = "INSERT INTO `docentes_pos_graduacao`(`data`, `titulacao`, `observacoes`, `id_docente`)
        VALUES ('$data', '$titulacao', '$obs', '$id_gede')";

conexao();
mysql_query($sql_inserir) or die(" Não foi possivel inserir o registro no banco: " . mysql_errno());

echo '<h2 color: #6d7679>Registro salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

header("refresh: 2; url=modulo_professores.php");
 ?>
