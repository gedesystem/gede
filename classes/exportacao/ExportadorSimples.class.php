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

    function __construct($categoria)
    {
        $this->categoria = $categoria;
        $this->arquivo = TEMP_DIR . date("d-m-Y") . MODELOS[$this->categoria] . ".xlsx";

        // Pega os titulos das colunas
        $reader = new LeitorExcel(MODELO_DIR . MODELOS[$this->categoria] . ".xlsx");
        $tituloColunas = $reader->proximaLinha();

        //pula uma linha e pega a legenda
        $reader->proximaLinha();
        $legenda = $reader->proximaLinha();

        $this->escritor = new EscritorExcel($this->arquivo, $tituloColunas);
        $this->escritor->escreverLinha($legenda);
    }

    public function getNomeDoArquivo()
    {
        return $this->arquivo;
    }

    public function fazerExportacao()
    {
        conexao();
        $sql = "CALL `recupera_dados_exportacao`($this->categoria)";//"SELECT ".$this->colunas." FROM ".$this->bdTabela;

        $result = mysql_query($sql);
        if ($result) {
            $numRows = mysql_num_rows($result);

            for ($i = 0; $i < $numRows; $i++)
                $this->escritor->escreverLinha($this->recuperarLinha($result));
        }
        mysql_close();
        $this->escritor->fecharEscritor();
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
}


 ?>
