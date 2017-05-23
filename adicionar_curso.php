<?php include("topo_pagina.php"); ?>

<section>

    <form method="post" action=".php">
        
        <h2 class="Titulo">Informações básicas de Curso</h2> 

        <HR NOSHADE SIZE="4">

        <p>Código do Curso:<input type="text" class="form-control" required="required" name="nCodigo" pattern="[0-9]+$" placeholder="Código do Curso."></p>

        <p>Nome do Curso:<input type="text" class="form-control" name="nNome" pattern="[A-Z\s]+$" placeholder="Nome do Curso. Utilize letras MAIÚSCULAS."></p>

        <p>Código OCDE:<input type="text" class="form-control" required="required" pattern="[0-9]+$" name="nOCDE" placeholder="Código OCDE."></p>

        <p>Grau Acadêmico:</p>
        <div class="radio">
            <label><input type="radio" name="nGrau" value="Bacharelado" checked/>Bacharelado</label>
            <label><input type="radio" name="nGrau" value="Licenciatura">Licenciatura</label>
            <label><input type="radio" name="nGrau" value="Tecnologico">Tecnológico</label>
        </div>

        <p>Modalidade:</p>
        <div class="radio">
            <label><input type="radio" name="nModalidade" value="Presencial" checked/>Presencial</label>
            <label><input type="radio" name="nModalidade" value="Distancia">À Distância</label>
        </div>

        <p>Nível Acadêmico:</p>
        <div class="radio">
            <label><input type="radio" name="nNivel" value="Graduacao" checked/>Graduação</label>
            <label><input type="radio" name="nNivel" value="Sequencial">Sequencial</label>
        </div>
        
        <p>Atributo de Ingresso:</p>
        <div class="radio">
            <label><input type="radio" name="nIngresso" value="Normal" checked/>Normal</label>
            <label><input type="radio" name="nIngresso" value="AreaBasica">Área Básica de Ingresso</label>
            <label><input type="radio" name="nIngresso" value="BachareladoInterdisciplinar">Bacharelado Interdisciplinar</label>
            <label><input type="radio" name="nIngresso" value="LicenciaturaInterdisciplinar">Licenciatura Interdisciplinar</label>
        </div>
        
        <p>Carga Horária: <input type="text" size="4" name="nCargaHoraria" pattern="[0-9]+$" title="Carga Horária do Curso."></p>
        
        <p>Data de Início do Funcionamento: <input type="text" class="form-control" name="nInicioFuncionamento" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de início do funcionamento do curso, separada por barras. Ex: 31/12/1990."></p>
        
        <p>Data de Autorização: <input type="text" class="form-control" name="nAutorizacao" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de autorização, separada por barras. Ex: 31/12/1990."></p>
        
        <p>Situação do Curso no e-MEC:</p>
        <div class="radio">
            <label><input type="radio" name="nSituacao" value="Atividade" checked/>Em Atividade</label>
            <label><input type="radio" name="nSituacao" value="Extincao">Em Extinção</label>
            <label><input type="radio" name="nSituacao" value="Extinto2015">Extinto em 2015</label>
        </div>
        
        <p>Curso Gratuito?:</p>
        <div class="radio">
            <label><input type="radio" name="nGratuito" value="Sim" checked/>Sim</label>
            <label><input type="radio" name="nGratuito" value="Nao">Não</label>
        </div>

        <HR NOSHADE SIZE="4">

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar</button>
    </form>
    <button type="button" class="btn btn-warning" onclick="location.href = '.php'">Cancelar</button>

</section>

<?php include("fim_pagina.php"); ?>