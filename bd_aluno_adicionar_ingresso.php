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
$sql_atualiza = "INSERT INTO `alunos_ingresso`(`matricula_uefs`, `tipo_escola`, `semestre_ingresso`,
        `forma_ingresso`, `reserva_vagas`, `tipo_reserva`, `financiamento`, `fonte`, `colaborador`)
        VALUES ('$matricula','$tipoEscola','$semestreIngresso', '$formaIngresso', '$reservaVagas',
        '$tipoReserva', '$financiamento', '$fonte', '$colaborador')";

mysql_query($sql_atualiza) or die("Não foi possivel atualizar:  " . mysql_error());

echo '<h2 color: #6d7679>Registro atualizado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

//Criar o caminho do redirecionamento
header("refresh: 2; url=modulo_alunos.php");
?>
