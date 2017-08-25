<?php include("topo_pagina.php"); ?>

<section>

    <form method="post" action=".php">

        <h2 class="Titulo">Informações básicas do docente</h2>

        <HR NOSHADE SIZE="4">

        <p>Matrícula:<input type="text" class="form-control" id="iMatricula" required="required" name="nMatricula" pattern="[0-9]+$" placeholder="Número de matrícula da IES."></p>

        <p>ID do docente:<input type="text" class="form-control" id="iIdDocente" name="nIdDocente" pattern="[0-9]+$" placeholder="Número fornecido pelo INEP."></p>

        <p>CPF do docente:<input type="text" class="form-control" id="iCpf" required="required" pattern="[0-9]+$" name="nCpf" placeholder="Utilize apenas números."></p>

        <p>Nome do docente:<input type="text" class="form-control" id="iNome" required="required" name="nNome" pattern="[A-Z\s]+$" placeholder="Preencha o campo com o nome completo. Utilize letras MAIÚSCULAS."></p>

        <p>Data de Nascimento: <input type="text" class="form-control" id="iNacimento" name="nNascimento" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de nascimento separada por barras. Ex: 31/12/1990."></p>

        <p>Sexo do docente:</p>
        <div class="radio">
            <label><input type="radio" name="nSexo" id="iMasc" value="0" checked/>Masculino</label>
            <label><input type="radio" name="nSexo" id="iFemi" value="1">Feminino</label>
        </div>

        <p>Nome Completo da Mãe:<input type="text" class="form-control" pattern="[A-Z\s]+$" id="iNomeMae" name="nNomeMae" placeholder="Nome da mãe do docente. Utilize letras MAIÚSCULAS."></p>

        <p>Cor/Raça do Docente:</p>
        <div class="radio">
            <label><input type="radio" id="iBranca" name="nCor" value="1"> Branca</label>
            <label><input type="radio" id="iPreta" name="nCor" value="2"> Preta</label>
            <label><input type="radio" id="iParda" name="nCor" value="3"> Parda</label>
            <label><input type="radio" id="iAmarela" name="nCor" value="4"> Amarela</label>
            <label><input type="radio" id="iIndígina" name="nCor" value="5"> Indígina</label>
            <label><input type="radio" id="iSemDeclarar" name="nCor" value="0" checked/> Docente não quis declarar cor/raça</label>
        </div>

        <p>Nacionalidade:</p>
        <div class="radio">
            <label><input type="radio" id="iBrasileira" name="nNacionalidade" value="1" checked onclick="selecionarNacionalidade(this.value)"/> Brasileira</label>
            <label><input type="radio" id="iNaturalizado" name="nNacionalidade" value="2" onclick="selecionarNacionalidade(this.value)"> Brasileira - nascido no exterior ou naturalizado</label>
            <label><input type="radio" id="iEstrangeiro" name="nNacionalidade" value="3" onclick="selecionarNacionalidade(this.value)"> Estrangeira</label>
        </div>

        <!-- Informações do Docente estrangeiro -->
        <div id="iInfoEstrangeiro" style="display:none" >
            <p>País de Origem: <input type="text" class="form-control" pattern="[A-Z\s]+$" id="iPaisOrigem" name="nPaisOrigem" placeholder="Código de 3 letras do País do Origem do Docente."></p>
        </div>

        <!-- Informações do docente brasileiro -->
        <div id="iInfoBrasileiro">
            <p>Código do município: <input type="text" class="form-control" name="nCodigoMuni" placeholder="Código do município de nascimento do docente."> <p>

            <p>Código do estado: <input type="text" class="form-control" name="nCodigoEstado" placeholder="Código da UF de origem do docente."> <p>
        </div>

        <p>Docente com Deficiência:</p>

        <div class="radio">
            <label><input type="radio" name="nDeficienciaHabilidades" value="1" onclick="selecionarTemDeficiencia(this.value)">Sim</label>
            <label><input type="radio" name="nDeficienciaHabilidades" value="0" checked onclick="selecionarTemDeficiencia(this.value)"/>Não</label>
            <label><input type="radio" name="nDeficienciaHabilidades" value="2" onclick="selecionarTemDeficiencia(this.value)">Não dispõe dessa informação</label>
        </div>

        <div id="iDeficiencia" style="display:none">
            <p>Tipo de Deficiência:</p>

            <input type="checkbox" name="nCegueira" value="1"> Cegueira
            <input type="checkbox" name="nBaixaVisao" value="1"> Baixa visão
            <input type="checkbox" name="nSurdez" value="1"> Surdez
            <input type="checkbox" name="nAuditiva" value="1"> Deficiência auditiva<br>
            <input type="checkbox" name="nFisica" value="1"> Deficiência física
            <input type="checkbox" name="nSurdocegueira" value="1"> Surdocegueira
            <input type="checkbox" name="nMultipla" value="1"> Deficiência múltipla
            <input type="checkbox" name="nIntelectual" value="1"> Deficiência intelectual<br>
        </div>

        <HR NOSHADE SIZE="4">

        <p>Fonte:<input type="text" class="form-control" pattern="[A-Z\s]+$"  name="nFonte" placeholder="Entidade que forneceu estas informações."></p>

        <HR NOSHADE SIZE="4">

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar</button>
    </form>
    <button type="button" class="btn btn-warning" onclick="location.href = 'modulo_professores.php'">Cancelar</button>

</section>

<script src="js/docente_adicionar_cadastro_form.js"></script>

<?php include("fim_pagina.php"); ?>
