<?php
require_once 'classes/importacao/ImportStrategy.class.php';

/**
 *
 */
class ImportDocentesTemporarios extends ImportStrategy
{
    protected function validarLinha(array $linha)
    {
        $linha = $this->formatarData($linha, 2);

        return $linha;
    }

    protected function salvar(array $linha)
    {
        $sql = "CALL `importar_docente_temporario`('" . implode("', '", $linha) . "')";
        if (mysql_query($sql)) return mysql_affected_rows();
        else throw new SaveException($this->leitorExcel->getlinhaIndex());
    }
}
 ?>
