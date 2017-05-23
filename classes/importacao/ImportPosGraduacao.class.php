<?php
require_once 'classes/importacao/ImportStrategy.class.php';
/**
 *
 */
class ImportPosGraduacao extends ImportStrategy
{

    protected function validarLinha(array $linha)
    {
        $linha = $this->formatarData($linha, 0);

        return $linha;
    }

    protected function salvar(array $linha)
    {
        $sql = "CALL `importar_pos_graduacao`('" . implode("', '", $linha) . "')";
        if (mysql_query($sql)) return mysql_affected_rows();
        else throw new SaveException($this->leitorExcel->getlinhaIndex());
    }
}

 ?>
