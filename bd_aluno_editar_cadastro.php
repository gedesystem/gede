<?php
require_once('funcoes_uteis.php');

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

$id_inep = isset($_POST["nIdAluno"]) ? $_POST["nIdAluno"] : "";
$id_ies = isset($_POST["nIdIES"]) ? $_POST["nIdIES"] : "";
$cpf = isset($_POST["nCpf"]) ? $_POST["nCpf"] : "";
$documento_estrangeiro = isset($_POST["nDocumentoEstrangeiro"]) ? $_POST["nDocumentoEstrangeiro"] : "";
$nome = isset($_POST["nNome"]) ? $_POST["nNome"] : "";
$nome_mae = isset($_POST["nNomeMae"]) ? $_POST["nNomeMae"] : "";
$sexo = isset($_POST["nSexo"]) ? $_POST["nSexo"] : "";
$cor_raca = isset($_POST["nCor"]) ? $_POST["nCor"] : "";
$data_nascimento = isset($_POST["nNascimento"]) ? $_POST["nNascimento"] : "";
$nacionalidade = isset($_POST["nNacionalidade"]) ? $_POST["nNacionalidade"] : "";
$codigo_pais_origem = isset($_POST["nPaisOrigem"]) ? $_POST["nPaisOrigem"] : "";

$codigo_estado = isset($_POST["nCodigoEstado"]) ? $_POST["nCodigoEstado"] : "";
$codigo_municipio = isset($_POST["nCodigoMuni"]) ? $_POST["nCodigoMuni"] : "";
$deficiencia_transtorno_superdotacao = isset($_POST["nDeficienciaHabilidades"]) ? $_POST["nDeficienciaHabilidades"] : "";

//Deficiencias
if ($_POST["nDeficienciaHabilidades"] == "1") {
    $deficiencia_cegueira = isset($_POST["nCegueira"]) ? $_POST["nCegueira"] : "0";
    $deficiencia_baixa_visao = isset($_POST["nBaixaVisao"]) ? $_POST["nBaixaVisao"] : "0";
    $deficiencia_surdez = isset($_POST["nSurdez"]) ? $_POST["nSurdez"] : "0";
    $deficiencia_auditiva = isset($_POST["nAuditiva"]) ? $_POST["nAuditiva"] : "0";
    $deficiencia_fisica = isset($_POST["nFisica"]) ? $_POST["nFisica"] : "0";
    $deficiencia_surdocegueira = isset($_POST["nSurdocegueira"]) ? $_POST["nSurdocegueira"] : "0";
    $deficiencia_multipla = isset($_POST["nMultipla"]) ? $_POST["nMultipla"] : "0";
    $deficiencia_intelectual = isset($_POST["nIntelectual"]) ? $_POST["nIntelectual"] : "0";
    $deficiencia_autismo = isset($_POST["nAutismo"]) ? $_POST["nAutismo"] : "0";
    $deficiencia_asperger = isset($_POST["nAsperger"]) ? $_POST["nAsperger"] : "0";
    $deficiencia_rett = isset($_POST["nRett"]) ? $_POST["nRett"] : "0";
    $deficiencia_desintegrativo = isset($_POST["nTDI"]) ? $_POST["nTDI"] : "0";
    $superdotacao = isset($_POST["nAltasHabilidades"]) ? $_POST["nAltasHabilidades"] : "0";
} else {
    $deficiencia_cegueira = isset($_POST["nCegueira"]) ? $_POST["nCegueira"] : "";
    $deficiencia_baixa_visao = isset($_POST["nBaixaVisao"]) ? $_POST["nBaixaVisao"] : "";
    $deficiencia_surdez = isset($_POST["nSurdez"]) ? $_POST["nSurdez"] : "";
    $deficiencia_auditiva = isset($_POST["nAuditiva"]) ? $_POST["nAuditiva"] : "";
    $deficiencia_fisica = isset($_POST["nFisica"]) ? $_POST["nFisica"] : "";
    $deficiencia_surdocegueira = isset($_POST["nSurdocegueira"]) ? $_POST["nSurdocegueira"] : "";
    $deficiencia_multipla = isset($_POST["nMultipla"]) ? $_POST["nMultipla"] : "";
    $deficiencia_intelectual = isset($_POST["nIntelectual"]) ? $_POST["nIntelectual"] : "";
    $deficiencia_autismo = isset($_POST["nAutismo"]) ? $_POST["nAutismo"] : "";
    $deficiencia_asperger = isset($_POST["nAsperger"]) ? $_POST["nAsperger"] : "";
    $deficiencia_rett = isset($_POST["nRett"]) ? $_POST["nRett"] : "";
    $deficiencia_desintegrativo = isset($_POST["nTDI"]) ? $_POST["nTDI"] : "";
    $superdotacao = isset($_POST["nAltasHabilidades"]) ? $_POST["nAltasHabilidades"] : "";
}

conexao();

$sql_atualiza = "UPDATE alunos_dados_cadastrais SET id_inep='$id_inep', id_ies='$id_ies', nome='$nome', cpf='$cpf',"
        . " nome_mae='$nome_mae', documento_estrangeiro='$documento_estrangeiro',"
        . " data_nascimento='$data_nascimento', sexo='$sexo', cor_raca='$cor_raca', nacionalidade='$nacionalidade', "
        . "codigo_pais_origem='$codigo_pais_origem', codigo_estado='$codigo_estado', codigo_municipio='$codigo_municipio',"
        . " deficiencia_transtorno_superdotacao='$deficiencia_transtorno_superdotacao', deficiencia_cegueira='$deficiencia_cegueira', deficiencia_baixa_visao='$deficiencia_baixa_visao', "
        . "deficiencia_surdez='$deficiencia_surdez', deficiencia_auditiva='$deficiencia_auditiva', deficiencia_fisica='$deficiencia_fisica', deficiencia_surdocegueira='$deficiencia_surdocegueira',"
        . " deficiencia_multipla='$deficiencia_multipla',"
        . " deficiencia_intelectual='$deficiencia_intelectual', deficiencia_autismo='$deficiencia_autismo', deficiencia_asperger='$deficiencia_asperger', "
        . "deficiencia_rett='$deficiencia_rett', deficiencia_desintegrativo='$deficiencia_desintegrativo', superdotacao='$superdotacao' WHERE matricula_uefs=$Id";

mysql_query($sql_atualiza) or die("Não foi possivel atualizar:  " . mysql_error());

//echo '<img id="home" src="imagens/safebox2.png" width="128" alt="logo"/>';
echo '<h2 color: #6d7679>Registro atualizado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

header("refresh: 2; url=modulo_alunos.php");
?>

