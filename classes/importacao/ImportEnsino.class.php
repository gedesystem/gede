<?php

require_once 'classes/importacao/ImportStrategy.class.php';

/**
 *
 *
 */
class ImportEnsino extends ImportStrategy
{
    private $tipo;
    /**
     * Cria o objeto responsável por importar dados para
     * as tabelas de aconrdo com o tipo informado:
     * ensino_curso_ead            0
     * ensino_graduacao_presencial 1
     * ensino_pos_distancia        2
     * ensino_pos_presencial       3
     *
     * @param string $arquivo
     * @param int $tipo
     */
    function __construct($arquivo, $tipo)
    {
        parent::__construct($arquivo);
        $this->tipo = $tipo;
    }

    protected function validarLinha(array $linha)
    {
        $linha = $this->formatarData($linha, 1);

        return $linha;
    }

    protected function salvar(array $linha)
    {
        $sql = "CALL `importar_ensino`('" . implode("', '", $linha) . "', " . $this->tipo . ")";
        if (mysql_query($sql)) return mysql_affected_rows();
        else throw new SaveException($this->leitorExcel->getlinhaIndex());
    }
}


 ?>
