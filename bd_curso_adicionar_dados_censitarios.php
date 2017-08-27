<?php
require_once('funcoes_uteis.php');

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$Id = $_POST["id"];

//Isset dos atributos
//$exemplo = isset($_POST["exemplo"]);

$ano = isset($_POST["nTipoAno"]);
$curso_teve_aluno_vinculado = isset($_POST["nAlunoVinculado"]);
$motivo_sem_aluno = isset($_POST["nMotivoSemAlunoVinculado"]);
//pagina nao possui codigo_curso
$codigo_curso_representado = isset($_POST["nCodigoRepresentado"]);
$curso_financ_convenio = isset($_POST["nConvenio"]);
$turno_curso = isset($_POST["nTurno"]);
$prazo_minimo_integraliacao = isset($_POST["nPrazoMinimo"]) ? $_POST["nPrazoMinimo"] : "";
$vagas_novas_oferecidas = isset($_POST["nVagasNovas"]) ? $_POST["nVagasNovas"] : "";
$inscritos_vagas_oferecidas = isset($_POST["nInscritosVagasNovas"]) ? $_POST["nInscritosVagasNovas"] : "";
$vagas_remanescentes = isset($_POST["nVagasRemanescentes"]) ? $_POST["nVagasRemanescentes"] : "";
$inscritos_vagas_remanescentes = isset($_POST["nInscritosVagasRemanescentes"]) ? $_POST["nInscritosVagasRemanescentes"] : "";
$vagas_programas_especiais = isset($_POST["nVagasEspeciais"]) ? $_POST["nVagasEspeciais"] : "";
$inscritos_vagas_especiais = isset($_POST["nInscritosVagasEspeciais"]) ? $_POST["nInscritosVagasEspeciais"] : "";
$curso_tem_acessibilidade = isset($_POST["nCondicoesEnsino"]);

$recursos_braille = isset($_POST["nBraille"]) ? $_POST["nBraille"] : 0;
$recursos_audio = isset($_POST["nAudio"]) ? $_POST["nAudio"] : 0;
$recursos_informatica = isset($_POST["nInformaticaAcessivel"]) ? $_POST["nInformaticaAcessivel"] : 0;
$recursos_libras = isset($_POST["nTradutorLibras"]) ? $_POST["nTradutorLibras"] : 0;
$recursos_interprete = isset($_POST["nGuiaInterprete"]) ? $_POST["nGuiaInterprete"] : 0;
$recursos_libras_material = isset($_POST["nMaterialLibras"]) ? $_POST["nMaterialLibras"] : 0;
$recursos_ampliado = isset($_POST["nCaractereAmpliado"]) ? $_POST["nCaractereAmpliado"] : 0;
$recursos_tatil = isset($_POST["nTatil"]) ? $_POST["nTatil"] : 0;
$recursos_libras_cursos = isset($_POST["nDisciplinaLibras"]) ? $_POST["nDisciplinaLibras"] : 0;
$recursos_impresso = isset($_POST["nMaterialImpressoAcessivel"]) ? $_POST["nMaterialImpressoAcessivel"] : 0;
$recursos_acessibilidade = isset($_POST["nRecursosAcessibilidade"]) ? $_POST["nRecursosAcessibilidade"] : 0;
$recursos_digital = isset($_POST["nMaterialAcessivel"]) ? $_POST["nMaterialAcessivel"] : 0;

//pagina nao tem campo carga horaria semipresencial
//pagina nao tem campo utiliza laboratorios


conexao();

//Criar o comando sql
$sql_atualiza = "INSERT INTO curso_dados_censitarios (ano, curso_teve_aluno_vinculado, motivo_sem_aluno, codigo_curso_representado, "
        . "curso_financ_convenio, turno_curso, prazo_minimo_integralizacao, vagas_novas_oferecidas, inscritos_vagas_oferecidas, "
        . "vagas_remanescentes, inscritos_vagas_remanescentes, vagas_programas_especiais, inscritos_vagas_especiais, curso_tem_acessibilidade, "
        . "recursos_braille, recursos_audio, recursos_informatica, recursos_libras, recursos_interprete, recursos_libras_material, "
        . "recursos_ampliado, recursos_tatil, recursos_libras_cursos, recursos_impresso, recursos_acessibilidade, recursos_digital) VALUES "
        . "('" . $ano . "', '" . $curso_teve_aluno_vinculado . "', '" . $motivo_sem_aluno . "', '" . $codigo_curso_representado . "', '" 
        . $curso_financ_convenio . "', '" . $turno_curso . "', '" . $prazo_minimo_integraliacao . "', '" . $vagas_novas_oferecidas . "', "
        . "'" . $inscritos_vagas_oferecidas . "', '" . $vagas_remanescentes . "', '" . $inscritos_vagas_remanescentes . "', "
        . "'" . $vagas_programas_especiais . "', '" . $inscritos_vagas_especiais . "', '" . $curso_tem_acessibilidade . "', "
        . "'" . $recursos_braille . "', '" . $recursos_audio . "', '" . $recursos_informatica . "', '" . $recursos_libras . "', "
        . "'" . $recursos_interprete . "', '" . $recursos_libras_material . "', '" . $recursos_ampliado . "', '" . $recursos_tatil . "', "
        . "'" . $recursos_libras_cursos . "', '" . $recursos_impresso . "', '" . $recursos_acessibilidade . "', '" . $recursos_digital . "')";

mysql_query($sql_atualiza) or die("Não foi possivel adicionar:  " . mysql_error());

echo '<h2 color: #6d7679>Registro adicionado e salvo com sucesso!</h2>';
echo '<h3 color: #6d7679>Redirecionando em 2 segundos...</h3>';

//Criar o caminho do redirecionamento 
header("refresh: 2; url=modulo_cursos.php");
?>