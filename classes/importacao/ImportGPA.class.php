<?php
require_once 'classes/importacao/ImportStrategy.class.php';

/**
 *
 */
class ImportGPA extends ImportStrategy
{
    protected function validarLinha(array $linha)
    {
        $linha = $this->formatarData($linha, 0);

        return $linha;
    }

    protected function salvar(array $linha)
    {
        $sql = "INSERT INTO `gestao_planejamento_avaliacao`(`data`, `especificacao`) VALUES  ";

        $valores = implode("', '", $linha);

        if (mysql_query(($sql . "('$valores')"))) return mysql_affected_rows();
        else throw new SaveException($this->leitorExcel->getlinhaIndex());
    }
}
 ?>
