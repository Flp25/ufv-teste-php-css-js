<?php
	include 'classe.php';

	$obj = new Funcionario();
	$tabela  = "pessoa";
	$tabela2 = "funcionario";
	$on = "cpf_funcionario";
	$link = "<script> location.href='crud_func.php'</script>";
	$link2 = "<script> location.href = 'login_cliente.php'; </script>";

	$obj->logar_usuario($tabela, $tabela2, $on, $link, $link2);


?>