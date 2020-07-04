<?php
	include 'classe.php';

	$obj = new Funcionario();

	$tabela = "pessoa";
	$tabela_secundaria = "funcionario";
	$pk = "cpf_funcionario";
	$link = "<script> location.href='atualizar.php'</script>";
	$link2 = "<script> location.href = 'atualizar.php'; </script>";
	$id = "idfuncionario";

	$obj->atualizar_dados($tabela, $tabela_secundaria, $pk, $link, $link2, $id);


?>