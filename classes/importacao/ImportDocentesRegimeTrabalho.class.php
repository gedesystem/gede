<?php
require_once 'classes/importacao/ImportStrategy.class.php';
/**
 *
 *
 */
class ImportDocentesRegimeTrabalho extends ImportStrategy
{
    protected function validarLinha(array $linha)
    {
        $linha = $this->formatarData($linha, 1);

        return $linha;
    }

    protected function salvar(array $linha)
    {
        $valores = implode("', '", array_slice($linha, 1));
        $colaborador = $_SESSION['nome'];

        $sql = ("INSERT INTO `docentes_regime_trabalho`(
            `matricula_uefs`, `data`, `regime`,
            `observacoes`, `fonte`, `colaborador`)
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
