<?php

//require_once "classes/importacao/ImportStrategy.class.php";
require_once 'classes/exportacao/ExportadorSimples.class.php';
require_once 'classes/excel/AnexadorExcel.class.php';
require_once 'classes/importacao/ImportDocentes.class.php';
require_once 'classes/importacao/ImportDocentesTemporarios.class.php';
require_once 'classes/importacao/ImportEnsino.class.php';

$import = new ImportEnsino("importar_ensino_curso_ead.xlsx", 0);//ImportDocentes("importar_docentes_dados_cadastrais.xlsx");
$import->fazerImportacao();
echo "hue";


// BEGIN
//
// DECLARE `aux` INT;
// SET @message = concat('Nao foi encontrado docente com o codigo de matricula ', `in_matricula`);
// SELECT `id_gede` INTO `aux` FROM `docentes_dados_cadastrais` WHERE `matricula_uefs`=`in_matricula`;
//
// IF `aux` IS NOT NULL THEN BEGIN
// 	INSERT INTO `docentes_temporarios`(`id_docente`, `tipo`, `data`, `tipo_vinculo`, `observacoes`) VALUES (`aux`, `in_tipo`, `in_data`, `in_vinculo`, `in_obs`);
// END;
// ELSE
// 	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = @message;
// END IF;
// END


// $export = new ExportadorSimples(3);
// $export->fazerExportacao();

// $annex = new AnexadorExcel("modelos/docentes_dados_cadastrais.xlsx", "temp/hue.xlsx");
// conexao();
// $result = mysql_query("CALL `recupera_dados_exportacao`(3)");
// $annex->escreverLinha(mysql_fetch_array($result, MYSQL_NUM));
// $annex->concluir();

// $export = new ExportadorSimples('hue.xlsx', '`docentes_dados_cadastrais`',
//     '`id_inep`, `id_ies`, `matricula_uefs`, `cpf`, `documento_estrangeiro`,
//     `nome`, `nome_mae`, `sexo`, `cor_raca`, `data_nascimento`, `nacionalidade`,
//     `codigo_pais_origem`, `codigo_uf`, `codigo_municipio`, `deficiencia_cegueira`,
//     `deficiencia_baixa_visao`, `deficiencia_surdez`, `deficiencia_auditiva`,
//     `deficiencia_fisica`, `deficiencia_surdocegueira`, `deficiencia_multipla`,
//     `deficiencia_intelectual`, `uf_nascimento`', ["Codigo INEP", "Codigo IES", "Matrícula UEFS", "CPF",
//             "Documento Estrangeiro", "Nome", "Nome da Mãe", "Sexo",
//             "Cor/Raça", "Data de Nascimento", "Nacionalidade",
//             "Codigo do País de Origem", "Codigo da UF", "Codigo do Município",
//             "Deficiência: Cegueira", "Deficiência: Baixa Visão", "Deficiência: Surdez",
//             "Deficiência Auditiva", "Deficiência: Física", "Deficiência: Surdocegueira",
//             "Deficiência Múltipla", "Deficiência Intelectual", "UF de nascimento"]);
// $export->formatarData(9)->fazerExportacao();
// require_once 'migracao_util.php';

// fazerImportacao('teste2.xlsx', '`docentes_dados_cadastrais`',
//     '`id_inep`, `id_ies`, `matricula_uefs`, `cpf`, `documento_estrangeiro`,
//     `nome`, `nome_mae`, `sexo`, `cor_raca`, `data_nascimento`, `nacionalidade`,
//     `codigo_pais_origem`, `codigo_uf`, `codigo_municipio`, `deficiencia_cegueira`,
//     `deficiencia_baixa_visao`, `deficiencia_surdez`, `deficiencia_auditiva`,
//     `deficiencia_fisica`, `deficiencia_surdocegueira`, `deficiencia_multipla`,
//     `deficiencia_intelectual`, `uf_nascimento`', function($linha){
//         $linha[9] = DateTime::createFromFormat('d/m/Y', $linha[9])->format('Y-m-d');
//         return array('sucesso' => true, 'linha' => $linha);
//     });

// $import = new ImportStrategy('teste.xlsx', '`cursos_dados_cadastrais`', '`codigo_curso`, `nome`,
//     `grau`, `modalidade`, `nivel_academico`, `tipo_ingresso`, `carga_horaria`,
//     `inicio_funcionamento`, `data_autorizacao`, `situacao_emec`, `gratuito`');
// $import->setColunasComData(7, 8)
//     ->fazerimportacao();

// $import = new ImportStrategy('teste2.xlsx', '`docentes_dados_cadastrais`',
//     '`id_inep`, `id_ies`, `matricula_uefs`, `cpf`, `documento_estrangeiro`,
//     `nome`, `nome_mae`, `sexo`, `cor_raca`, `data_nascimento`, `nacionalidade`,
//     `codigo_pais_origem`, `codigo_uf`, `codigo_municipio`, `deficiencia_cegueira`,
//     `deficiencia_baixa_visao`, `deficiencia_surdez`, `deficiencia_auditiva`,
//     `deficiencia_fisica`, `deficiencia_surdocegueira`, `deficiencia_multipla`,
//     `deficiencia_intelectual`, `uf_nascimento`');
// $import->fazerimportacao(function($linha){
//         $linha[9] = DateTime::createFromFormat('d/m/Y', $linha[9])->format('Y-m-d');
//         return array('sucesso' => true, 'linha' => $linha);
// });

// $import = new ImportStrategy('teste2_1.xlsx', '`docentes_temporarios`',
//     '`id_docente`, `tipo`, `data`, `tipo_vinculo`, `observacoes`');
// $import->setColunasComData(2)
//     ->setReferencia('docentes_dados_cadastrais', 'id_gede', 'matricula_uefs', 0)
//     ->fazerimportacao();


// function hue(...$lotsaArgs)
// {
//     $array = $lotsaArgs;
//     print_r($array);
// }
//
// hue(1,2,3,4,5,6,6,7,7);

// $vazio = array('', '', '', '', '', '', '', '', '');
// array_filter($vazio);
// if (empty($vazio)) {
//     echo "vazio" . PHP_EOL;
// }

?>
