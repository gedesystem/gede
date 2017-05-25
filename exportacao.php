<?php include("topo_pagina.php"); ?>

<section>

    <h2 class="Titulo">Exportação de dados do sistema</h2>

    Utilize esta sessão para exportar informações da base de dados do sistema.

    <HR NOSHADE SIZE="4">

    <br>
    <br>

    <img width="25" src ="imagens/one.png"> Selecione qual tipo de informação deseja exportar: <br><br>
    <SELECT NAME = "lista_tabelas" id = "lista_tabelas" SIZE=1 onchange="selecionarTabela()">

        <OPTION disabled selected value> -- Escolha uma opção -- </OPTION>
        <OPTION value = 0> Alunos - Dados Cadastrais
        <OPTION value = 3> Docentes - Dados cadastrais
        <OPTION value = 4> Docentes Temporários
        <OPTION value = 5> Ensino Curso EAD
        <OPTION value = 6> Ensino Graduação Presencial
        <OPTION value = 7> Ensino Pós-graduação à Distância
        <OPTION value = 8> Ensino Pós-graduação Presencial
        <OPTION value = 9> Gestão, Planejamento e Avaliação
        <OPTION value = 10> Docentes - Pós Graduação
        <OPTION value = 11> Docentes - Regime de Trabalho
        <OPTION value = 12> Situação dos Docentes
        <OPTION value = 13> Vínculo dos Docentes
        <OPTION value = 14> Vínculo dos Docentes - IES

    </SELECT>

    <br><br>
    <div id="loader" style="display:none">
        Aguarde enquanto o sistema recupera os dados...
        <br><br>
        <div class="loader"></div> <br>
    </div>

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
