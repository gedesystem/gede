<?php
require_once 'classes/importacao/ImportStrategy.class.php';

/**
 *
 */
class ImportAlunosIngresso extends ImportStrategy
{
    protected function validarLinha(array $linha)
    {
        $reservaVaga = (''. $linha[4]);
        $semestre_ingresso = (''. $linha[2]);

        if (empty($semestre_ingresso) ||
            (preg_match("/0(1|2)[0-9]{4}/", $semestre_ingresso) === 0)) {
            throw new ImportException($this->leitorExcel->getlinhaIndex(),
            "O semestre de ingresso não foi informado ou o formato é inválido.");
        }

        if ($reservaVaga != '1') {
            $linha[5] = 'null';
        } else $linha[5] = ("'" . $linha[5] . "'");

        return $linha;
    }

    protected function salvar(array $linha)
    {
        $valores = implode("', '", array_slice($linha, 1, 4));
        $valores = ("$valores', " . $linha[5]);
        $valores = ("$valores, '" . implode("', '", array_slice($linha, 6)));
        $colaborador = $_SESSION['nome'];

        $sql = ("INSERT INTO `alunos_ingresso`(`matricula_uefs`, `tipo_escola`,
            `semestre_ingresso`, `forma_ingresso`, `reserva_vagas`,
            `tipo_reserva`, `financiamento`, `fonte`, `colaborador`)
            SELECT `matricula_uefs`, '$valores', '$colaborador'
            FROM `alunos_dados_cadastrais`
            WHERE `matricula_uefs`=" . $linha[0]);

        if (mysql_query($sql)) {
            $linhasInseridas = mysql_affected_rows();
            if ($linhasInseridas == 0)
                throw new SaveException(
                    $this->leitorExcel->getlinhaIndex(),
                    ("Não foi possível salvar esse registro.
                    Verifique se existe aluno com a matrícula " . $linha[0])
                );
            else return $linhasInseridas;
        } else throw new SaveException($this->leitorExcel->getlinhaIndex());
    }
}


 ?>
