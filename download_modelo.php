<?php
require_once 'funcoes_uteis.php';
require_once 'migracao_util.php';

if (isset($_POST['Download'])) {
    $modelo = MODELO_DIR . MODELOS[$_POST['Download']] . '.xlsx';
    if (file_exists($modelo)) download($modelo);
}

?>
