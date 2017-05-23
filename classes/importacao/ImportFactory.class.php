<?php
require_once 'ImportStrategy.class.php';
require_once 'classes/importacao/ImportDocentes.class.php';
require_once 'classes/importacao/ImportDocentesTemporarios.class.php';
require_once 'classes/importacao/ImportEnsino.class.php';
require_once 'classes/importacao/ImportPosGraduacao.class.php';
require_once 'classes/importacao/ImportRegimeTrabalho.class.php';
require_once 'classes/importacao/ImportSituacaoDocentes.class.php';
require_once 'classes/importacao/ImportVinculoDocentes.class.php';
require_once 'classes/importacao/ImportVinculoDocentesIes.class.php';
require_once 'classes/importacao/ImportGPA.class.php';
require_once 'classes/importacao/ImportAlunosDadosCadastrais.class.php';

/**
 *
 */
class ImportFactory
{

    public static function criar($tipoDeDado, $arquivo)
    {
        switch ($tipoDeDado) {

        case 0: return new ImportAlunosDadosCadastrais($arquivo); break;

        // docentes_dados_cadastrais
        case 3: return new ImportDocentes($arquivo); break;

        // docentes_temporarios
        case 4: return new ImportDocentesTemporarios($arquivo); break;

        case 5: return new ImportEnsino($arquivo, 0); break;

        case 6: return new ImportEnsino($arquivo, 1); break;

        case 7: return new ImportEnsino($arquivo, 2); break;

        case 8: return new ImportEnsino($arquivo, 3); break;

        case 9: return new ImportGPA($arquivo); break;

        case 10: return new ImportPosGraduacao($arquivo); break;

        case 11: return new ImportRegimeTrabalho($arquivo); break;

        case 12: return new ImportSituacaoDocentes($arquivo); break;

        case 13: return new ImportVinculoDocentes($arquivo); break;

        case 14: return new ImportVinculoDocentesIes($arquivo); break;

        default:
            # code...
            break;

        }
    }
}

?>
