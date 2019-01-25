<?php

 	$objFc = new Funcoes();
    $objFn = new Funcionario();

    if (isset($_POST['btnCadastrar'])) {
        if ($objFn->queryInsert($_POST) == 'ok') {
            header("location:index.php");
        }else{
           echo '<script type="text/javascript">alert("erro ao entrar")</script>';
        }
    }
    
?>