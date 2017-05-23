<?php include("topo_pagina.php"); ?>

<section>

    <h2 class="Titulo">Cadastro de novo cooperador</h2>

    <HR NOSHADE SIZE="4">
    Utilize este formulário para criar um novo cooperador para o sistema. 

    <br>
    <br>
    <form method="post" action=".php">
        <p>Nome: <input type="text" class="form-control" name="nome" placeholder=""></p>
        <p>Usuário: <input type="text" class="form-control" name="usuario" placeholder=""></p>
        <p>Senha: <input type="text" class="form-control" name="senha" placeholder=""></p>
        <p>E-mail: <input type="text" class="form-control" name="email" placeholder=""></p>
        <br>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

</section>

<?php include("fim_pagina.php"); ?>