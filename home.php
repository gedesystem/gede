<?php include("topo_pagina.php"); ?>

<section>

    <div id="home_Titulo">

        <h2 class="Titulo">Gerenciador de Dados Educacionais</h2>

    </div>

    <div class="blocos_modulos" onclick="location.href = 'modulo_professores.php'">

        <img class="logo_modulos" src ="imagens/prof2.png">
        <span class="titulo_modulos"> &nbsp;&nbsp;&nbsp;Módulo Docentes:</span>
        Gerenciar as informações sobre os docentes da instituição.

    </div>

    <div class="blocos_modulos" onclick="location.href = 'modulo_alunos.php'">

        <img class="logo_modulos" src ="imagens/aluno2.png" >
        <span class="titulo_modulos"> &nbsp;&nbsp;&nbsp;Módulo Discentes:</span>
        Gerenciar as informações sobre os discentes da instituição.

    </div>

    <div class="blocos_modulos" onclick="location.href = 'modulo_cursos.php'">

        <img class="logo_modulos" src ="imagens/curso.png">
        <span class="titulo_modulos"> &nbsp;&nbsp;&nbsp;Módulo Cursos:</span>
        Gerenciar as informações sobre os cursos da instituição.

    </div>


</section>

<?php include("fim_pagina.php"); ?>

