<?php
	include 'classe.php';

	$obj = new Funcionario();
 
	$servico = " ";
	$tabela_secundaria = " ";
	$pk = " ";
	$link = "<script> location.href='relatorio.php'</script>";
	$link2 = "<script> location.href = 'relatorio.php'; </script>";
	$id = " ";

	if($_POST["idfuncionario"] == ''){
		echo "<script> window.alert('Informe o CPF'); </script>";
		echo $link2;		
	}

	$obj->produtividade($link, $link2);


?>