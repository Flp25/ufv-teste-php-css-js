<?php
	include 'classe.php';

	$obj = new Funcionario();

	$tabela = "pessoa";
	$tabela_secundaria = "funcionario";
	$pk = "cpf_funcionario";
	$link = "<script> location.href='remove.php'</script>";
	$link2 = "<script> location.href = 'remove.php'; </script>";
	$id = "idfuncionario";
	$action = "deletar_funcionario.php";

	if($_POST["cpf"] == ''){
		echo "<script> window.alert('Informe o CPF'); </script>";
		echo $link2;		
	}

	$obj->remover($tabela, $tabela_secundaria, $pk, $link, $link2, $id, $action);


?>