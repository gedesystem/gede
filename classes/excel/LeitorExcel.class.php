<?php

require_once ('migracao_util.php');
require_once "vendor/autoload.php";
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;

/**
 * Classe para encapsular a leitura de arquivos do excel.
 * Automaticamente pula linhas vazias.
 */
class LeitorExcel
{
    /**
     * nome do arquivo para leituras
     * @var string
     */
    protected $arquivo;

    /**
     * @var \Box\Spout\Reader\ReaderFactory
     */
    protected $leitor;

    /**
     * Iterador sobre as linhas da planilha
     * @var \Box\Spout\Reader\XLSX\RowIterator
     */
    protected $rowIt;

    /**
     * Indice da ultima linha retornada pelo método proximaLinha()
     * @var integer
     */
    protected $linhaIndex;

    function __construct($arquivo)
    {
        $this->linhaIndex = 0;
        $this->arquivo = $arquivo;
        $this->leitor = ReaderFactory::create(Type::XLSX);
        $this->leitor->open($this->arquivo);
        $this->leitor->setTempFolder(TEMP_DIR);

        $sheetIt = $this->leitor->getSheetIterator();
        $sheetIt->rewind();

        $sheet = NULL;
        if ($sheetIt->valid()) $sheet = $sheetIt->current();
        // else erro TODO: validar o template?

        $this->rowIt = $sheet->getRowIterator();
        $this->rowIt->rewind();
    }

    function __destruct()
    {
        $this->leitor->close();
    }

    public function proximaLinha()
    {
        do {
            if ($this->rowIt->valid()) {
                $this->linhaIndex++;
                $linha = $this->rowIt->current();
                $this->rowIt->next();
            } else $linha = NULL;
        } while ($linha != null && $this->linhaVazia($linha));

        return $linha;
    }

    protected function linhaVazia($linha)
    {
        $vazio = true;
        foreach ($linha as $value) {
            if ($value != "") {
                $vazio = false;
                break;
            }
        }
        return $vazio;
    }
    /**
     * Retorna o indice da ultima linha recuperada pelo método proximaLinha()
     * @var [type]
     */
    public function getLinhaIndex()
    {
        return $this->linhaIndex;
    }
}

 ?>
