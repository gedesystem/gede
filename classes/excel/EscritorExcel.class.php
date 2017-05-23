<?php
require_once 'funcoes_uteis.php';
require_once 'migracao_util.php';
require_once 'vendor/autoload.php';
use Box\Spout\Common\Type;
use Box\Spout\Writer\Style\Border;
use Box\Spout\Writer\Style\Color;
use Box\Spout\Writer\Style\BorderBuilder;
use Box\Spout\Writer\Style\StyleBuilder;
use Box\Spout\Writer\WriterFactory;

/**
 *
 */
class EscritorExcel
{
    protected $style;

    protected $writer;

    function __construct($arquivo, array $tituloColunas = NULL)
    {
        $border = (new BorderBuilder())
            ->setBorderBottom(Color::BLACK, Border::WIDTH_THIN, Border::STYLE_SOLID)
            ->setBorderTop(Color::BLACK, Border::WIDTH_THIN, Border::STYLE_SOLID)
            ->setBorderLeft(Color::BLACK, Border::WIDTH_THIN, Border::STYLE_SOLID)
            ->setBorderRight(Color::BLACK, Border::WIDTH_THIN, Border::STYLE_SOLID)
            ->build();

        $this->style = (new StyleBuilder())
            ->setBorder($border)
            ->setShouldWrapText(true)
            ->setFontName('Arial')
            ->setFontSize(10)
            ->build();

        $this->writer = WriterFactory::create(Type::XLSX);
        $this->writer->setTempFolder(TEMP_DIR);
        $this->writer->openToFile($arquivo);

        if (isset($tituloColunas)) $this->escreverLinha($tituloColunas);
    }

    function escreverLinha($linha)
    {
        $this->writer->addRowWithStyle($linha, $this->style);
    }

    public function fecharEscritor()
    {
        $this->writer->close();
    }
}
?>
