<?php
	include 'classe.php';

	$obj = new Cliente();

	$tabela = "pessoa";
	$tabela_secundaria = "cliente";
	$pk = "cpf_cliente";
	$link = "<script> location.href='remove.php'</script>";
	$link2 = "<script> location.href = 'remove.php'; </script>";
	$id = "idcliente";
	$action = "";

	$obj->remover($tabela, $tabela_secundaria, $pk, $link, $link2, $id, $action);


?>