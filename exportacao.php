<?php
include("topo_pagina.php");
include("migracao_util.php");
// Excluindo arquivos temporários de exportações anteriores
$files = glob(EXPORT_DIR . '*');
unset($files[(EXPORT_DIR . '.gitignore')]);
foreach ($files as $file){
    unlink($file);
}

?>

<section>

    <h2 class="Titulo">Exportação de dados do sistema</h2>

    Utilize esta sessão para exportar informações da base de dados do sistema.

    <HR NOSHADE SIZE="4">

    <br>
    <br>

    <img width="25" src ="imagens/one.png"> Selecione qual tipo de informação deseja exportar: <br><br>
    <SELECT NAME = "lista_tabelas" id = "lista_tabelas" SIZE=1 onchange="selecionarTabela()">

        <OPTION disabled selected value> -- Escolha uma opção -- </OPTION>
        <OPTION value = 0> Alunos - Estágio
        <OPTION value = 1> Alunos - Extensão
        <OPTION value = 2> Alunos - Mobilidade Acadêmica
        <OPTION value = 3> Alunos - Monitoria
        <OPTION value = 4> Alunos - Pesquisa
        <OPTION value = 5> Alunos - Dados cadastrais
        <OPTION value = 23> Alunos - Dados de Cursos
        <OPTION value = 6> Cursos - Dados Censitários
        <OPTION value = 7> Cursos - Dados Cadastrais
        <OPTION value = 8> Cursos - Laboratórios
        <OPTION value = 9> Docentes - Extensão
        <OPTION value = 10> Docentes - Pesquisa
        <OPTION value = 11> Docentes - Dados Cadastrais
        <OPTION value = 12> Docentes - Ensino Curso EAD
        <OPTION value = 13> Docentes - Ensino Graduação Presencial
        <OPTION value = 14> Docentes - Ensino Pós-graduação à Distância
        <OPTION value = 15> Docentes - Ensino Pós-graduação Presencial
        <OPTION value = 16> Docentes - Gestão, Planejamento e Avaliação
        <OPTION value = 17> Docentes - Pós-graduação
        <OPTION value = 18> Docentes - Regime de Trabalho
        <OPTION value = 19> Situação dos Docentes
        <OPTION value = 20> Docentes Temporários
        <OPTION value = 21> Docentes - Vínculo aos Cursos
        <OPTION value = 22> Docentes - Vínculo à IES

    </SELECT>

    <br><br>
    <div id="loader" style="display:none">
        Aguarde enquanto o sistema recupera os dados...
        <br><br>
        <div class="loader"></div> <br>
    </div>

    <div id="result"></div>

    <div id="passo2" style="display:none">
        <HR NOSHADE SIZE="4">

        <img width="25" src ="imagens/two.png"> Faça o download da tabela com os dados que encontramos:<br><br>

            <form method="post" action="preparar_exportacao.php">
            <input style="display: none;" type="text" name="tag" id="tag" value="">
            <button type="submit" name="submit" class="btn btn-primary">Download</button>

        </form>
    </div>

</section>

<script src="js/exportacao_form.js"></script>

<style>
.file {
    line-height: 30px;
    height: 30px;
    border: 1px solid #A7A7A7;
    padding: 5px;
    box-sizing: border-box;
    font-size: 15px;
    vertical-align: middle;
    width: 300px;
}

.loader {
  border: 8px solid #f3f3f3;
  border-radius: 50%;
  border-top: 8px solid #FFA500;
  width: 60px;
  height: 60px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

<?php include("fim_pagina.php"); ?>
