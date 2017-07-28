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
            <label><input type="radio" name="nGrau" value="0" checked/>Bacharelado</label>
            <label><input type="radio" name="nGrau" value="2">Licenciatura</label>
            <label><input type="radio" name="nGrau" value="1">Tecnológico</label>
        </div>

        <p>Modalidade:</p>
        <div class="radio">
            <label><input type="radio" name="nModalidade" value="0" checked/>Presencial</label>
            <label><input type="radio" name="nModalidade" value="1">À Distância</label>
        </div>

        <p>Nível Acadêmico:</p>
        <div class="radio">
            <label><input type="radio" name="nNivel" value="0" checked/>Graduação</label>
            <label><input type="radio" name="nNivel" value="1">Sequencial</label>
        </div>

        <p>Atributo de Ingresso:</p>
        <div class="radio">
            <label><input type="radio" name="nIngresso" value="0" checked/>Normal</label>
            <label><input type="radio" name="nIngresso" value="1">Área Básica de Ingresso</label>
            <label><input type="radio" name="nIngresso" value="2">Bacharelado Interdisciplinar</label>
            <label><input type="radio" name="nIngresso" value="3">Licenciatura Interdisciplinar</label>
        </div>

        <p>Carga Horária: <input type="text" size="4" name="nCargaHoraria" pattern="[0-9]+$" title="Carga Horária do Curso."></p>

        <p>Data de Início do Funcionamento: <input type="text" class="form-control" name="nInicioFuncionamento" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de início do funcionamento do curso, separada por barras. Ex: 31/12/1990."></p>

        <p>Data de Autorização: <input type="text" class="form-control" name="nAutorizacao" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de autorização, separada por barras. Ex: 31/12/1990."></p>

        <p>Situação do Curso no e-MEC:</p>
        <div class="radio">
            <label><input type="radio" name="nSituacao" value="0" checked/>Em Atividade</label>
            <label><input type="radio" name="nSituacao" value="1">Em Extinção</label>
            <label><input type="radio" name="nSituacao" value="2">Extinto em 2015</label>
        </div>

        <p>Curso Gratuito?:</p>
        <div class="radio">
            <label><input type="radio" name="nGratuito" value="1" checked/>Sim</label>
            <label><input type="radio" name="nGratuito" value="0">Não</label>
        </div>

        <HR NOSHADE SIZE="4">

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar</button>
    </form>
    <button type="button" class="btn btn-warning" onclick="location.href = '.php'">Cancelar</button>

</section>

<?php include("fim_pagina.php"); ?>
