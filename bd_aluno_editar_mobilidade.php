<?php
require_once('funcoes_uteis.php');

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

$tipo = isset($_POST["nTipo"]) ? $_POST["nTipo"] : "";
$ies_destino = isset($_POST["nIESDestino"]) ? $_POST["nIESDestino"] : "";
$tipo_mobilidade_internacional = isset($_POST("nTipoInternacional")) ? $_POST("nTipoInternacional") : "";
$pais_destino = isset($_POST("nPaisDestino")) ? $_POST("nPaisDestino") : "";
$inicio = isset($_POST["nInicio"]);
$fim = isset($_POST["nFim"]) ? $_POST["nFim"] : "";
$observacao = isset($_POST["nObservacao"]) ? $_POST["nObservacao"] : "";
$fonte = isset($_POST["nFonte"]);

conexao();

$sql_atualiza = "UPDATE aluno_mobilidade SET"
        . " tipo='$tipo', ies_destino='$ies_destino', tipo_mobilidade='$tipo_mobilidade_internacional', pais_destino='$pais_destino',"
        . " inicio='$inicio', fim='$fim', "
        . "observacao='$observacao', fonte='$fonte' WHERE matricula_uefs=$Id";

mysql_query($sql_atualiza) or die("Não foi possivel atualizar:  " . mysql_error());

//echo '<img id="home" src="imagens/safebox2.png" width="128" alt="logo"/>';
echo '<h2 color: #6d7679>Registro atualizado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

header("refresh: 2; url=modulo_alunos.php");
?>
