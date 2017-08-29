<?php
require_once 'ImportStrategy.class.php';
require_once 'classes/importacao/ImportDocentesPesquisaExtensao.class.php';
require_once 'classes/importacao/ImportDocentes.class.php';
require_once 'classes/importacao/ImportDocentesTemporarios.class.php';
require_once 'classes/importacao/ImportDocentesEnsino.class.php';
require_once 'classes/importacao/ImportDocentesPosGraduacao.class.php';
require_once 'classes/importacao/ImportDocentesRegimeTrabalho.class.php';
require_once 'classes/importacao/ImportSituacaoDocentes.class.php';
require_once 'classes/importacao/ImportDocentesVinculoDocentes.class.php';
require_once 'classes/importacao/ImportDocentesVinculoIes.class.php';
require_once 'classes/importacao/ImportDocentesGPA.class.php';
require_once 'classes/importacao/ImportAlunosDadosCadastrais.class.php';
require_once 'classes/importacao/ImportAlunosEstagio.class.php';
require_once 'classes/importacao/ImportAlunosExtensao.class.php';
require_once 'classes/importacao/ImportAlunosMobilidade.class.php';
require_once 'classes/importacao/ImportAlunosMonitoria.class.php';
require_once 'classes/importacao/ImportAlunosPesquisa.class.php';
require_once 'classes/importacao/ImportCursosDadosCensitarios.class.php';
require_once 'classes/importacao/ImportCursosDadosCadastrais.class.php';
require_once 'classes/importacao/ImportCursosLaboratorios.class.php';
require_once 'classes/importacao/ImportAlunosDadosCursos.class.php';
require_once 'classes/importacao/ImportAlunosIngresso.class.php';

/**
 *
 */
class ImportFactory
{

    public static function criar($tipoDeDado, $arquivo)
    {
        switch ($tipoDeDado) {

        case 0: return new ImportAlunosEstagio($arquivo); break;

        case 1: return new ImportAlunosExtensao($arquivo); break;

        case 2: return new ImportAlunosMobilidade($arquivo); break;

        case 3: return new ImportAlunosMonitoria($arquivo); break;

        case 4: return new ImportAlunosPesquisa($arquivo); break;

        case 5: return new ImportAlunosDadosCadastrais($arquivo); break;

        case 6: return new ImportCursosDadosCensitarios($arquivo); break;

        case 7: return new ImportCursosDadosCadastrais($arquivo); break;

        case 8: return new ImportCursosLaboratorios($arquivo); break;

        case 9: return new ImportDocentesPesquisaExtensao($arquivo, 0); break;

        case 10: return new ImportDocentesPesquisaExtensao($arquivo, 1); break;

        // docentes_dados_cadastrais
        case 11: return new ImportDocentes($arquivo); break;

        case 12: return new ImportDocentesEnsino($arquivo, 0); break;

        case 13: return new ImportDocentesEnsino($arquivo, 1); break;

        case 14: return new ImportDocentesEnsino($arquivo, 2); break;

        case 15: return new ImportDocentesEnsino($arquivo, 3); break;

        case 16: return new ImportDocentesGPA($arquivo); break;

        case 17: return new ImportDocentesPosGraduacao($arquivo); break;

        case 18: return new ImportDocentesRegimeTrabalho($arquivo); break;

        case 19: return new ImportSituacaoDocentes($arquivo); break;

        case 20: return new ImportDocentesTemporarios($arquivo); break;

        case 21: return new ImportDocentesVinculoDocentes($arquivo); break;

        case 22: return new ImportDocentesVinculoIes($arquivo); break;

        case 23: return new ImportAlunosDadosCursos($arquivo); break;

        case 24: return new ImportAlunosIngresso($arquivo); break;

        default:
            echo '<h3 color: #6d7679>Não suportado! Redirecionando em 3 segundos...</h3>';
            header("refresh: 2; url=importacao.php");
            break;

        }
    }
}

?>
