<?php include("topo_pagina.php"); ?>

<section>

    <form method="post" action="bd_aluno_adicionar_cadastro.php">

        <h2 class="Titulo">Informações básicas do Aluno</h2>

        <HR NOSHADE SIZE="4">

        <p>Matrícula:<input type="text" class="form-control" required="required" name="nMatricula" pattern="[0-9]+$" placeholder="Número de matrícula na IES."></p>

        <p>ID do Aluno:<input type="text" class="form-control" name="nIdAluno" pattern="[0-9]+$" placeholder="Número fornecido pelo INEP."></p>

        <p>Código IES:<input type="text" class="form-control" name="nIdIES" placeholder="Código do Aluno na IES."></p>

        <p>CPF do Aluno:<input type="text" class="form-control" required="required" pattern="[0-9]+$" name="nCpf" placeholder="Utilize apenas números."></p>

        <p>Nome do Aluno:<input type="text" class="form-control" required="required" name="nNome" pattern="[A-Z\s]+$" placeholder="Preencha o campo com o nome completo. Utilize letras MAIÚSCULAS."></p>

        <p>Data de Nascimento: <input type="text" class="form-control" name="nNascimento" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de nascimento, separada por barras. Ex: 31/12/1990."></p>

        <p>Sexo do Aluno:</p>
        <div class="radio">
            <label><input type="radio" name="nSexo" value="0" checked/>Masculino</label>
            <label><input type="radio" name="nSexo" value="1">Feminino</label>
        </div>

        <p>Nome Completo da Mãe:<input type="text" class="form-control" pattern="[A-Z\s]+$" id="iNomeMae" name="nNomeMae" placeholder="Nome da mãe do Aluno. Utilize letras MAIÚSCULAS."></p>

        <p>Cor/Raça do Aluno:</p>
        <div class="radio">
            <label><input type="radio" name="nCor" value="1"> Branca</label>
            <label><input type="radio" name="nCor" value="2"> Preta</label>
            <label><input type="radio" name="nCor" value="3"> Parda</label>
            <label><input type="radio" name="nCor" value="4"> Amarela</label>
            <label><input type="radio" name="nCor" value="5"> Indígena</label>
            <label><input type="radio" name="nCor" value="0" checked/> Aluno não quis declarar cor/raça</label>
        </div>

        <p>Nacionalidade:</p>
        <div class="radio">
            <label><input type="radio" id="iBrasileira" name="nNacionalidade" value="1" checked onclick="selecionarNacionalidade(this.value)"/> Brasileira</label>
            <label><input type="radio" id="iNaturalizado" name="nNacionalidade" value="2" onclick="selecionarNacionalidade(this.value)"> Brasileira - nascido no exterior ou naturalizado</label>
            <label><input type="radio" id="iEstrangeiro" name="nNacionalidade" value="3" onclick="selecionarNacionalidade(this.value)"> Estrangeira</label>
        </div>

        <!-- Informações do aluno estrangeiro -->
        <div id="iInfoEstrangeiro" style="display:none" >
            <p>País de Origem: <input type="text" class="form-control" pattern="[A-Z\s]+$" id="iPaisOrigem" name="nPaisOrigem" placeholder="Código de 3 letras do País do Origem do aluno. Utilize letras MAIÚSCULAS."></p>
            
            <p>Documento estrangeiro do aluno:<input type="text" class="form-control" pattern="[0-9]+$" name="nDocumentoEstrangeiro" placeholder="Documento estrangeiro do aluno. Utilize apenas números."></p>
        </div>

        <!-- Informações do aluno brasileiro -->
        <div id="iInfoBrasileiro">
            <p>Código do município: <input type="text" class="form-control" name="nCodigoMuni" placeholder="Código do município de nascimento do aluno."> <p>

            <p>Código do estado: <input type="text" class="form-control" name="nCodigoEstado" placeholder="Código da UF de origem do aluno."> <p>
        </div>

        <p>Aluno com Deficiência, Transtorno Global do Desenvolvimento ou Altas Habilidades/Superdotação:</p>

        <div class="radio">
            <label><input type="radio" name="nDeficienciaHabilidades" value="1" onclick="selecionarTemDeficiencia(this.value)">Sim</label>
            <label><input type="radio" name="nDeficienciaHabilidades" value="0" checked onclick="selecionarTemDeficiencia(this.value)"/>Não</label>
            <label><input type="radio" name="nDeficienciaHabilidades" value="2" onclick="selecionarTemDeficiencia(this.value)">Não dispõe dessa informação</label>
        </div>

        <div id="iDeficiencia" style="display:none">
        <p>Tipo de Deficiência, Transtorno Global do Desenvolvimento ou Altas Habilidades/Superdotação:</p>

        <input type="checkbox" name="nCegueira" value="1"> Cegueira
        <input type="checkbox" name="nBaixaVisao" value="1"> Baixa visão
        <input type="checkbox" name="nSurdez" value="1"> Surdez
        <input type="checkbox" name="nAuditiva" value="1"> Deficiência auditiva
        <input type="checkbox" name="nFisica" value="1"> Deficiência física <br>
        <input type="checkbox" name="nSurdocegueira" value="1"> Surdocegueira
        <input type="checkbox" name="nMultipla" value="1"> Deficiência múltipla
        <input type="checkbox" name="nIntelectual" value="1"> Deficiência intelectual
        <input type="checkbox" name="nAutismo" value="1"> Autismo<br>
        <input type="checkbox" name="nAsperger" value="1"> Síndrome de Asperger
        <input type="checkbox" name="nRett" value="1"> Síndrome de Rett
        <input type="checkbox" name="nTDI" value="1"> Transtorno desintegrativo de infância
        <input type="checkbox" name="nAltasHabilidades" value="1"> Altas Habilidades/Superdotação
        </div>

        <HR NOSHADE SIZE="4">

        <p>Fonte:<input type="text" class="form-control"  name="nFonte" placeholder="Entidade que forneceu estas informações."></p>

        <HR NOSHADE SIZE="4">

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar</button>
        </div>
    </form>
    <button type="button" class="btn btn-warning" onclick="location.href = 'modulo_alunos.php'">Cancelar</button>

</section>

<script src="js/adicionar_cadastro_form.js"></script>

<?php include("fim_pagina.php"); ?>
