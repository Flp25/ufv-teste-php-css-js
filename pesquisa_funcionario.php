<?php
	include 'classe.php';

	$obj = new Funcionario();

	$tabela = "pessoa";
	$tabela_secundaria = "funcionario";
	$pk = "cpf_funcionario";
	$link = "<script> location.href='atualizar.php'</script>";
	$link2 = "<script> location.href = 'atualizar.php'; </script>";
	$id = "idfuncionario";
	$action = "update_funcionario.php";
	
	if($_POST["cpf"] == ''){
		echo "<script> window.alert('Informe o CPF'); </script>";
		echo $link2;		
	}

	$obj->pesquisa($tabela, $tabela_secundaria, $pk, $link, $link2, $id, $action);


?>