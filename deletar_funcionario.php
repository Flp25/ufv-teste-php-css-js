<?php
	include 'classe.php';

	$obj = new Funcionario();

	$tabela = "pessoa";
	$tabela_secundaria = "funcionario";
	$pk = "cpf_funcionario";
	$link = "<script> location.href='remove.php'</script>";
	$link2 = "<script> location.href = 'remove.php'; </script>";
	$id = "id_funcionario";
	

	$obj->deletar_usuario($tabela, $tabela_secundaria, $pk, $link, $link2, $id);


?>