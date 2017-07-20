<?php
session_start();
require_once 'funcoes_uteis.php';
require_once 'classes/exportacao/ExportadorSimples.class.php';

if (isset($_POST["export"])) {
    $export = new ExportadorSimples($_POST["export"]);//ExportFactory::criar($_POST["export"]);
    echo $export->fazerExportacao();
    if ($export->qtdRegistrosRecuperados() > 0) {
        $arquivo = $export->getNomeDoArquivo();
        $_SESSION['export'] = $arquivo;
    }
} else if (isset($_POST["submit"])) {
    $arquivo = $_SESSION['export'];
    if (file_exists($arquivo)) download($arquivo);
}
 ?>
