<?php include("topo_pagina.php"); ?>

<section>

    <h2 class="Titulo">Mudar senha do cooperador</h2>

    <HR NOSHADE SIZE="4">

    <br>
    <br>
    
    <img width="25" src ="imagens/user2.png"> Alterar dados de cadastro:<br><br>
    
    <form method="post" action=".php">
        <p>Usuário: <input type="text" class="form-control" name="usuario" placeholder=""> </p>
        <p>E-mail: <input type="text" class="form-control" name="email" placeholder=""></p>
        <p>Senha: <input type="text" class="form-control" name="senha" placeholder=""></p>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

    <HR NOSHADE SIZE="4">
    
    <img width="25" src ="imagens/segu.png"> Alterar senha:<br><br>
    
    <form method="post" action=".php">
    
    <p>Senha Antiga: <input type="text" class="form-control" name="senha" placeholder=""></p>
    <p>Senha nova: <input type="text" class="form-control" name="senha_nova" placeholder=""></p>
    <p>Confirmar senha nova: <input type="text" class="form-control" name="confirmar_senha_nova" placeholder=""></p>

    <button type="submit" class="btn btn-primary">Salvar</button>
    
    </form>
    
    
    
</section>

<?php include("fim_pagina.php"); ?>