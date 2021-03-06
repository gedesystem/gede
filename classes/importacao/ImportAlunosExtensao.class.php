<?php
require_once 'classes/importacao/ImportStrategy.class.php';

/**
 *
 */
class ImportAlunosExtensao extends ImportStrategy
{
    protected function validarLinha(array $linha)
    {
        $linha = $this->formatarData($linha, 5, 6);

        return $linha;
    }

    protected function salvar(array $linha)
    {
        $valores = implode("', '", array_slice($linha, 1));
        $colaborador = $_SESSION['nome'];

        $sql = ("INSERT INTO `alunos_extensao`(
            `matricula_uefs`, `remuneracao`, `orientador`, `tipo`,
            `titulo_projeto`, `inicio`, `fim`, `observacao`,
            `fonte`, `colaborador`)
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
