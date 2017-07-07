<?php include("topo_pagina.php"); ?>

<section>

    <h2 class="Titulo">Importação de dados para o sistema</h2>

    Utilize esta sessão para importar informações para a base de dados do sistema.

    <HR NOSHADE SIZE="4">

    <br>
    <br>

    <img width="25" src ="imagens/one.png"> Selecione qual tipo de informações deseja importar: <br><br>
    <SELECT id = "lista_tabelas" SIZE=1 onchange="exibirPasso2()">

        <OPTION disabled selected value> -- Escolha uma opção -- </OPTION>
        <OPTION value = 0> Alunos - Estágio
        <OPTION value = 1> Alunos - Extensão
        <OPTION value = 2> Alunos - Mobilidade Acadêmica
        <OPTION value = 3> Alunos - Monitoria
        <OPTION value = 4> Alunos - Pesquisa
        <OPTION value = 5> Alunos - Dados cadastrais
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

    <div id="passo2" style="display:none">
        <HR NOSHADE SIZE="4">

        <img width="25" src ="imagens/two.png"> Faça o download do modelo de tabela para importação de dados:<br><br>

        <div id="passo2_1">

            <a onclick="exibirUpload()"> Já possuo o modelo de tabela para importação de dados </a> <br>

            <a onclick="exibirDownload()"> Não possuo o modelo de tabela para importação de dados </a>

        </div>

        <div id="uploadLabel" style="display:none"> Prossiga para o próximo passo. </div>

        <form method="post" action="download_modelo.php" id="passo2_2" style="display:none" onsubmit="exibirPasso3()">

            Preencha o arquivo de acordo com as instruções presentes no mesmo. <br> <br>
            <input style="display: none;" type="text" name="Download" id="Download" value="">
            <button type="submit" class="btn btn-primary">Download do modelo</button>

        </form>
    </div>

    <div id="passo3" style="display:none">
        <HR NOSHADE SIZE="4">

        <img width="25" src ="imagens/three.png"> Carregar tabela com os dados: <br><br>

        <form action="preparar_importacao.php" method="post" id='upload' enctype="multipart/form-data">
            <!-- textfield só para guardar a opcao escolhida -->
            <input style="display: none;" type="text" name="opcao" id="opcao" value="">

            <!-- MAX_FILE_SIZE deve preceder o campo input file. Valor em bytes: 100 Mb-->
            <input type="hidden" name="MAX_FILE_SIZE" value="104857600" />

            <!-- O Nome do elemento input file determina o nome da array $_FILES -->
            <input name="userfile" id="input_file" type="file" style="display:none" onchange="selecionaArquivo()"/>

            <input type="text" name="file" id="file" class="file" placeholder="Arquivo" readonly="readonly" >
            <input type="button" class="btn btn-primary" value="Selecionar arquivo" onclick="acionaInputFile()">
            <br> <br>
            <input type="button" class="btn btn-primary" name="submit" value="Enviar Arquivo" onclick="prepararImportacao()"/>
        </form>
    </div>

    <br><br>
    <div id="loader" style="display:none">
        Aguarde enquanto o sistema faz a importação dos dados...
        <br><br>
        <div class="loader"></div> <br>
    </div>

    <div id="result"></div>

</section>

<script src="js/inportacao_form.js"></script>

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
