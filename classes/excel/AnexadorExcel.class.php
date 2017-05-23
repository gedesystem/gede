<?php

require_once 'classes/excel/EscritorExcel.class.php';
require_once 'classes/excel/LeitorExcel.class.php';

/**
 * Adciona linhas á um arquivo xlsx existente.
 */
class AnexadorExcel
{
    protected $writer;

    protected $arquivoAntigo;

    protected $arquivoNovo;

    protected $mantemAntigo;

    function __construct($caminhoDoArquivo, $novoCaminho = NULL)
    {
        $this->arquivoAntigo = $caminhoDoArquivo;
        $this->mantemAntigo = isset($novoCaminho);

        $this->arquivoNovo = ($this->mantemAntigo) ?
            $novoCaminho : TEMP_DIR . "novo" . basename($this->arquivoAntigo);

        $reader = new LeitorExcel($this->arquivoAntigo);
        $this->writer = new EscritorExcel($this->arquivoNovo);

        while (($linha = $reader->proximaLinha()) != NULL) {
            $this->escreverLinha($linha);
        }
    }

    public function escreverLinha($linha)
    {
        $this->writer->escreverLinha($linha);
    }

    public function concluir()
    {
        $this->writer->fecharEscritor();

        if (!$this->mantemAntigo) {
            unlink($this->arquivoAntigo);
            rename($this->arquivoNovo, $this->arquivoAntigo);
        }
    }
}


 ?>
