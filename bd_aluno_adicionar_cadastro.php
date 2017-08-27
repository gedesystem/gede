<?php
require_once('funcoes_uteis.php');

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

//Isset dos atributos
//$exemplo = isset($_POST["exemplo"]);

$id_inep = isset($_POST["nIdAluno"]) ? $_POST["nIdAluno"] : "";
//página adicionar_aluno não possui campo para id_ies
$matricula_uefs = isset($_POST["nMatricula"]) ? $_POST["nMatricula"] : "";
$cpf = isset($_POST["nCpf"]);
$nome = isset($_POST["nNome"]);
$data_nascimento = isset($_POST["nNascimento"]) ? $_POST["nNascimento"] : "";
$sexo = isset($_POST["nSexo"]);
$nome_mae = isset($_POST["nNomeMae"]) ? $_POST["nNomeMae"] : "";
$cor_raca = isset($_POST["nCor"]);
$nacionalidade = isset($_POST["nNacionalidade"]);
$codigo_pais_origem = isset($_POST["nPaisOrigem"]) ? $_POST["nPaisOrigem"] : "";
//BD aluno_dados_cadastrais não possui campo uf_nascimento
//ou municipio_nascimento
$codigo_estado = isset($_POST["nCodigoEstado"]) ? $_POST["nCodigoEstado"] : "";
$codigo_municipio = isset($_POST["nCodigoMuni"]) ? $_POST["nCodigoMuni"] : "";
$deficiencia_transtorno_superdotacao = isset($_POST["nDeficienciaHabilidades"]);


    $deficiencia_cegueira = isset($_POST["nCegueira"]);
    $deficiencia_baixa_visao = isset($_POST["nBaixaVisao"]);
    $deficiencia_surdez = isset($_POST["nSurdez"]);
    $deficiencia_auditiva = isset($_POST["nAuditiva"]);
    $deficiencia_fisica = isset($_POST["nFisica"]);
    $deficiencia_surdocegueira = isset($_POST["nSurdocegueira"]);
    $deficiencia_multipla = isset($_POST["nMultipla"]);
    $deficiencia_intelectual = isset($_POST["nIntelectual"]);
    $deficiencia_autismo = isset($_POST["nAutismo"]);
    $deficiencia_asperger = isset($_POST["nAsperger"]);
    $deficiencia_rett = isset($_POST["nRett"]);
    $deficiencia_desintegrativo = isset($_POST["nTDI"]);
    $superdotacao = isset($_POST["nAltasHabilidades"]);


conexao();

//Criar o comando sql
$sql_atualiza = "INSERT INTO aluno_dados_cadastrais (id_inep, id_ies, matricula_uefs, cpf, documento_estrangeiro, nome, nome_mae,"
        . " sexo, cor_raca, data_nascimento, nacionalidade, codigo_pais_origem, codigo_estado, codigo_municipio, deficiencia_transtorno_superdotacao,"
        . " deficiencia_cegueira, deficiencia_baixa_visao, deficiencia_surdez, deficiencia_auditiva, deficiencia_fisica, deficiencia_surdocegueira,"
        . " deficiencia_multipla, deficiencia_intelectual, deficiencia_autismo, deficiencia_asperger, deficiencia_rett,"
        . " deficiencia_desintegrativo, superdotacao) VALUES ('" . $id_inep . "', '" . $matricula_uefs . "', '" . $cpf . "', '" . $documento_estrangeiro . "',"
        . " '" . $nome . "', '" . $nome_mae . "', '" . $sexo . "', '" . $cor_raca . "', '" . $data_nascimento . "', '" . $nacionalidade . "',"
        . " '" . $codigo_pais_origem . "', '" . $codigo_estado . "', '" . $codigo_municipio . "', '" . $deficiencia_transtorno_superdotacao . "',"
        . " '" . $deficiencia_cegueira . "', '" . $deficiencia_baixa_visao . "', '" . $deficiencia_surdez . "', '" . $deficiencia_auditiva . "',"
        . " '" . $deficiencia_fisica . "', '" . $deficiencia_surdocegueira . "', '" . $deficiencia_desintegrativo . "', '" . $superdotacao . "')";

mysql_query($sql_atualiza) or die("Não foi possivel adicionar:  " . mysql_error());

echo '<h2 color: #6d7679>Registro adicionado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 2 segundos...</h3>';

//Criar o caminho do redirecionamento 
header("refresh: 2; url=modulo_alunos.php");
?>