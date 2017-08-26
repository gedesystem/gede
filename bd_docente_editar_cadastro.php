<?php

require_once('funcoes_uteis.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

$Matricula = $_POST["Matricula"];
$IdDocente = $_POST["IdDocente"];
$Cpf = $_POST["Cpf"];
$Nome = $_POST["Nome"];
$Nacimento = $_POST["Nacimento"];
$Sexo = $_POST["Sexo"];
$NomeMae = $_POST["NomeMae"];
$Cor = $_POST["Cor"];
$Nacionalidade = $_POST["Nacionalidade"];
$PaisOrigem = $_POST["PaisOrigem"];
$Uf = $_POST["Uf"];
$Municipio = $_POST["Municipio"];
$CodigoMuni = $_POST["CodigoMuni"];
$CodigoEstado = $_POST["CodigoEstado"];
$DeficienciaHabilidades = $_POST["DeficienciaHabilidades"];

//Deficiencias 
if ($_POST["DeficienciaHabilidades"] == "Sim") {
    $Cegueira = isset($_POST["Cegueira"]) ? $_POST["Cegueira"] : "Nao";
    $BaixaVisao = isset($_POST["BaixaVisao"]) ? $_POST["BaixaVisao"] : "Nao";
    $Surdez = isset($_POST["Surdez"]) ? $_POST["Surdez"] : "Nao";
    $Auditiva = isset($_POST["Auditiva"]) ? $_POST["Auditiva"] : "Nao";
    $Fisica = isset($_POST["Fisica"]) ? $_POST["Fisica"] : "Nao";
    $Surdocegueira = isset($_POST["Surdocegueira"]) ? $_POST["Surdocegueira"] : "Nao";
    $Multipla = isset($_POST["Multipla"]) ? $_POST["Multipla"] : "Nao";
    $Intelectual = isset($_POST["Intelectual"]) ? $_POST["Intelectual"] : "Nao";
} else {
    $Cegueira = isset($_POST["Cegueira"]) ? $_POST["Cegueira"] : "";
    $BaixaVisao = isset($_POST["BaixaVisao"]) ? $_POST["BaixaVisao"] : "";
    $Surdez = isset($_POST["Surdez"]) ? $_POST["Surdez"] : "";
    $Auditiva = isset($_POST["Auditiva"]) ? $_POST["Auditiva"] : "";
    $Fisica = isset($_POST["Fisica"]) ? $_POST["Fisica"] : "";
    $Surdocegueira = isset($_POST["Surdocegueira"]) ? $_POST["Surdocegueira"] : "";
    $Multipla = isset($_POST["Multipla"]) ? $_POST["Multipla"] : "";
    $Intelectual = isset($_POST["Intelectual"]) ? $_POST["Intelectual"] : "";
}

conexao();

$sql_atualiza = "UPDATE docentes_dados_cadastrais SET id_inep='$IdDocente', matricula_uefs='$Matricula', cpf='$Cpf', nome='$Nome', data_nascimento='$Nacimento',"
        . " sexo='$Sexo', nome_mae='$NomeMae', "
        . "cor_raca='$Cor', nacionalidade='$Nacionalidade', codigo_pais_origem='$PaisOrigem', codigo_uf='$Uf',"
        . "codigo_municipio='$Municipio', deficiencia='$DeficienciaHabilidades', deficiencia_cegueira='$Cegueira',"
        . " deficiencia_baixa_visao='$BaixaVisao', deficiencia_surdez='$Surdez', deficiencia_auditiva='$Auditiva', deficiencia_fisica='$Fisica',"
        . " deficiencia_surdocegueira='$Surdocegueira',"
        . " deficiencia_multipla='$Multipla', deficiencia_intelectual='$Intelectual' WHERE id=$Id";
mysql_query($sql_atualiza) or die("Não foi possivel excluir:  " . mysql_error());

echo '<h2 color: #6d7679>Registro atualizado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 3 segundos...</h3>';

header("refresh: 2; url=modulo_professores.php");
?>