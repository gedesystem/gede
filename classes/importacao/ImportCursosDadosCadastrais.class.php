<?php
require_once 'classes/importacao/ImportStrategy.class.php';

/**
 *
 */
class ImportCursosDadosCadastrais extends ImportStrategy
{
    protected function validarLinha(array $linha)
    {
        $linha = $this->formatarData($linha, 7, 8);

        return $linha;
    }

    protected function salvar(array $linha)
    {
        $sql = "INSERT INTO `cursos_dados_cadastrais`(
            `codigo_curso`, `nome`, `grau`, `modalidade`,
            `nivel_academico`, `tipo_ingresso`, `carga_horaria`,
            `inicio_funcionamento`, `data_autorizacao`,
            `situacao_emec`, `gratuito`, `fonte`, `colaborador`)
            VALUES ";

        $valores = implode("', '", $linha);
        $colaborador = $_SESSION['nome'];

        if (mysql_query(($sql . "('$valores', '$colaborador')"))) return mysql_affected_rows();
        else throw new SaveException($this->leitorExcel->getlinhaIndex());
    }
}
 ?>
