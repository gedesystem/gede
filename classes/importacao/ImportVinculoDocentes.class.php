<?php
require_once 'classes/importacao/ImportStrategy.class.php';

/**
 *
 */
class ImportVinculoDocentes extends ImportStrategy
{
    protected function validarLinha(array $linha)
    {
        // Nada a fazer por enquanto
        return $linha;
    }

    protected function salvar(array $linha)
    {
        $sql = "CALL `importar_vinculo_docentes`('" . implode("', '", $linha) . "')";
        if (mysql_query($sql)) return mysql_affected_rows();
        else throw new SaveException($this->leitorExcel->getlinhaIndex());
    }
}


 ?>
