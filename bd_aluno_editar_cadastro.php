<?php
require_once('funcoes_uteis.php');

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

$id_inep = isset($_POST["id_inep"]) ? $_POST["id_inep"] : "";
$id_ies = isset($_POST["id_ies"]) ? $_POST["id_ies"] : "";
$matricula_uefs = $_POST["matricula_uefs"];
$cpf = isset($_POST["cpf"]) ? $_POST["cpf"] : "";
$documento_estrangeiro = isset($_POST["documento_estrangeiro"]) ? $_POST["documento_estrangeiro"] : "";
$nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
$nome_mae = isset($_POST["nome_mae"]) ? $_POST["nome_mae"] : "";
$sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : "";
$cor_raca = isset($_POST["cor_raca"]) ? $_POST["cor_raca"] : "";
$data_nascimento = isset($_POST["data_nascimento"]) ? $_POST["data_nascimento"] : "";
$nacionalidade = isset($_POST["nacionalidade"]) ? $_POST["nacionalidade"] : "";
$codigo_pais_origem = isset($_POST["codigo_pais_origem"]) ? $_POST["codigo_pais_origem"] : "";

$codigo_estado = isset($_POST["codigo_estado"]) ? $_POST["codigo_estado"] : "";
$codigo_municipio = isset($_POST["codigo_municipio"]) ? $_POST["codigo_municipio"] : "";
$deficiencia_transtorno_superdotacao = isset($_POST["deficiencia_transtorno_superdotacao"]) ? $_POST["deficiencia_transtorno_superdotacao"] : "";

//Deficiencias
if ($_POST["deficiencia_transtorno_superdotacao"] == "1") {
    $deficiencia_cegueira = isset($_POST["deficiencia_cegueira"]) ? $_POST["deficiencia_cegueira"] : "0";
    $deficiencia_baixa_visao = isset($_POST["deficiencia_baixa_visao"]) ? $_POST["deficiencia_baixa_visao"] : "0";
    $deficiencia_surdez = isset($_POST["deficiencia_surdez"]) ? $_POST["deficiencia_surdez"] : "0";
    $deficiencia_auditiva = isset($_POST["deficiencia_auditiva"]) ? $_POST["deficiencia_auditiva"] : "0";
    $deficiencia_fisica = isset($_POST["deficiencia_fisica"]) ? $_POST["deficiencia_fisica"] : "0";
    $deficiencia_surdocegueira = isset($_POST["deficiencia_surdocegueira"]) ? $_POST["deficiencia_surdocegueira"] : "0";
    $deficiencia_multipla = isset($_POST["deficiencia_multipla"]) ? $_POST["deficiencia_multipla"] : "0";
    $deficiencia_intelectual = isset($_POST["deficiencia_intelectual"]) ? $_POST["deficiencia_intelectual"] : "0";
    $deficiencia_autismo = isset($_POST["deficiencia_autismo"]) ? $_POST["deficiencia_autismo"] : "0";
    $deficiencia_asperger = isset($_POST["deficiencia_asperger"]) ? $_POST["deficiencia_asperger"] : "0";
    $deficiencia_rett = isset($_POST["deficiencia_rett"]) ? $_POST["deficiencia_rett"] : "0";
    $deficiencia_desintegrativo = isset($_POST["deficiencia_desintegrativo"]) ? $_POST["deficiencia_desintegrativo"] : "0";
    $superdotacao = isset($_POST["superdotacao"]) ? $_POST["superdotacao"] : "0";
} else {
    $deficiencia_cegueira = isset($_POST["deficiencia_cegueira"]) ? $_POST["deficiencia_cegueira"] : "";
    $deficiencia_baixa_visao = isset($_POST["deficiencia_baixa_visao"]) ? $_POST["deficiencia_baixa_visao"] : "";
    $deficiencia_surdez = isset($_POST["deficiencia_surdez"]) ? $_POST["deficiencia_surdez"] : "";
    $deficiencia_auditiva = isset($_POST["deficiencia_auditiva"]) ? $_POST["deficiencia_auditiva"] : "";
    $deficiencia_fisica = isset($_POST["deficiencia_fisica"]) ? $_POST["deficiencia_fisica"] : "";
    $deficiencia_surdocegueira = isset($_POST["deficiencia_surdocegueira"]) ? $_POST["deficiencia_surdocegueira"] : "";
    $deficiencia_multipla = isset($_POST["deficiencia_multipla"]) ? $_POST["deficiencia_multipla"] : "";
    $deficiencia_intelectual = isset($_POST["deficiencia_intelectual"]) ? $_POST["deficiencia_intelectual"] : "";
    $deficiencia_autismo = isset($_POST["deficiencia_autismo"]) ? $_POST["deficiencia_autismo"] : "";
    $deficiencia_asperger = isset($_POST["deficiencia_asperger"]) ? $_POST["deficiencia_asperger"] : "";
    $deficiencia_rett = isset($_POST["deficiencia_rett"]) ? $_POST["deficiencia_rett"] : "";
    $deficiencia_desintegrativo = isset($_POST["deficiencia_desintegrativo"]) ? $_POST["deficiencia_desintegrativo"] : "";
    $superdotacao = isset($_POST["superdotacao"]) ? $_POST["superdotacao"] : "";
}

conexao();

$sql_atualiza = "UPDATE alunos_dados_cadastrais SET matricula_uefs='$matricula_uefs', id_inep='$id_inep', id_ies='$id_ies', nome='$nome', cpf='$cpf',"
        . " nome_mae='$nome_mae', documento_estrangeiro='$documento_estrangeiro',"
        . " data_nascimento='$data_nascimento', sexo='$sexo', cor_raca='$cor_raca', nacionalidade='$nacionalidade', "
        . "codigo_pais_origem='$codigo_pais_origem', codigo_estado='$codigo_estado', codigo_municipio='$codigo_municipio',"
        . " deficiencia_transtorno_superdotacao='$deficiencia_transtorno_superdotacao', deficiencia_Cegueira='$deficiencia_cegueira', deficiencia_baixaVisao='$deficiencia_baixa_visao', "
        . "deficiencia_surdez='$deficiencia_surdez', deficiencia_auditiva='$deficiencia_auditiva', deficiencia_fisica='$deficiencia_fisica', deficiencia_surdocegueira='$deficiencia_surdocegueira',"
        . " deficiencia_multipla='$deficiencia_multipla',"
        . " deficiencia_intelectual='$deficiencia_intelectual', deficiencia_autismo='$deficiencia_autismo', deficiencia_asperger='$deficiencia_asperger', "
        . "deficiencia_rett='$deficiencia_rett', deficiencia_desintegrativo='$deficiencia_desintegrativo', superdotacao='$superdotacao' WHERE id=$Id";

mysql_query($sql_atualiza) or die("Não foi possivel atualizar:  " . mysql_error());

//echo '<img id="home" src="imagens/safebox2.png" width="128" alt="logo"/>';
echo '<h2 color: #6d7679>Registro atualizado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

header("refresh: 2; url=menu_alunos.php");
?>

