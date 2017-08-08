<?php include("topo_pagina.php"); ?>

<section>

    <h2 class="Titulo">Cadastro de novo cooperador</h2>

    <HR NOSHADE SIZE="4">
    Utilize este formulário para criar um novo cooperador para o sistema. 

    <br>
    <br>
    <form method="post" action=".php">
        <p>Nome: <input type="text" class="form-control" name="nome" placeholder="Digite seu nome próprio."></p>
        <p>Usuário: <input type="text" class="form-control" name="usuario" placeholder="Digite o nome de usuário que será utilizado para fazer login no sistema."></p>
        <p>Tipo de cooperador:</p>
        <div class="radio">
            <label><input type="radio" name="tipo" value="Comum" checked/>Comum</label>
            <label><input type="radio" name="tipo" value="Administrador">Administrador</label>
            <label><input type="radio" name="tipo" value="Desenvolvedor">Desenvolvedor</label>
        </div>
        <p>Senha: <input type="text" class="form-control" name="senha" placeholder="Digite a senha que será utilizada para fazer login no sistema."></p>
        <p>Confirmação de senha: <input type="text" class="form-control" name="senha" placeholder="Digite a senha novamente."></p>
        <p>E-mail: <input type="text" class="form-control" name="email" placeholder="Digite o endereço de e-mail que será utilizado para recuperação de senha."></p>
        <br>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

</section>

<?php include("fim_pagina.php"); ?>