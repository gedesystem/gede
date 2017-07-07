<?php
session_start();
require_once 'migracao_util.php';
require_once 'classes/importacao/ImportFactory.class.php';

if (isset($_POST["opcao"])) {

    if ($_FILES['userfile']['error'] == UPLOAD_ERR_OK &&
            is_uploaded_file($_FILES['userfile']['tmp_name'])){

        $uploaddir = TEMP_DIR . 'uploads/';
        $uploadfile = $uploaddir . time() . basename($_FILES['userfile']['name']);

        $filetype = pathinfo($uploadfile, PATHINFO_EXTENSION);

        if ($filetype == 'xlsx') {
            move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);

            $import = ImportFactory::criar($_POST["opcao"], $uploadfile);
            echo $import->fazerImportacao();
            $import = null;
            unlink($uploadfile);

            //echo ($import->qtdRegistrosSalvos() . " registros salvos com sucesso!");
        } else echo "Por favor, envie um arquivo no formato xlsx.";
    } else echo ("Falha no upload do arquivo. Codigo: " . $_FILES['userfile']['error']);

    unset($_POST["opcao"]);
}
 ?>
