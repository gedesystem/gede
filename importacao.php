<?php include("topo_pagina.php"); ?>

<section>

    <h2 class="Titulo">Importação de dados para o sistema</h2>
    
    Utilize esta sessão para importar informações para a base de dados do sistema.

    <HR NOSHADE SIZE="4">

    <br>
    <br>

    <img width="25" src ="imagens/one.png"> Selecione qual tipo de informações deseja importar: <br><br>
    <SELECT NAME = "lista_tabelas" SIZE=1>

        <OPTION value =""> Discentes - Mobilidade Acadêmica
        <OPTION value =""> Docentes - Pós graduação

    </SELECT>

    <HR NOSHADE SIZE="4">
    
    <img width="25" src ="imagens/two.png"> Faça o download do modelo de tabela para importação de dados:<br><br>
    
        <form method="post" action=".php">
        <input style="display: none;" type="text" name="Download" value="">
        <button type="submit" class="btn btn-primary">Download do modelo</button>
        
    </form>
    
    <HR NOSHADE SIZE="4">
    
   <img width="25" src ="imagens/three.png"> Carregar tabela com os dados:
    
</section>

<?php include("fim_pagina.php"); ?>