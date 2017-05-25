<?php include("topo_pagina.php"); ?>

<section>

    <h2 class="Titulo">Exportação de dados do sistema</h2>
    
    Utilize esta sessão para exportar informações da base de dados do sistema.

    <HR NOSHADE SIZE="4">

    <br>
    <br>

    <img width="25" src ="imagens/one.png"> Selecione qual tipo de informação deseja exportar: <br><br>
    <SELECT NAME = "lista_tabelas" SIZE=1>

        <OPTION value =""> Discentes - Mobilidade Acadêmica
        <OPTION value =""> Docentes - Pós graduação

    </SELECT>

    <HR NOSHADE SIZE="4">
    
    <img width="25" src ="imagens/two.png"> Faça o download da tabela com os dados que encontramos:<br><br>
    
        <form method="post" action=".php">
        <input style="display: none;" type="text" name="Download" value="">
        <button type="submit" class="btn btn-primary">Download</button>
        
    </form>

</section>

<?php include("fim_pagina.php"); ?>