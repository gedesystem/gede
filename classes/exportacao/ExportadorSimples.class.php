<?php
require_once 'funcoes_uteis.php';
require_once 'classes/excel/EscritorExcel.class.php';
require_once 'classes/excel/LeitorExcel.class.php';

/**
 *
 */
class ExportadorSimples
{
    protected $escritor;

    protected $indiceData;

    protected $arquivo;

    protected $categoria;

    protected $registrosRecuperados;

    protected $sqlQueries;

    function __construct($categoria)
    {
        $this->categoria = $categoria;
        $this->arquivo = EXPORT_DIR . date("d-m-Y") . MODELOS[$this->categoria] . ".xlsx";

        // Pega os titulos das colunas
        $reader = new LeitorExcel(MODELO_DIR . MODELOS[$this->categoria] . ".xlsx");
        $tituloColunas = $reader->proximaLinha();

        //pula uma linha e pega a legenda
        $reader->proximaLinha();
        $legenda = $reader->proximaLinha();

        $this->escritor = new EscritorExcel($this->arquivo, $tituloColunas);
        $this->escritor->escreverLinha($legenda);

        $this->registrosRecuperados = 0;

        $this->sqlQueries = array(
            "SELECT `matricula_uefs`, `local_trabalho`,
            date_format(`inicio`, '%d/%m/%Y'), date_format(`fim`, '%d/%m/%Y'),
            `observacao`, `fonte`
            FROM `alunos_estagio`",

            "SELECT `matricula_uefs`, `remuneracao`, `orientador`,
		    `tipo`, `titulo_projeto`, date_format(`inicio`, '%d/%m/%Y'),
		    date_format(`fim`, '%d/%m/%Y'), `observacao`, `fonte`
		    FROM `alunos_extensao`",

            "SELECT `matricula_uefs`, `tipo`, `ies_destino`,
		    `tipo_mobilidade_internacional`, `pais_destino`,
		    date_format(`inicio`, '%d/%m/%Y'), date_format(`fim`, '%d/%m/%Y'),
		    `observacao`, `fonte`
		    FROM `alunos_mobilidade`",

            "SELECT `matricula_uefs`, `remuneracao`,
		    date_format(`inicio`, '%d/%m/%Y'), date_format(`fim`, '%d/%m/%Y'),
		    `observacao`, `fonte` FROM `alunos_monitoria`",

            "SELECT `matricula_uefs`, `remuneracao`, `orientador`,
		    `titulo_plano_trabalho`, `titulo_projeto`, `modalidade`,
		    date_format(`inicio`, '%d/%m/%Y'), date_format(`fim`, '%d/%m/%Y'),
		    `observacao`, `fonte`
		    FROM `alunos_pesquisa`",

            "SELECT `id_inep`, `id_ies`, `matricula_uefs`, `cpf`,
		    `documento_estrangeiro`, `nome`, `nome_mae`, `sexo`, `cor_raca`,
		    date_format(`data_nascimento`, '%d/%m/%Y'), `nacionalidade`,
		    `codigo_pais_origem`, `codigo_estado`, `codigo_municipio`,
		    `deficiencia_transtorno_superdotacao`, `deficiencia_cegueira`,
		    `deficiencia_baixa_visao`, `deficiencia_surdez`,
		    `deficiencia_auditiva`, `deficiencia_fisica`,
		    `deficiencia_surdocegueira`, `deficiencia_multipla`,
		    `deficiencia_intelectual`, `deficiencia_autismo`,
		    `deficiencia_asperger`, `deficiencia_rett`,
		    `deficiencia_desintegrativo`, `superdotacao`, `fonte`
		    FROM `alunos_dados_cadastrais`",

            "SELECT `codigo_curso`, `ano`, `curso_teve_aluno_vinculado`,
		    `motivo_sem_aluno`, `codigo_curso_representado`,
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
		    `utiliza_laboratorios`, `fonte`
		    FROM `cursos_dados_censitarios`",

            "SELECT `codigo_curso`, `nome`, `grau`, `modalidade`,
		    `nivel_academico`, `tipo_ingresso`, `carga_horaria`,
		    date_format(`inicio_funcionamento`, '%d/%m/%Y'),
		    date_format(`data_autorizacao`, '%d/%m/%Y'), `situacao_emec`,
		    `gratuito`, `fonte`
		    FROM `cursos_dados_cadastrais`",

            "SELECT `codigo_curso`, `codigo_laboratorio`, `fonte`
		    FROM `cursos_laboratorio`",

            "SELECT `matricula_uefs`, `titulo_projeto`,
		    date_format(`inicio`, '%d/%m/%Y'), date_format(`fim`, '%d/%m/%Y'),
		    `observacao`, `fonte`
		    FROM `docentes_extensao`",

            "SELECT `matricula_uefs`, `titulo_projeto`,
		    date_format(`inicio`, '%d/%m/%Y'), date_format(`fim`, '%d/%m/%Y'),
		    `observacao`, `fonte`
		    FROM `docentes_pesquisa`",

            "SELECT `id_inep`, `id_ies`, `matricula_uefs`, `cpf`,
		    `documento_estrangeiro`, `nome`, `nome_mae`, `sexo`, `cor_raca`,
		    date_format(`data_nascimento`, '%d/%m/%Y'), `nacionalidade`,
		    `codigo_pais_origem`, `codigo_uf`, `codigo_municipio`,
		    `deficiencia`, `deficiencia_cegueira`, `deficiencia_baixa_visao`,
		    `deficiencia_surdez`, `deficiencia_auditiva`, `deficiencia_fisica`,
		    `deficiencia_surdocegueira`, `deficiencia_multipla`,
		    `deficiencia_intelectual`, `fonte`
		    FROM `docentes_dados_cadastrais`",

            "SELECT `matricula_uefs`, date_format(`data`, '%d/%m/%Y'),
		    `observacoes`, `fonte`
		    FROM `docentes_ensino_curso_ead`",

            "SELECT `matricula_uefs`, date_format(`data`, '%d/%m/%Y'),
		    `observacoes`, `fonte`
		    FROM `docentes_ensino_graduacao_presencial`",

            "SELECT `matricula_uefs`, date_format(`data`, '%d/%m/%Y'),
		    `observacoes`, `fonte`
		    FROM `docentes_ensino_pos_distancia`",

            "SELECT `matricula_uefs`, date_format(`data`, '%d/%m/%Y'),
		    `observacoes`, `fonte`
		    FROM `docentes_ensino_pos_presencial`",

            "SELECT  `matricula_uefs`, date_format(`data`, '%d/%m/%Y'),
		    `especificacao`, `fonte` FROM `docentes_gestao_planejamento_avaliacao`",

            "SELECT `matricula_uefs`, date_format(`data`, '%d/%m/%Y'),
		    `titulacao`, `observacoes`, `fonte`
		    FROM `docentes_pos_graduacao`",

            "SELECT `matricula_uefs`, date_format(`data`, '%d/%m/%Y'),
		    `regime`, `observacoes`, `fonte`
		    FROM `docentes_regime_trabalho`",

            "SELECT `matricula_uefs`, `situacao`, `observacoes`,
		    date_format(`inicio`, '%d/%m/%Y'),
		    date_format(`termino`, '%d/%m/%Y'), `fonte`
		    FROM `docentes_situacoes_docentes`",

            "SELECT `matricula_uefs`, date_format(`inicio`, '%d/%m/%Y'),
            date_format(`fim`, '%d/%m/%Y'), `tipo_docente_temporario`,
            `tipo_vinculo`, `observacoes`, `fonte`
		    FROM `docentes_temporarios`",

            "SELECT `matricula_uefs`, `codigo_curso`, `fonte`
		    FROM `docentes_vinculo_docentes`",

            "SELECT `matricula_uefs`, `departamento`, `classe`,
		    date_format(`data`, '%d/%m/%Y'), `fonte`
		    FROM `docentes_vinculo_ies`",

            "SELECT `matricula_uefs`, `codigo_curso`, `semestre_ingresso`,
            `semestre_conclusao`, `situacao`, `turno`,`ch_total`,
            `ch_integralizada`, `aluno_parfor`, `observacao`,`fonte`
            FROM `alunos_dados_cursos`",

            "SELECT `matricula_uefs`, `tipo_escola`, `semestre_ingresso`,
            `forma_ingresso`, `reserva_vagas`, `tipo_reserva`, `financiamento`,
            `fonte` FROM `alunos_ingresso`"
        );
    }

    public function getNomeDoArquivo()
    {
        return $this->arquivo;
    }

    public function fazerExportacao()
    {
        $report = "";
        $sucesso = 0;
        conexao();
        $sql = $this->sqlQueries[$this->categoria];//"CALL `recupera_dados_exportacao`($this->categoria)";//"SELECT ".$this->colunas." FROM ".$this->bdTabela;

        $result = mysql_query($sql);
        if ($result) {
            $this->registrosRecuperados = mysql_num_rows($result);

            for ($i = 0; $i < $this->registrosRecuperados; $i++)
                $this->escritor->escreverLinha($this->recuperarLinha($result));

            if ($this->registrosRecuperados > 0 )  {
                $report = "$this->registrosRecuperados registros recuperados";
                $sucesso = 1;
            } else $report = "Não existem registros cadastrados para exportação.";

        } else $report = ("Não foi possível recuperar os dados. Codigo de erro: " . mysql_errno());

        mysql_close();
        $this->escritor->fecharEscritor();

        $result = array('status' => $sucesso, 'mensagem' => ($report . "<br><br>"));
        return json_encode($result);
    }

    protected function recuperarLinha($result)
    {
        $linha = mysql_fetch_array($result, MYSQL_NUM);

        if (isset($this->indiceData))
            foreach ($this->indiceData as $indice) {
                $linha[$indice] = DateTime::createFromFormat('Y-m-d', $linha[$indice])->format('d/m/Y');
            }
        return $linha;
    }

    public function qtdRegistrosRecuperados()
    {
        return $this->registrosRecuperados;
    }
}


 ?>
