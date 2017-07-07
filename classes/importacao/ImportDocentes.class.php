<?php
require_once 'classes/importacao/ImportStrategy.class.php';

/**
 *
 */
class ImportDocentes extends ImportStrategy
{
    protected function validarLinha(array $linha)
    {
        $linha = $this->formatarData($linha, 9);

        return $linha;
    }

    protected function salvar(array $linha)
    {
        $sql = "INSERT INTO `docentes_dados_cadastrais`(
            `id_inep`, `id_ies`, `matricula_uefs`, `cpf`,
            `documento_estrangeiro`, `nome`, `nome_mae`,
            `sexo`, `cor_raca`, `data_nascimento`, `nacionalidade`,
            `codigo_pais_origem`, `codigo_uf`, `codigo_municipio`,
            `deficiencia`, `deficiencia_cegueira`, `deficiencia_baixa_visao`,
            `deficiencia_surdez`, `deficiencia_auditiva`, `deficiencia_fisica`,
            `deficiencia_surdocegueira`, `deficiencia_multipla`,
            `deficiencia_intelectual`, `fonte`, `colaborador`) VALUES ";

        $valores = implode("', '", $linha);
        $colaborador = $_SESSION['nome'];

        if (mysql_query(($sql . "('$valores', '$colaborador')"))) return mysql_affected_rows();
        else throw new SaveException($this->leitorExcel->getlinhaIndex());
    }
}
 ?>
