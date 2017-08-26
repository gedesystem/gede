<?php
require_once 'classes/importacao/ImportStrategy.class.php';

/**
 *
 */
class ImportAlunosDadosCursos extends ImportStrategy
{
    protected function validarLinha(array $linha)
    {
        $situacao_aluno = (''. $linha[4]);
        $semestre_ingresso = (''. $linha[2]);
        $semestre_conclusao = (''. $linha[3]);

        if (empty($semestre_ingresso) ||
            (preg_match("/0(1|2)[0-9]{4}/", $semestre_ingresso) === 0)) {
            throw new ImportException($this->leitorExcel->getlinhaIndex(),
            "O semestre de ingresso não foi informado ou o formato é inválido.");
        } else {
            $linha[2] = "'$semestre_ingresso'";
        }

        if ($situacao_aluno != '6') {
            $linha[3] = 'null';
        } elseif (empty($semestre_conclusao) ||
            (preg_match("/0(1|2)[0-9]{4}/", $semestre_conclusao) === 0)) {
            throw new ImportException($this->leitorExcel->getlinhaIndex(),
            "O semestre de conclusão não foi informado ou o formato é inválido.");
        } else {
            $linha[3] = "'$semestre_conclusao'";
        }

        return $linha;
    }

    protected function salvar(array $linha)
    {
        $valores = implode(", ", array_slice($linha, 2, 2));
        $valores = ("$valores, '" . implode("', '", array_slice($linha, 4)));
        $colaborador = $_SESSION['nome'];

        $sql = ("INSERT INTO `alunos_dados_cursos`(
            `matricula_uefs`, `codigo_curso`, `semestre_ingresso`,
            `semestre_conclusao`, `situacao`, `turno`,
            `ch_total`, `ch_integralizada`, `aluno_parfor`, `observacao`,
            `fonte`, `colaborador`)
            SELECT `alunos_dados_cadastrais`.`matricula_uefs`,
                `cursos_dados_cadastrais`.`codigo_curso`,
                $valores', '$colaborador'
            FROM `alunos_dados_cadastrais`, `cursos_dados_cadastrais`
            WHERE `alunos_dados_cadastrais`.`matricula_uefs`=" . $linha[0] .
            " AND `cursos_dados_cadastrais`.`codigo_curso`=" . $linha[1]);

        //echo "$sql <br>";

        if (mysql_query($sql)) {
            $linhasInseridas = mysql_affected_rows();
            if ($linhasInseridas == 0)
                throw new SaveException(
                    $this->leitorExcel->getlinhaIndex(),
                    ("Não foi possível salvar esse registro.
                    Verifique se existe aluno com a matrícula " . $linha[0] .
                    " ou curso com o código " . $linha[1])
                );
            else return $linhasInseridas;
        } else throw new SaveException($this->leitorExcel->getlinhaIndex());
    }
}


 ?>
