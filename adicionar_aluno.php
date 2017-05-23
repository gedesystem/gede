<?php include("topo_pagina.php"); ?>

<section>

    <form method="post" action=".php">
        
        <h2 class="Titulo">Informações básicas do Aluno</h2> 

        <HR NOSHADE SIZE="4">

        <p>Matrícula:<input type="text" class="form-control" required="required" name="nMatricula" pattern="[0-9]+$" placeholder="Número de matrícula na IES."></p>

        <p>ID do Aluno:<input type="text" class="form-control" name="nIdAluno" pattern="[0-9]+$" placeholder="Número fornecido pelo INEP."></p>

        <p>CPF do Aluno:<input type="text" class="form-control" required="required" pattern="[0-9]+$" name="nCpf" placeholder="Utilize apenas números."></p>

        <p>Nome do Aluno:<input type="text" class="form-control" required="required" name="nNome" pattern="[A-Z\s]+$" placeholder="Preencha o campo com o nome completo. Utilize letras MAIÚSCULAS."></p>

        <p>Data de Nascimento: <input type="text" class="form-control" name="nNascimento" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de nascimento, separada por barras. Ex: 31/12/1990."></p>

        <p>Sexo do Aluno:</p>
        <div class="radio">
            <label><input type="radio" name="nSexo" value="Masculino" checked/>Masculino</label>
            <label><input type="radio" name="nSexo" value="Feminino">Feminino</label>
        </div>

        <p>Nome Completo da Mãe:<input type="text" class="form-control" pattern="[A-Z\s]+$" id="iNomeMae" name="nNomeMae" placeholder="Nome da mãe do Aluno. Utilize letras MAIÚSCULAS."></p>

        <p>Cor/Raça do Aluno:</p>
        <div class="radio">
            <label><input type="radio" name="nCor" value="Branca"> Branca</label>
            <label><input type="radio" name="nCor" value="Preta"> Preta</label>
            <label><input type="radio" name="nCor" value="Parda"> Parda</label>
            <label><input type="radio" name="nCor" value="Amarela"> Amarela</label>
            <label><input type="radio" name="nCor" value="Indigina"> Indígena</label>
            <label><input type="radio" name="nCor" value="Docente nao quis declarar cor/raca" checked/> Aluno não quis declarar cor/raça</label>
        </div>

        <p>Nacionalidade:</p>
        <div class="radio">
            <label><input type="radio" name="nNacionalidade" value="Brasileira" checked/> Brasileira</label>
            <label><input type="radio" name="nNacionalidade" value="Brasileira - nascido no exterior ou naturalizado"> Brasileira - nascido no exterior ou naturalizado</label>
            <label><input type="radio" name="nNacionalidade" value="Estrangeira"> Estrangeira</label>
        </div>

        <p>País de Origem: <input type="text" class="form-control" pattern="[A-Z\s]+$" name="nPaisOrigem" placeholder="País de nascimento. Utilize letras MAIÚSCULAS."></p>

        <p>UF de Nascimento: <input type="text" size="2" name="nUf" pattern="[A-Z\s]+$" min="2" max="2" title="Sigla do estado de nascimento. Apenas duas letas MAIÚSCULAS.. Ex: BA."></p>

        <p>Município de Nascimento:<input type="text" class="form-control" pattern="[A-Z\s]+$" name="nMunicipio" placeholder="Cidade natal do Aluno. Utilize letras MAIÚSCULAS."></p>

        <p>Código do Município: <input type="text" class="form-control" name="nCodigoMuni" placeholder="Código do município de nascimento do Aluno."> <p>

        <p>Código do Estado: <input type="text" class="form-control" name="nCodigoEstado" placeholder="Código do estado de nascimento do Aluno."> <p>

        <p>Aluno com Deficiência, Transtorno Global do Desenvolvimento ou Altas Habilidades/Superdotação:</p>

        <div class="radio">
            <label><input type="radio" name="nDeficienciaHabilidades" value="Sim">Sim</label>
            <label><input type="radio" name="nDeficienciaHabilidades" value="Nao" checked/>Não</label>
            <label><input type="radio" name="nDeficienciaHabilidades" value="Nao dispoe dessa informacao">Não dispõe dessa informação</label>
        </div>

        <p>Tipo de Deficiência, Transtorno Global do Desenvolvimento ou Altas Habilidades/Superdotação:</p>

        <input type="checkbox" name="nCegueira" value="Sim"> Cegueira
        <input type="checkbox" name="nBaixaVisao" value="Sim"> Baixa visão
        <input type="checkbox" name="nSurdez" value="Sim"> Surdez
        <input type="checkbox" name="nAuditiva" value="Sim"> Deficiência auditiva
        <input type="checkbox" name="nFisica" value="Sim"> Deficiência física <br>
        <input type="checkbox" name="nSurdocegueira" value="Sim"> Surdocegueira
        <input type="checkbox" name="nMultipla" value="Sim"> Deficiência múltipla
        <input type="checkbox" name="nIntelectual" value="Sim"> Deficiência intelectual
        <input type="checkbox" name="nAutismo" value="Sim"> Autismo<br>
        <input type="checkbox" name="nAsperger" value="Sim"> Síndrome de Asperger
        <input type="checkbox" name="nRett" value="Sim"> Síndrome de Rett
        <input type="checkbox" name="nTDI" value="Sim"> Transtorno desintegrativo de infância
        <input type="checkbox" name="nAltasHabilidades" value="Sim"> Altas Habilidades/Superdotação


        <HR NOSHADE SIZE="4">

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar</button>
    </form>
    <button type="button" class="btn btn-warning" onclick="location.href = '.php'">Cancelar</button>

</section>

<?php include("fim_pagina.php"); ?>