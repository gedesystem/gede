<?php
require_once 'classes/importacao/ImportStrategy.class.php';

/**
 *
 */
class ImportAlunosMobilidade extends ImportStrategy
{
    protected function validarLinha(array $linha)
    {
        $linha = $this->formatarData($linha, 5, 6);
        return $linha;
    }

    protected function salvar(array $linha)
    {
        $tipo = ('' . $linha[1]);
        $valores = $tipo;

        // se o tipo da mobilidade for nacional
        if ($tipo == '1') {
            $iesDestino = $linha[2];
            // seta os campos relativo à mobilidade internacional para null
            $valores = ($valores . "', '$iesDestino', null, null, '");

        // se o tipo da mobilidade for internacional
        } elseif ($tipo == '2') {
            $tipoInternacional = $linha[3];
            $paisDestino = $linha[4];
            // seta os campos relativo à mobilidade nacional para null
            $valores = ($valores . "', null, '$tipoInternacional', '$paisDestino', '");
        }

        $valores = ($valores . implode("', '", array_slice($linha, 5)));
        $colaborador = $_SESSION['nome'];

        $sql = ("INSERT INTO `alunos_mobilidade`(
            `matricula_uefs`, `tipo`, `ies_destino`,
            `tipo_mobilidade_internacional`, `pais_destino`,
            `inicio`, `fim`, `observacao`, `fonte`, `colaborador`)
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
