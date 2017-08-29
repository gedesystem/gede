<?php
require_once('funcoes_uteis.php');

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$matricula = $_POST["matricula_uefs"];

//Isset dos atributos
//$exemplo = isset($_POST["exemplo"]);
$tipoEscola = isset($_POST['nTipoEscola']) ? $_POST['nTipoEscola'] : 2;
$semestreIngresso = isset($_POST['nSemestreIngresso']) ? $_POST['nSemestreIngresso'] : '';
$formaIngresso = isset($_POST['nFormaIngresso']) ? $_POST['nFormaIngresso'] : '';
$reservaVagas = isset($_POST['nReservaVagas']) ? $_POST['nReservaVagas'] : '';
$tipoReserva = isset($_POST['nTipoReserva']) ? $_POST['nTipoReserva'] : '';
$financiamento = isset($_POST['nFinanciamento']) ? $_POST['nFinanciamento'] : '';
$fonte = isset($_POST['nFonte']) ? $_POST['nFonte'] : '';
$colaborador = $_SESSION['nome'];

conexao();

//Criar o comando sql

$sql_atualiza = "UPDATE `alunos_ingresso` SET `tipo_escola`='$tipoEscola',`semestre_ingresso`='$semestreIngresso',
        `forma_ingresso`='$formaIngresso',`reserva_vagas`='$reservaVagas',`tipo_reserva`='$tipoReserva',
        `financiamento`='$financiamento',`fonte`='$fonte',`colaborador`='$colaborador' WHERE `matricula_uefs`='$matricula'";

mysql_query($sql_atualiza) or die("Não foi possivel atualizar:  " . mysql_error());

echo '<h2 color: #6d7679>Registro atualizado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

//Criar o caminho do redirecionamento
header("refresh: 2; url=modulo_alunos.php");
?>
