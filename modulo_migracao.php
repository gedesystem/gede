<?php include("topo_pagina.php"); ?>

<section>

    <div id="home_Titulo">

        <h2 class="Titulo">Migração de dados</h2>

    </div>

    <div class="bloco_menu" onclick="location.href = 'importacao.php'">

        <img class="logo_menu" src ="imagens/import.png">
        &nbsp;&nbsp;&nbsp;<span class="padrao2"><b>Importar</b> - Utilize esta sessão para importar informações para base de dados do sistema.</span>

    </div>

    <div class="bloco_menu" onclick="location.href = 'exportacao.php'">

        <img class="logo_menu" src ="imagens/export.png">
        &nbsp;&nbsp;&nbsp;<span class="padrao2"><b>Exportar</b> - Utilize esta sessão para exportar informações da base de dados do sistema.</span>

    </div>

</section>

<?php include("fim_pagina.php"); ?>