<?php

	$objFc = new Funcoes();
    $objFn = new Funcionario();

	foreach($objFn->querySelect() as $rst){ 
    	echo $rst['nome'].'<br>';
    	echo $rst['email'].'<br>';
    	echo "<div><a href='#'>EDITAR</a></div>";
    	echo "<div><a href='#'>EXLUIR</a></div><hr>";
 	} 
 	
 ?>

