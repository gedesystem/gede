<?php
require_once('funcoes_uteis.php');

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

$remuneracao = isset($_POST["nRemuneracao"]) ? $_POST["nRemuneracao"] : "";
$orientador = isset($_POST["nOrientador"]);
$titulo_plano_trabalho = isset($_POST["nTituloPlano"]);
$titulo_projeto = isset($_POST["nTituloProjeto"]);
$modalidade = isset($_POST["nModalidade"]);
$inicio = isset($_POST["nInicio"]);
$fim = isset($_POST["nFim"]) ? $_POST["nFim"] : "";
$observacao = isset($_POST["nObservacao"]) ? $_POST["nObservacao"] : "";
$fonte = isset($_POST["nFonte"]) ? $_POST["nFonte"] : "";

conexao();

$sql_atualiza = "UPDATE aluno_pesquisa SET remuneracao='$remuneracao', orientador='$orientador',"
        . " titulo_plano_trabalho='$titulo_plano_trabalho', titulo_projeto='$titulo_projeto', modalidade='$modalidade', inicio='$inicio', fim='$fim', "
        . "observacao='$observacao', fonte='$fonte' WHERE matricula_uefs=$Id";

mysql_query($sql_atualiza) or die("Não foi possivel atualizar:  " . mysql_error());

//echo '<img id="home" src="imagens/safebox2.png" width="128" alt="logo"/>';
echo '<h2 color: #6d7679>Registro atualizado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

header("refresh: 2; url=modulo_alunos.php");
?>
