<?php include("topo_pagina.php"); ?>

<section>

    <h2 class="Titulo">Cadastro de novo cooperador</h2>

    <HR NOSHADE SIZE="4">
    Utilize este formulário para criar uma nova credencial de acesso ao sistema. 

    <br>
    <br>
    <form method="post" action=".php">
        <p>Nome do utilizador: <input type="text" class="form-control" name="nome_utilizador" placeholder="Nome do credenciado."></p>
        <p>Código Credencial: <input type="text" class="form-control" name="credencial" placeholder="Digite um código de 10 caracteres."></p>
        <br>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

</section>

<?php include("fim_pagina.php"); ?>