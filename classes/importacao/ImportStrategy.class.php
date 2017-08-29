<?php
require_once ('funcoes_uteis.php');
require_once ('migracao_util.php');
require_once ('classes/excel/LeitorExcel.class.php');

/**
 *
 */
abstract class ImportStrategy
{
    /**
     * Leitor de arquivos do excel
     * @var LeitorExcel
     */
    protected $leitorExcel;

    /**
     * Nome da tabela a receber as informações
     * @var string
     */
    protected $bdTabelaAlvo;

    /**
     * Colunas da tabela alvo
     * @var [type]
     */
    protected $colunas;

    /**
     * Numero de colunas no arquivo excel
     * @var int
     */
    protected $numColunas;

    protected $insertCount;

    function __construct($arquivo)
    {
        $this->leitorExcel = new LeitorExcel($arquivo);
        $this->insertCount = 0;

        $tituloColunas = $this->leitorExcel->proximaLinha();
        //Verificando se existem colunas vazias a direita da tabela
        //inseridas pelo usuário
        $colunasVazias = 0;
        for ($i = count($tituloColunas) - 1; $i >= 0; $i--) {
            if ($tituloColunas[$i] == "") $colunasVazias++;
        }

        // Conta o numero de elementos da linha contendo os titulos das colunas
        // Necessário porque as vezes o spout retorna um array menor
        // caso exitam celulas vazias na extremidade direita de uma linha
        $this->numColunas = count($tituloColunas) - $colunasVazias;

        // pula as demais linhas sem dados
        for ($i = 0; $i < 3; $i++) $this->leitorExcel->proximaLinha();
    }

    public function fazerImportacao()
    {
        // sql statement
        //$sql = "INSERT INTO $this->bdTabelaAlvo ($this->colunas) VALUES ";
        conexao();
        $erros = "";

        // Enquanto a linha retornada não for nula
        while (($linha = $this->leitorExcel->proximaLinha()) != NULL) {

            $linha = (count($linha) > $this->numColunas) ?
                array_slice($linha, 0, $this->numColunas) :
                $linha;

            try {
                $result = $this->validarLinha($linha);
                $this->insertCount += $this->salvar($result);
            } catch (SaveException $se) {
                $erros .= ($se->getMessage() . "<br>");
            } catch (ImportException $se) {
                $erros .= ($se->getMessage() . "<br>");
            }

            // if ($result['sucesso']) {
            //     // concatena os dados da linha no sql statement e realiza a consulta
            //     //$valores = implode("', '", $result['linha']);
            //     //mysql_query(($sql . "('$valores')"));
            // } else {
            //     # code...
            // }
        }
        mysql_close();
        $report = ($this->qtdRegistrosSalvos() > 0) ?
            ($this->qtdRegistrosSalvos() . " registros salvos com sucesso! <br><br>") : "";
        $report = ($erros != "") ?
            $report . ("A importação terminou com os seguintes erros: <br>" . $erros . "<br><br>") : $report;

        return $report;
    }

    public function qtdRegistrosSalvos ()
    {
        return $this->insertCount;
    }

    protected function formatarData(array $linha, ...$posicoes)
    {
        foreach ($posicoes as $posicao) {
            if (isset($linha[$posicao])
                && is_string($linha[$posicao])
                && (($date = DateTime::createFromFormat('d/m/Y', $linha[$posicao])) === ture)) {
                $linha[$posicao] = $date->format('Y-m-d');
            } elseif (isset($linha[$posicao]) && ($linha[$posicao] instanceof DateTime)) {
                $linha[$posicao] = $linha[$posicao]->format('Y-m-d');
            } else throw new ImportException(
                "Linha "
                . $this->leitorExcel->getlinhaIndex()
                . ": Erro processando data.
                Certifique-se de que a data esteja no formato dia/mês/ano");
        }
        return $linha;
    }

    protected abstract function validarLinha(array $linha);

    protected abstract function salvar(array $linha);

}

class ImportException extends Exception {
    function __construct($linha, $mensagem="")
    {
        parent::__construct(
            "Linha "
            . $linha
            . ": " . $mensagem
        );
    }
}

class SaveException extends Exception {
    function __construct($linha, $mensagem="")
    {
        parent::__construct(
            "Linha "
            . $linha
            . ": " . ((mysql_errno() == 1644) ? mysql_error()
            : (mysql_errno() == 0) ? $mensagem
            : ("Erro ao salvar o registro. Código " . mysql_errno()))
        );
    }
}


 ?>
