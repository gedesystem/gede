<?php

require_once 'classes/exportacao/ExportadorSimples.class.php';
/**
 *
 */
class ExportFactory
{

    public static function criar($tipoDado)
    {
        switch ($tipoDado) {
            case 3: // docentes_dados_cadastrais
                return new ExportadorSimples(TEMP_DIR . 'docentes_dados_cadastrais.xlsx', '`docentes_dados_cadastrais`',
                    '`id_inep`, `id_ies`, `matricula_uefs`, `cpf`, `documento_estrangeiro`,
                    `nome`, `nome_mae`, `sexo`, `cor_raca`, `data_nascimento`, `nacionalidade`,
                    `codigo_pais_origem`, `codigo_uf`, `codigo_municipio`, `deficiencia_cegueira`,
                    `deficiencia_baixa_visao`, `deficiencia_surdez`, `deficiencia_auditiva`,
                    `deficiencia_fisica`, `deficiencia_surdocegueira`, `deficiencia_multipla`,
                    `deficiencia_intelectual`, `uf_nascimento`',
                    ["Codigo INEP", "Codigo IES", "Matrícula UEFS", "CPF",
                    "Documento Estrangeiro", "Nome", "Nome da Mãe", "Sexo",
                    "Cor/Raça", "Data de Nascimento", "Nacionalidade",
                    "Codigo do País de Origem", "Codigo da UF", "Codigo do Município",
                    "Deficiência: Cegueira", "Deficiência: Baixa Visão", "Deficiência: Surdez",
                    "Deficiência Auditiva", "Deficiência: Física", "Deficiência: Surdocegueira",
                    "Deficiência Múltipla", "Deficiência Intelectual", "UF de nascimento"])
                    ->formatarData(9);
                break;

            case 4: // docentes_temporarios
                return new ExportadorSimples(TEMP_DIR . 'docentes_temporarios.xlsx',
                    '`docentes_temporarios`', '`id_docente`, `tipo`, `data`, `tipo_vinculo`, `observacoes`'
                    ['Matrícula UEFS', 'Tipo', 'Data de inicio da atuação', 'Tipo de vínculo', 'Observações']
                );
                break;

            default:
                # code...
                break;
        }
    }
}

 ?>
