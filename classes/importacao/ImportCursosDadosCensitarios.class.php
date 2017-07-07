<?php
require_once 'classes/importacao/ImportStrategy.class.php';

/**
 *
 */
class ImportCursosDadosCensitarios extends ImportStrategy
{
    protected function validarLinha(array $linha)
    {
        $acessibilidade = ('' . $linha[14]);
        if ($acessibilidade == '0') {
            for ($i = 15; $i < 27; $i++) {
                $linha[$i] = '0';
            }
        }

        $ofereceSemiPresencial = ('' . $linha[27]);
        if ($ofereceSemiPresencial == '0') $linha[28] = '0';

        $teveAlunoVinculado = ('' . $linha[2]);
        $motivoSemAluno = ('' . $linha[3]);
        $linha[3] = ($teveAlunoVinculado == '1') ? 'null' : "'$motivoSemAluno'";

        return $linha;
    }

    protected function salvar(array $linha)
    {
        $valores = implode("', '", array_slice($linha, 1, 2));
        $motivoSemAluno = $linha[3];
        $valores = ($valores . "', $motivoSemAluno, '");
        $valores = ($valores . implode("', '", array_slice($linha, 4)));
        $colaborador = $_SESSION['nome'];

        $sql = ("INSERT INTO `curso_dados_censitarios`(
            `codigo_curso`,`ano`, `curso_teve_aluno_vinculado`,
            `motivo_sem_aluno`,  `codigo_curso_representado`,
            `curso_financ_convenio`, `turno_curso`,
            `prazo_minimo_integralizacao`, `vagas_novas_oferecidas`,
            `inscritos_vagas_oferecidas`, `vagas_remanecentes`,
            `inscritos_vagas_remanecentes`, `vagas_programas_especiais`,
            `inscritos_vagas_especiais`, `curso_tem_acessibilidade`,
            `recursos_braille`, `recursos_audio`, `recursos_informatica`,
            `recursos_libras`, `recursos_interprete`,
            `recursos_libras_material`, `recursos_ampliado`, `recursos_tatil`,
            `recursos_libras_cursos`, `recursos_impresso`,
            `recursos_acessibilidade`, `recursos_digital`,
            `oferece_semepresenciais`, `carga_horaria_semepresencial`,
            `utiliza_laboratorios`, `fonte`, `colaborador`)
            SELECT `codigo_curso`, '$valores', '$colaborador'
            FROM `cursos_dados_cadastrais`
            WHERE `codigo_curso`=" . $linha[0]);
            
        if (mysql_query($sql)) {
            $linhasInseridas = mysql_affected_rows();
            if ($linhasInseridas == 0)
                throw new SaveException(
                    $this->leitorExcel->getlinhaIndex(),
                    ("Não foi possível salvar esse registro.
                    Verifique se existe curso com o código " . $linha[0])
                );
            else return $linhasInseridas;
        } else throw new SaveException($this->leitorExcel->getlinhaIndex());
    }
}


 ?>
