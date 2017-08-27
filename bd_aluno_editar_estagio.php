<?php
require_once('funcoes_uteis.php');

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

$matricula_uefs = isset($_POST["matricula_uefs"]);
$local_trabalho = isset($_POST["local_trabalho"]);
$inicio = isset($_POST["inicio"]);
$fim = isset($_POST["fim"]) ? $_POST["fim"] : "";
$observacao = isset($_POST["observacao"]) ? $_POST["observacao"] : "";
$fonte = isset($_POST["fonte"]);
$colaborador = isset($_POST["colaborador"]);

conexao();

$sql_atualiza = "UPDATE aluno_estagio SET matricula_uefs='$matricula_uefs', local_trabalho='$local_trabalho', inicio='$inicio', fim='$fim', "
        . "observacao='$observacao', fonte='$fonte', colaborador='$colaborador' WHERE id=$Id";

mysql_query($sql_atualiza) or die("Não foi possivel atualizar:  " . mysql_error());

//echo '<img id="home" src="imagens/safebox2.png" width="128" alt="logo"/>';
echo '<h2 color: #6d7679>Registro atualizado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

header("refresh: 2; url=modulo_alunos.php");
?>
