<?php
require_once 'classes/importacao/ImportStrategy.class.php';
/**
 *
 */
class ImportDocentesPesquisaExtensao extends ImportStrategy
{
    private $tipo;

    function __construct($arquivo, $tipo)
    {
        parent::__construct($arquivo);
        $this->tipo = $tipo;
    }

    protected function validarLinha(array $linha)
    {
        $linha = $this->formatarData($linha, 2, 3);

        return $linha;
    }

    protected function salvar(array $linha)
    {
        $tabela = ($this->tipo == 0) ? "docentes_extensao" : "docentes_pesquisa";
        $valores = implode("', '", array_slice($linha, 1));
        $colaborador = $_SESSION['nome'];

        $sql = ("INSERT INTO `$tabela`(
            `matricula_uefs`, `titulo_projeto`,
            `inicio`, `fim`, `observacao`, `fonte`, `colaborador`)
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
