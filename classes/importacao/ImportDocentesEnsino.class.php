<?php

require_once 'classes/importacao/ImportStrategy.class.php';

/**
 *
 *
 */
class ImportDocentesEnsino extends ImportStrategy
{
    private $tipo;
    /**
     * Cria o objeto responsável por importar dados para
     * as tabelas de aconrdo com o tipo informado:
     * docentes_ensino_curso_ead            0
     * docentes_ensino_graduacao_presencial 1
     * docentes_ensino_pos_distancia        2
     * docentes_ensino_pos_presencial       3
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
        $tabela = "";
        switch ($this->tipo) {
            case 0: $tabela = "docentes_ensino_curso_ead"; break;
            case 1: $tabela = "docentes_ensino_graduacao_presencial"; break;
            case 2: $tabela = "docentes_ensino_pos_distancia"; break;
            case 3: $tabela = "docentes_ensino_pos_presencial"; break;
        }
        $valores = implode("', '", array_slice($linha, 1));
        $colaborador = $_SESSION['nome'];

        $sql = ("INSERT INTO `$tabela`(
            `matricula_uefs`, `data`, `observacoes`, `fonte`, `colaborador`)
            SELECT `matricula_uefs`, '$valores', '$colaborador'
            FROM `docentes_dados_cadastrais`
            WHERE `matricula_uefs`=" . $linha[0]);

        if (mysql_query($sql)) {
            $linhasInseridas = mysql_affected_rows();
            if ($linhasInseridas == 0)
                throw new SaveException(
                    $this->leitorExcel->getlinhaIndex(),
                    ("Não foi possível salvar esse registro.
                    Verifique se existe docente com a matrícula " . $linha[0])
                );
            else return $linhasInseridas;
        } else throw new SaveException($this->leitorExcel->getlinhaIndex());
    }
}


 ?>
