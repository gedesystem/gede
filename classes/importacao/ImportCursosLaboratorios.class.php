<?php
require_once 'classes/importacao/ImportStrategy.class.php';

/**
 *
 */
class ImportCursosLaboratorios extends ImportStrategy
{
    protected function validarLinha(array $linha)
    {

        return $linha;
    }

    protected function salvar(array $linha)
    {
        $valores = implode("', '", array_slice($linha, 1));
        $colaborador = $_SESSION['nome'];

        $sql = ("INSERT INTO `cursos_laboratorio`(
            `codigo_curso`, `codigo_laboratorio`, `fonte`, `colaborador`)
            SELECT `codigo_curso`, '$valores', '$colaborador'
            FROM `cursos_dados_cadastrais`
            WHERE `codigo_curso`=" . $linha[0]);

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
