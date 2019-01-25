<?php

    require_once 'funcoes.class.php';
    require_once 'funcionarios.class.php';
    require_once 'insertCadastro.class.php';
    require_once 'listar.class.php';   
   
?>
<!DOCTYPE>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Formulário de cadastro</title>
    <link href="estilo.css" rel="stylesheet" type="text/css" >
</head>
<body>

<!-- <div id="lista">

    <div class="funcionario">
        <div class="nome"></div>
        <div class="editar"><a href="#" title="Editar dados">EDITAR</a></div>
        <div class="excluir"><a href="#" title="Excluir esse dado">EXCLUIR</a></div>
    </div>

</div> -->

<div id="formulario">
    <form name="formCad" action="" method="POST">
        <label>Nome: </label><br>
        <input type="text" name="nome" required="required" ><br>
        <label>E-mail: </label><br>
        <input type="mail" name="email" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"><br>
        <label>Senha: </label><br>
        <input type="password" name="senha" required="required"><br>

        <br>
        <input type="submit" name="btnCadastrar" value="Cadastrar">
        <input type="hidden" name="func" value="">
    </form>
</div>
 
</body>
</html>